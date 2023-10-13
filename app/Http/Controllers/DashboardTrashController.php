<?php

namespace App\Http\Controllers;

use App\User;
use App\Category;
use App\ProductGallery;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\ProductRequest;
use App\Trash;

class DashboardTrashController extends Controller
{
    public function index()
    {
        $trash = Trash::select('*')->get();

        return view('pages.dashboard-trash',[
            'trash' => $trash
        ]);
    }

    public function uploadGallery(Request $request)
    {
        $data = $request->all();

        $data['photos'] = $request->file('photos')->store('assets/product', 'public');

        ProductGallery::create($data);

        return redirect()->route('dashboard-trash-details', $request->trash_id);
    }

    public function deleteGallery(Request $request, $id)
    {
        $item = ProductGallery::findorFail($id);
        $item->delete();

        return redirect()->route('dashboard-trash-details', $item->trash_id);
    }

    public function create()
    {
        $users = User::all();

        return view('pages.dashboard-trash-create',[
            'users' => $users,
        ]);
    }

    public function store(TrashRequest $request)
    {
        $data = $request->all();

        $data['slug'] = Str::slug($request->name);
        $product = Trash::create($data);

        $gallery = [
            'trash_id' => $product->id,
            'photos' => $request->file('photo')->store('assets/trash', 'public')
        ];
        ProductGallery::create($gallery);

        return redirect()->route('dashboard-trash');
    }

    public function update(TrashRequest $request, $id)
    {
        $data = $request->all();

        $item = Trash::findOrFail($id);

        $data['slug'] = Str::slug($request->name);

        $item->update($data);

        return redirect()->route('dashboard-trash');
    }
}
