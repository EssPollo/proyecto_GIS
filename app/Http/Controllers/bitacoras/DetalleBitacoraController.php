<?php

namespace App\Http\Controllers\bitacoras;

use Brian2694\Toastr\Facades\Toastr;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Notifications\ExampleNotification;

use App\Models\DetalleBitacora;
use App\Models\Proyecto;

class DetalleBitacoraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($proyecto_id, $bitacora_id)
    {
        $entradas_detalles_bitacora = DetalleBitacora::where('bitacora_id', $bitacora_id)
        ->with('usuario')
        ->orderBy('fecha','asc')
        -> get();
        $heads = [
            'No.',
            'Entradas/Observaciones',
            'Fecha',
            'Usuario',
        ];

        return view('bitacoras.details', compact('proyecto_id','bitacora_id', 'entradas_detalles_bitacora', 'heads'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        //Asignamos el request a las varibles correspondientes
        $bitacora_id = $request->input('bitacora_id');
        $proyecto_id = $request->input('proyecto_id');
        $observacion = $request->input('descripcion');
        //primero validamos que el campo descripcion no este vacio
        $request->validate([
            'descripcion' => 'required',
        ], [
            'descripcion.required' => 'Porfavor introduzca una descripción.',
        ]);
        //Creamos un nuevo registro en la tabla detalles_bitacoras
        DetalleBitacora::create([
            'observacion' => $observacion,
            'fecha' => now(),
            'usuario_id' => auth()->user()->id,
            'bitacora_id' => $bitacora_id,
            
        ]);
        /*
        //Mandamos un mensaje de confirmación a telegram
        $fecha = now();
        $fechaEnString = $fecha->format('Y-m-d');
        $horaEnString = $fecha->format('H:i:s');
        $nombre_proyecto = Proyecto::find($proyecto_id);
        $message = "En la bitácora del proyecto ". $nombre_proyecto->nombre ." acaban de escribir: " .  $observacion . "\nEl usuario: " . auth()->user()->name . "\nCon fecha: " . $fechaEnString . " y hora: " . $horaEnString;
        auth()->user()->notify(new ExampleNotification($message));
        //Mandamos un mensaje de confirmación al usuario y redirimimos a la vista de detalles de la bitacora
        Toastr::success('El registro se creeo con exito', 'Éxito');
        return redirect()->route('proyectos.bitacoras.detalles.index', ['proyecto_id' => $proyecto_id, 'bitacora_id' => $bitacora_id]);*/
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
