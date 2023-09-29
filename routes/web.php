<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;

Route::get('/', function () {
    $data = [
        'title' => 'Index'
    ];
    return view('index', $data);
});

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/dashboard', function () {
    $data = [
        'title' => 'Dashboard'
    ];

    return view('dashboard', $data);
})->middleware(['auth'])->name('dashboard');

Route::get('/profile', function () {
    $data = [
        'title' => 'Profile'
    ];

    return view('profile', $data);
})->name('profile');

Route::get('/settings', function () {
    $data = [
        'title' => 'Settings'
    ];

    return view('settings', $data);
})->name('settings');

Route::resource('users', UserController::class);
    
Route::resource('roles', RoleController::class);

Route::resource('permissions', PermissionController::class);