<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdmDashboardController extends Controller
{
    public function index()
    {
        $customer = User::count();
        // $revenue = Transaction::sum('total_price');
        // $transaction = Transaction::count();

        return view('pages.admin.dashboard');
    }
}
