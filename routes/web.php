<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\F_DashboardController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [F_DashboardController::class, 'index']);
Route::get('/book', [F_AppointmentController::class, 'index']);

Route::get('/login', function () {
    return view('auth.login');
});

// oauth
Route::get('oauth/google', [\App\Http\Controllers\OauthController::class, 'redirectToProvider'])->name('oauth.google');  
Route::get('oauth/google/callback', [\App\Http\Controllers\OauthController::class, 'handleProviderCallback'])->name('oauth.google.callback');
