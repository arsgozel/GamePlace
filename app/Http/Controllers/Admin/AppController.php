<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\App;
use App\Models\AppImage;
use App\Models\Characteristic;
use App\Models\Comment;
use App\Models\Device;
use App\Models\Type;
use Illuminate\Http\Request;

class AppController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'q' => 'nullable|string|max:255',
        ]);

        $q = $request->q ?: null;


        $objs = App::when($q, function ($query, $q) {
            return $query->where(function ($query) use ($q) {
                $query->orWhere('name', 'like', '%' . $q . '%');
                $query->orWhere('slug', 'like', '%' . $q . '%');
                $query->orWhere('version', 'like', '%' . $q . '%');
                $query->orWhere('downloads', 'like', '%' . $q . '%');
                $query->orWhere('size', 'like', '%' . $q . '%');
                $query->orWhere('created_at', 'like', '%' . $q . '%');
                $query->orWhere('updated_at', 'like', '%' . $q . '%');
                $query->orWhere('rating', 'like', '%' . $q . '%');
            });
        })
            ->with(['types:id,name_tm,name_en', 'devices:id,name_tm,name_en'])
            ->orderBy('id','desc')
            ->paginate(50)
            ->withQueryString();

        return view('manager.app.index')
            ->with([
                'objs' => $objs,
            ]);
    }


    public function show($slug)
    {
        $app = App::where('slug', $slug)
            ->with('types:id,name_tm,name_en',
                'devices:id,name_tm,name_en',
                'CharacteristicValues.characteristic')
            ->firstOrFail();

        return view('manager.app.show')
            ->with([
                'app' => $app,
            ]);
    }


    public function edit($id)
    {
        $obj = App::findOrFail($id);

        $types = Type::whereNotNull('parent_id')
            ->orderBy('sort_order')
            ->get()
            ->toArray();

        $devices = Device::orderBy('sort_order')
            ->get()
            ->toArray();

        $characteristics = Characteristic::orderBy('sort_order')
            ->with('values')
            ->get();

        $images = AppImage::where('app_id', $id)
            ->get();

        return view('manager.app.edit')
            ->with([
                'obj' => $obj,
                'types' => $types,
                'devices' => $devices,
                'characteristics' => $characteristics,
                'images' => $images,
            ]);
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:500',
            'has_add' => 'integer',
            'app_status' => 'integer',
            'images' => 'nullable|array|min:0',
            'images.*' => 'nullable|image|mimes:jpg,jpeg|max:260|dimensions:width=1000,height=1000',
            'types' => ['nullable', 'array'],
            'types.*' => 'nullable', 'integer', 'min:1',
        ]);

        $obj = App::findOrFail($id);
        $obj->name = $request->name;
        $obj->types = $request->types;
        $obj->description = $request->description;
        $obj->has_add = $request->has_add ?: 0;
        $obj->app_status = $request->app_status ?: 0;
        $obj->update();


        return to_route('manager.app.index')
            ->with([
                'success' => trans('app.app') . trans('app.updated') . '!'
            ]);
    }


    public function destroy($id)
    {
        $images = AppImage::where('app_id', $id)
            ->get();
        if (count($images) > 0) {
            foreach ($images as $image) {
                Storage::delete('public/a/' . $image);
            }
        }

        $obj = App::findOrFail($id);
        $objName = $obj->getName();
        $obj->delete();

        return redirect()->back()
            ->with([
                'success' =>  '(' . $objName . ') ' . trans('app.deleted') . '!'
            ]);
    }
}
