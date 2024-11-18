<?php

namespace App\Http\Controllers\bitacoras;
use Illuminate\Support\Facades\Log;

use App\Http\Controllers\Controller;
use App\Models\Bitacora;
use App\Models\TipoBitacora;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Database\Eloquent\Casts\Json;

class TipoBitacoraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($proyecto_id)
    {
        $tipos_bitacoras = TipoBitacora::where('proyecto_id', $proyecto_id)->with('tipoBitacora')->get();

        $heads = [
            'Tipo de bitácora',
            'Acciones'
        ];

        return view('bitacora.index', compact('heads', 'tipos_bitacoras', 'proyecto_id'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {


    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $proyecto_id)
    {
                //dd($request->all());
                //Pasamos todos los datos del formulario a variables independientes
                $tipo_bitacora = $request->input('tipo_bitacora');
                $nuevo_tipo_bitacora = $request->input('nuevo_tipo_bitacora');
                $nuevo_tipo_bitacora_comparar = ucfirst(iconv('UTF-8', 'ASCII//TRANSLIT', str_replace(' ', '', strtolower(trim($request->input('nuevo_tipo_bitacora')))))); //Primero convierto lo que me pase(eJemPlo) en minusculas(ejemplo) y despues la primera en mayuscula y demas en minuscurlas (Ejemplo) no importa si pasa null no afectara
                $descripcion = $request->input('descripcion');
                //Validamos los campos (tipo_bitacora, nuevo_tipo_bitacora,descripcion)
                $request->validate([
                    'tipo_bitacora' => 'required',
                    'nuevo_tipo_bitacora' => 'required_if:tipo_bitacora,crear_nuevo',
                    'descripcion' => 'required',
                ], [
                    'tipo_bitacora.required' => 'El campo Tipo de bitácora es obligatorio.',
                    'nuevo_tipo_bitacora.required_if' => 'El campo Nuevo tipo de bitácora es obligatorio cuando Tipo de bitácora es crear_nuevo.',
                    'descripcion.required' => 'Porfavor introduzca una descripción.',
                ]);
                
        
                //Si el usuario pone crear nuevo tipo, primero debemos verificar si ya existe
                if($tipo_bitacora == 'crear_nuevo'){
                    Log::info('Esto me da nuevo_tipo_bitacora : '.$nuevo_tipo_bitacora . ' y nuevo_tipo_bitacora_comparar:' . $nuevo_tipo_bitacora_comparar);
                    $todos_tipos_bitacora = TipoBitacora::pluck('nombre')->toArray();
                    // Eliminar espacios al principio y al final, también entre palabras, y transliterar acentos/caracteres especiales esto para evitar errores de duplicados
                    $todos_tipos_bitacora = array_map(function($tipo) {
                        $tipo_sin_espacios = str_replace(' ', '', trim($tipo));
                        return iconv('UTF-8', 'ASCII//TRANSLIT', $tipo_sin_espacios);
                    }, $todos_tipos_bitacora);

                    // Transliterar el nuevo tipo de bitácora ingresado por el usuario
                    $nuevo_tipo_bitacora_comparar = iconv('UTF-8', 'ASCII//TRANSLIT', str_replace(' ', '', trim($nuevo_tipo_bitacora_comparar)));

                    Log::info('Voy a comparar nuevo_tipo_bitacora_comparar: '.$nuevo_tipo_bitacora_comparar . ' con todos los tipos de bitacora: '.json_encode($todos_tipos_bitacora));
                    if(in_array($nuevo_tipo_bitacora_comparar,$todos_tipos_bitacora)){
                       
                        Toastr::error('El tipo de bitácora que desa crear ya existe.', 'Error');
                       
                        return redirect()->route('proyectos.bitacoras.index', ['proyecto_id' => $proyecto_id]);
                    }else{
                        // sino existe el tipo de bitacora lo creo y se lo agrego a la tabla de tipos de bitacora
                        $nuevo_tipo_bitacora = TipoBitacora::create([
                            'nombre' => $nuevo_tipo_bitacora,
                        ]);
                        //Ahora se lo asigno a mi tabla bitacoras
                        Bitacora::create([
                            'descripcion' => $descripcion,
                            'proyecto_id' => $proyecto_id,
                            'tipo_bitacora_id' => $nuevo_tipo_bitacora->id,
                        ]);
                        Toastr::success('El tipo de bitácora se ha creado correctamente.', 'Éxito');
                        return redirect()->route('proyectos.bitacoras.index', ['proyecto_id' => $proyecto_id]);
        
                    }
                }
                //Si el usuario elije un tipo de bitacora existente pero tambien ya esta en su proyecto debemos decirle que ya existe
                $existeBitacora = Bitacora::where('proyecto_id', $proyecto_id)
                                            ->where('tipo_bitacora_id', $tipo_bitacora)
                                            ->exists();
                if($existeBitacora){
                    Toastr::error('El tipo de bitácora que desa crear ya existe.', 'Error');
                    return redirect()->route('proyectos.bitacoras.index', ['proyecto_id' => $proyecto_id]);
                }
        
                //Si el usuario elije un tipo de bitacora existente y ya corroboramos que no esta en su tabla entonces solo lo agrego a la tabla de bitacoras
                Bitacora::create([
                    'descripcion' => $descripcion,
                    'proyecto_id' => $proyecto_id,
                    'tipo_bitacora_id' => $tipo_bitacora,
                ]); 
                Toastr::success('El tipo de bitácora se ha creado correctamente.', 'Éxito');
                return redirect()->route('proyectos.bitacoras.index', ['proyecto_id' => $proyecto_id]);

    }


    /**
     * Display the specified resource.
     */
    public function show()
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
    public function update(Request $request,$proyecto_id,$tipo_bitacora_id)
    {

    }

    /**
     * Remove the specified resource from storage.
     */

     public function destroy($proyecto_id, $tipo_bitacora_id)
    {

    }


}
