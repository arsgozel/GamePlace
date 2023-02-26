<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\App;
use App\Models\Client;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'q' => 'nullable|string|max:255',
            'app' => 'nullable|integer|min:1|exists:apps,id',
            'clients' => 'nullable|integer|min:1|exists:clients,id',
        ]);


        $q = $request->q ?: null;
        $f_app = $request->app ?: null;
        $f_clients = $request->clients ?: null;

        $objs = Comment::when($q, function ($query, $q) {
            return $query->where(function ($query) use ($q) {
                $query->orWhere('comment', 'like', '%' . $q . '%');
                $query->orWhere('commented_at', 'like', '%' . $q . '%');
            });
        })
            ->when($f_app, function ($query, $f_app) {
                $query->where('app_id', $f_app);
            })
            ->when($f_clients, function ($query, $f_clients) {
                $query->where('client_id', $f_clients);
            })
            ->with(['client', 'app'])
            ->orderBy('id', 'desc')
            ->paginate(50)
            ->withQueryString();

        $app = App::orderBy('name_tm')
            ->get();

        $clients = Client::orderBy('name')
            ->get();

        return view('manager.comments.index')
            ->with([
                'objs' => $objs,
                'app' => $app,
                'clients' => $clients,
                'f_app' => $f_app,
                'f_clients' => $f_clients,
            ]);
    }

    public function edit($id)
    {
        $obj = Comment::findOrFail($id);

        return view('manager.comments.edit')
            ->with([
                'obj' => $obj,
            ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'is_approved' => 'integer',
        ]);

        $obj = Comment::findOrFail($id);
        $obj->is_approved = $request->is_approved ?: 0;
        $obj->update();

        return to_route('manager.comments.index')
            ->with([
                'success' => trans('app.updated') . '!'
            ]);
    }


    public function destroy($id)
    {
        $obj = Comment::findOrFail($id);
        $objName = $obj->name;
        $obj->delete();

        return redirect()->back()
            ->with([
                'success' => trans('app.deleted') . '!'
            ]);
    }
}