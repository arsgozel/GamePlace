<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\App;
use App\Models\CharacteristicValue;
use App\Models\Client;
use App\Models\Comment;
use App\Models\Contact;
use App\Models\Device;
use App\Models\Type;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $modals = [
            ['name' => 'apps', 'total' => App::count()],
            ['name' => 'clients', 'total' => Client::count()],
            ['name' => 'contacts', 'total' => Contact::count()],
            ['name' => 'comments', 'total' => Comment::count()],
        ];

        $not_approved = Comment::where('is_approved', 0)
            ->take(10)
            ->with(['app:id,name'])
            ->get();

        $has_add = App::where('has_add', 1)
            ->take(10)
            ->get();

        $online = App::where('app_status', 1)
            ->take(10)
            ->get();

        $offline = App::where('app_status', 0)
            ->take(10)
            ->get();


        return view('manager.dashboard.index')
            ->with([
                'modals' => $modals,
                'not_approved' => $not_approved,
                'has_add' => $has_add,
                'online' => $online,
                'offline' => $offline,
            ]);
    }
}
