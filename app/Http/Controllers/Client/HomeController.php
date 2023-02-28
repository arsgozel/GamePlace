<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\App;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $apps = App::with(['types:id,name_tm,name_en', 'devices:id,name_tm,name_en'])
            ->orderBy('rating','desc')
            ->paginate(50)
            ->withQueryString();

        return view('Client.home.index')
            ->with([
                'apps' => $apps,
            ]);
    }
}
