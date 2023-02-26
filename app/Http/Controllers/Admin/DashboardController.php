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
            ['name' => 'types', 'total' => Type::count()],
            ['name' => 'devices', 'total' => Device::count()],
            ['name' => 'characteristicValues', 'total' => CharacteristicValue::count()],
            ['name' => 'contacts', 'total' => Contact::count()],
            ['name' => 'clients', 'total' => Client::count()],
        ];

        $not_approved = Comment::where('is_approved', 0)
            ->take(10)
            ->with(['app'])
            ->get();

        return view('manager.dashboard.index')
            ->with([
                'modals' => $modals,
                'not_approved' => $not_approved,
            ]);
    }
}
