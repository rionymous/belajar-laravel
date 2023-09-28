<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;

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

Route::group(['middleware' => ['web']], function () {
    Route::get('/users', [UserController::class, 'index'])->name('user.index');
    Route::get('/users/add', [UserController::class, 'add'])->name('user.add');
    Route::post('/users/create', [UserController::class, 'create'])->name('user.create');
    Route::get('/users/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::post('/users/update/{id}', [UserController::class, 'update'])->name('user.update');
    Route::get('/users/delete/{id}', [UserController::class, 'destroy'])->name('user.delete');
});

Route::group(['middleware' => ['web']], function () {
    Route::get('/roles', [RoleController::class, 'index'])->name('role.index');
    Route::get('/roles/add', [RoleController::class, 'add'])->name('role.add');
    Route::post('/roles/create', [RoleController::class, 'create'])->name('role.create');
    Route::get('/roles/edit/{id}', [RoleController::class, 'edit'])->name('role.edit');
    Route::post('/roles/update/{id}', [RoleController::class, 'update'])->name('role.update');
    Route::get('/roles/delete/{id}', [RoleController::class, 'delete'])->name('role.delete');
});