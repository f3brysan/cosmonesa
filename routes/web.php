<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\F_DashboardController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [F_DashboardController::class, 'index']);
