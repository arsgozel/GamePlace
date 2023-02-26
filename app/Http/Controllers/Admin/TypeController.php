<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    public function index()
    {
        $objs = Type::orderBy('sort_order')
            ->with('parent')
            ->get();

        return view('manager.types.index')
            ->with([
                'objs' => $objs,
            ]);
    }


    public function create()
    {
        $parents = Type::whereNull('parent_id')
            ->orderBy('sort_order')
            ->get();

        return view('manager.types.create')
            ->with([
                'parents' => $parents,
            ]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'parent' => ['nullable', 'integer', 'min:1'],
            'name_tm' => ['required', 'string', 'max:255'],
            'name_en' => ['nullable', 'string', 'max:255'],
            'sort_order' => ['required', 'integer', 'min:1'],
        ]);

        $obj = Type::create([
            'parent_id' => $request->parent ?: null,
            'name_tm' => $request->name_tm,
            'name_en' => $request->name_en ?: null,
            'sort_order' => $request->sort_order,
        ]);

        return to_route('manager.types.index')
            ->with([
                'success' => trans('app.types') . ' (' . $obj->getName() . ') ' . trans('app.added') . '!'
            ]);
    }


    public function edit($id)
    {
        $obj = Type::findOrFail($id);
        $parents = Type::where('id', '!=', $obj->id)
            ->whereNull('parent_id')
            ->orderBy('sort_order')
            ->get();

        return view('manager.types.edit')
            ->with([
                'obj' => $obj,
                'parents' => $parents,
            ]);
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'parent' => ['nullable', 'integer', 'min:1'],
            'name_tm' => ['required', 'string', 'max:255'],
            'name_en' => ['nullable', 'string', 'max:255'],
            'sort_order' => ['required', 'integer', 'min:1'],
        ]);

        $obj = Type::updateOrCreate([
            'id' => $id,
        ], [
            'parent_id' => $request->parent ?: null,
            'name_tm' => $request->name_tm,
            'name_en' => $request->name_en ?: null,
            'sort_order' => $request->sort_order,
        ]);

        return to_route('manager.types.index')
            ->with([
                'success' => trans('app.types') . ' (' . $obj->getName() . ') ' . trans('app.updated') . '!'
            ]);
    }


    public function destroy($id)
    {
        $obj = Type::withCount('child')
            ->findOrFail($id);
        $objName = $obj->getName();
        $obj->delete();

        return redirect()->back()
            ->with([
                'success' => trans('app.types') . ' (' . $objName . ') ' . trans('app.deleted') . '!'
            ]);
    }
}
