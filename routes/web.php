<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\F_DashboardController;

<<<<<<< HEAD
// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [F_DashboardController::class, 'index']);
Route::get('/book', [F_AppointmentController::class, 'index']);
=======
Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('auth.login');
});

// oauth
Route::get('oauth/google', [\App\Http\Controllers\OauthController::class, 'redirectToProvider'])->name('oauth.google');
Route::get('oauth/google/callback', [\App\Http\Controllers\OauthController::class, 'handleProviderCallback'])->name('oauth.google.callback');
>>>>>>> 0bf6e880d17c2fd3f052f80c814c19942488f275
