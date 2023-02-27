<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\App;
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
}
