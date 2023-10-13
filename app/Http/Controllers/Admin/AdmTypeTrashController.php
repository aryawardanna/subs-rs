<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TrashTypeRequest;
use App\TypeTrash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class AdmTypeTrashController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $query = TypeTrash::get();

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
                                    <form action="" method="POST">
                                        ' . method_field('delete') . csrf_field() . '
                                        <button type="submit" class="dropdown-item text-danger">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </div>
                    </div>';
                    // ' . route('product-gallery.destroy', $item->id) . '
                })
                ->editColumn('photos', function ($item) {
                    return $item->photos ? '<img src="' . Storage::url($item->photos) . '" style="max-height: 80px;"/>' : '';
                })
                ->rawColumns(['action','photos'])
                ->make();
        }

        return view('pages.admin.type-trash.index');
    }

    public function create()
    {
        return view('pages.admin.type-trash.create');
    }

    public function store(TrashTypeRequest $request)
    {
        $data = $request->all();

        $data['photos'] = $request->file('photos')->store('assets/type-trash', 'public');

        TypeTrash::create($data);

        return redirect()->route('type-trash-index');
    }
}
