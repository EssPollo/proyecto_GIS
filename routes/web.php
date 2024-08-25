<?php

use Illuminate\Support\Facades\Route;
/*
Route::get('/', function () {
    return view('welcome');
});*/

Auth::routes();



//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', function () {
    return redirect('/login');
});

Route::get('/admin', function () {    return "Admin Dashboard (En construccion)";})->name('admin');
Route::get('/doctor', function () {    return "Doctor Dashboard (En construccion)";})->name('doctor');
Route::get('/farmaceutico', function () {    return "Farmac%C3%A9utico Dashboard (En construccion)";})->name('farmaceutico');