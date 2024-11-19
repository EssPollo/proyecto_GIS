<?php


use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\FarmaceuticoController;
use App\Http\Controllers\bitacoras\TipoBitacoraController;
use App\Http\Controllers\bitacoras\BitacoraController;
use App\Http\Controllers\bitacoras\DetalleBitacoraController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\fotosController;
use App\Http\Controllers\UsuarioController;

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
    'index' => 'doctor.index', 
    'create' => 'doctor.create',
    'store' => 'doctor.store'
])->middleware('custom.auth');
    
Route::resource('farmaceutico',FarmaceuticoController::class)
    ->only(['index', 'create', 'edit','destroy','show','update','store'])->names([
    'index' => 'farmaceutico.index', 
    'create' => 'farmaceutico.create',
    'store' => 'farmaceutico.store'
])->middleware('custom.auth');

/**Pacientes */
Route::resource('paciente', PacienteController::class)
    ->only(['index', 'create', 'store', 'edit', 'update', 'destroy','show'])
    ->names([
        'index' => 'paciente.index',
        'create' => 'paciente.create',
        'store' => 'paciente.store',
    ])
    ->middleware('custom.auth');





/*TIPOS DE BITACORA*/
Route::resource('proyectos/{proyecto_id}/tipos_bitacora', TipoBitacoraController::class)
->only(['index', 'create', 'store', 'edit', 'update', 'destroy','show'])
->names([
    'index' => 'proyectos.tipos_bitacoras.index',
    'destroy' => 'proyectos.tipos_bitacoras.destroy',
    'store' => 'proyectos.tipos_bitacoras.store',
    'update' => 'proyectos.tipos_bitacoras.update',
    'create' => 'proyectos.tipos_bitacoras.create',
    'edit' => 'proyectos.tipos_bitacoras.edit',
])
->middleware('custom.auth');

/*BITACORAS*/
Route::resource('proyectos/{proyecto_id}/bitacoras', BitacoraController::class)
    ->only(['index', 'create', 'show', 'store', 'edit', 'update', 'destroy'])
    ->names([
        'index' => 'proyectos.bitacoras.index',
        'create' => 'proyectos.bitacoras.create',
        'show' => 'proyectos.bitacoras.show',
        'store' => 'proyectos.bitacoras.store',
        'edit' => 'proyectos.bitacoras.edit',
        'update' => 'proyectos.bitacoras.update',
        'destroy' => 'proyectos.bitacoras.destroy',

    ])
    ->middleware('custom.auth');

/*DETALLES DE BITACORA*/
Route::resource('historial_paciente', DetalleBitacoraController::class)
    ->only(['index', 'create', 'store', 'edit', 'update', 'destroy','show'])
    ->names([
        'index' => 'historial.index',
    ])
    ->middleware('custom.auth');

Route::resource('fotos', FotosController::class)
    ->only(['index', 'create', 'store', 'edit', 'update', 'destroy','show','fotoPaciente'])
    ->names([
        'index' => 'fotos.index',
        'create' => 'fotos.create',
        'store' => 'fotos.store',

    ])
    ->middleware('custom.auth');
Route::post('fotos/upload', [FotosController::class, 'uploadImage'])->name('fotos.upload');
Route::get('fotos_paciente', [FotosController::class, 'fotoPaciente'])->name('fotos.paciente');

/*Ususrio*/
Route::resource('usuario', UsuarioController::class)
    ->only(['index', 'create', 'show', 'store', 'edit', 'update', 'destroy'])
    ->names([
        'index' => 'usuario.index',
        'create' => 'usuario.create',


    ])
    ->middleware('custom.auth');