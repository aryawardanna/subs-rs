<?php

namespace App\Http\Controllers;

use App\TypeTrash;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        return view('pages.dashboard');
    }

    public function trendTrash()
    {
        $trends = TypeTrash::select('name', \DB::raw('SUM(qty) as jml'))
            ->groupBy('name')
            ->orderBy('jml', 'desc')
            ->get();

        // Konversi data menjadi format JSON
        $jsonData = [];

        foreach ($trends as $trend) {
            $jsonData[] = [
                'name' => $trend->name,
                'jml' => $trend->jml,
            ];
        }

        return response()->json($jsonData);
    }
}
