<?php

namespace App\Http\Controllers;

use App\User;
use App\Category;
use App\ProductGallery;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\ProductRequest;
use App\Http\Requests\Admin\TrashTypeRequest;
use App\TypeTrash;

class DashboardTypeTrashController extends Controller
{
    public function index()
    {
        $typeTrash = TypeTrash::select('*')->get();

        return view('pages.dashboard-trash',[
            'typeTrash' => $typeTrash
        ]);
    }

    public function create()
    {
        $users = User::get();
        $typeTrash = TypeTrash::select('*')->get();

        return view('pages.dashboard-trash-create',[
            'users' => $users,
            'typeTrash' => $typeTrash
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->all();

        TypeTrash::create($data);
        return redirect()->route('dashboard-trash');
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();

        $item = TypeTrash::findOrFail($id);

        $item->update($data);

        return redirect()->route('dashboard-trash');
    }

    public function details($id)
    {
        $users = User::get();
        $typeTrash = TypeTrash::select('*')->where('id' , $id)->first();
        $types = TypeTrash::select('*')->get();
        return view('pages.dashboard-trash-details',[
            'users' => $users,
            'typeTrash' => $typeTrash,
            'types' => $types,
        ]);
    }
}
