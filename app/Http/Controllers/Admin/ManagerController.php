<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Manager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;

class ManagerController extends Controller
{
    public function index()
    {
        $objs = Manager::orderBy('username')
            ->get();

        return view('manager.managers.index')
            ->with([
                'objs' => $objs,
            ]);
    }


    public function create()
    {
        return view('manager.managers.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', Rule::unique('managers')],
            'password' => ['required', Rules\Password::defaults()],
        ]);

        $obj = Manager::create([
            'name' => $request->name,
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);

        return to_route('manager.managers.index')
            ->with([
                'success' => trans('app.manager') . ' (' . $obj->name . ') ' . trans('app.added') . '!'
            ]);
    }


    public function edit($id)
    {
        $obj = Manager::findOrFail($id);

        return view('manager.managers.edit')
            ->with([
                'obj' => $obj,
            ]);
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', Rule::unique('managers')->ignore($id)],
            'password' => ['nullable', Rules\Password::defaults()],
        ]);

        $obj = Manager::findOrFail($id);
        $obj->name = $request->name;
        $obj->username = $request->username;
        if (isset($request->password)) {
            $obj->password = Hash::make($request->password);
        }
        $obj->update();

        return to_route('manager.managers.index')
            ->with([
                'success' => trans('app.manager') . ' (' . $obj->name . ') ' . trans('app.updated') . '!'
            ]);
    }


    public function destroy($id)
    {
        $obj = Manager::findOrFail($id);
        $objName = $obj->name;
        if ($obj->id == 1 or $obj->id == auth()->id()) {
            return redirect()->back()
                ->with([
                    'error' => trans('app.error') . '!'
                ]);
        }
        $obj->delete();

        return redirect()->back()
            ->with([
                'success' => trans('app.manager') . ' (' . $objName . ') ' . trans('app.deleted') . '!'
            ]);
    }

}
