<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

class F_DashboardController
{
    public function index()
    {
        // $users = User::all(); // Example: Retrieve data from the database
        return view('front.dashboard.index');
    }
}
