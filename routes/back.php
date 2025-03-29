<?php

use App\Http\Controllers\Backend\B_DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('dashboard', [B_DashboardController::class, 'index']); 