<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Device;
use Illuminate\Http\Request;

class DeviceController extends Controller
{
    public function index()
    {
        $objs = Device::orderBy('sort_order')
            ->get();

        return view('manager.devices.index')
            ->with([
                'objs' => $objs,
            ]);
    }


    public function create()
    {
        $obj = Device::orderBy('sort_order')
            ->get();

        return view('manager.devices.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name_tm' => ['required', 'string', 'max:255'],
            'name_en' => ['nullable', 'string', 'max:255'],
            'sort_order' => ['required', 'integer', 'min:1'],
        ]);

        $obj = Device::create([
            'name_tm' => $request->name_tm,
            'name_en' => $request->name_en ?: null,
            'sort_order' => $request->sort_order,
        ]);

        return to_route('manager.devices.index')
            ->with([
                'success' => trans('app.device') . trans('app.added') . '!'
            ]);
    }


    public function edit($id)
    {
        $obj = Device::findOrFail($id);

        return view('manager.devices.edit')
            ->with([
                'obj' => $obj,
            ]);
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name_tm' => ['required', 'string', 'max:255'],
            'name_en' => ['nullable', 'string', 'max:255'],
            'sort_order' => ['required', 'integer', 'min:1'],
        ]);

        $obj = Device::updateOrCreate([
            'id' => $id,
        ], [
            'name_tm' => $request->name_tm,
            'name_en' => $request->name_en ?: null,
            'sort_order' => $request->sort_order,
        ]);

        return to_route('manager.devices.index')
            ->with([
                'success' => trans('app.device') . ' '. trans('app.updated') . '!'
            ]);
    }


    public function destroy($id)
    {
        $obj = Device::findOrFail($id);
        $obj->delete();

        return redirect()->back()
            ->with([
                'success' => trans('app.device') . ' '. trans('app.deleted') . '!'
            ]);
    }
}
