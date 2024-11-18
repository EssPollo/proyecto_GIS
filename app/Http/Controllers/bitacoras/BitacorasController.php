<?php

namespace App\Http\Controllers\bitacoras;

use App\Http\Controllers\Controller;
use App\Models\Bitacora;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Notifications\ExampleNotification;
use Illuminate\Support\Facades\Notification;
use App\Notifications;
use App\Models\DetallesBitacora;




class BitacoraController extends Controller
{
   /**
     * Display a listing of the resource.
     */
    public function index(Request $request, $proyecto_id)
    {
        //Consultar las bitacoras de un poryecto
        $bitacoras = Bitacora::where('proyecto_id', $proyecto_id)->get();
        $heads = [
            'Bitácora Tipo',
            'Descripción',
            'Fecha de creación',
            'Registros',
            'Acciones'
        ];

        return view('bitacoras.index', compact('proyecto_id', 'bitacoras', 'heads'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Aquí puedes agregar lógica si necesitas mostrar un formulario de creación
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

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
    public function edit($id)
    {
        // Aquí puedes agregar lógica si necesitas mostrar un formulario de edición
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Aquí puedes agregar lógica si necesitas actualizar un registro específico
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($proyecto_id, $bitacora_id)
    {
        Bitacora::destroy($bitacora_id);

        if(!Bitacora::find($bitacora_id)) {
            Toastr::success('La bitácora se eliminó con éxito.', 'Éxito');
        } else {
            Toastr::error('No se pudo eliminar la bitácora.', 'Error');
        }
    
        // Redirige a donde necesites después de la eliminación
        return redirect()->route('proyectos.bitacoras.index',  ['proyecto_id' => $proyecto_id]);

    }
}
