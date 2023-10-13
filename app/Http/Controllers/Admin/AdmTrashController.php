<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TrashRequest;
use App\Trash;
use App\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class AdmTrashController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $query = Trash::with('user');

            return DataTables::of($query)
                ->addColumn('action', function ($item) {
                    return '
                        <div class="btn-group">
                            <div class="dropdown">
                                <button class="btn btn-primary dropdown-toggle mr-1 mb-1"
                                    type="button" id="action' .  $item->id . '"
                                        data-toggle="dropdown"
                                        aria-haspopup="true"
                                        aria-expanded="false">
                                        Aksi
                                </button>
                                <div class="dropdown-menu" aria-labelledby="action' .  $item->id . '">
                                    <a class="dropdown-item" href="">
                                        Sunting
                                    </a>
                                    <form action="' . route('trash-destroy', $item->id) . '" method="POST">
                                        ' . method_field('delete') . csrf_field() . '
                                        <button type="submit" class="dropdown-item text-danger">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </div>
                    </div>';
                })
                ->rawColumns(['action'])
                ->make();
                // ' . route('product.edit', $item->id) . '
                // ' . route('trash.destroy', $item->id) . '
        }

        return view('pages.admin.trash.index');
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();

        return view('pages.admin.trash.create',[
            'users' => $users,
        ]);
    }

    public function store(TrashRequest $request)
    {
        $data = $request->except(['users_id']);

        $data['slug'] = Str::slug($request->name);
        $data['users_id'] = Auth::id();

        Trash::create($data);

        return redirect()->route('trash-index');
    }

    public function destroy($id)
    {
        $item = Trash::findorFail($id);
        $item->delete();

        return redirect()->route('trash-index');

    }
}
