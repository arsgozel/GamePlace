<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\App;
use App\Models\Comment;
use Illuminate\Http\Request;

class AppController extends Controller
{

    public function show($slug)
    {
        $app = App::where('slug', $slug)
            ->with('comments:id','types:id,name_tm,name_en',
                'devices:id,name_tm,name_en',
                'CharacteristicValues.characteristic')
            ->firstOrFail();

        $comments = Comment::with(['client', 'app'])
            ->where('is_approved', 1)
            ->get();


        return view('client.apps.show')
            ->with([
                'app' => $app,
                'comments' => $comments,
            ]);

    }
}
