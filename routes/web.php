<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\FarmaceuticoController;

/*
Route::get('/', function () {
    return view('welcome');
});*/

Auth::routes();



//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', function () {
    return redirect('/login');
});

Route::resource('admin',AdminController::class)
    ->only(['index', 'create', 'edit','destroy','show','update','store'])->names([
    'index' => 'admin.index', 
    'create' => 'admin.create',
    'store' => 'admin.store'
])->middleware('custom.auth');

Route::resource('doctor',DoctorController::class)
    ->only(['index', 'create', 'edit','destroy','show','update','store'])->names([
    'index' => 'admin.index', 
    'create' => 'admin.create',
    'store' => 'admin.store'
])->middleware('custom.auth');
    
Route::resource('farmaceutico',FarmaceuticoController::class)
    ->only(['index', 'create', 'edit','destroy','show','update','store'])->names([
    'index' => 'admin.index', 
    'create' => 'admin.create',
    'store' => 'admin.store'
])->middleware('custom.auth');
