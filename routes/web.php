<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
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

//Route::get('/admin', function () {    return "Admin Dashboard (En construccion)";})->name('admin');
Route::get('/doctor', function () {    return "Doctor Dashboard (En construccion)";})->name('doctor');
Route::get('/farmaceutico', function () {    return "Farmacutico Dashboard (En construccion)";})->name('farmaceutico');
