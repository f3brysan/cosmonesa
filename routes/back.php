<?php

use App\Http\Controllers\API\ApiRajaOngkirController;
use App\Http\Controllers\Backend\B_DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('dashboard', [B_DashboardController::class, 'index']); 

// API RAJA ONGKIR
Route::get('/provinces', [ApiRajaOngkirController::class, 'getProvinces']);
Route::get('/cities/{id}', [ApiRajaOngkirController::class, 'getCities']);