<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class fotosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $files = Storage::disk('public')->files('images/fotosTemporales');

        // Convertir las rutas de archivos a URLs accesibles públicamente
        $fotos = array_map(function ($file) {
            return Storage::url($file);
        }, $files);
        //dd($fotos);

        return view('fotos.index', compact('fotos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('fotos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        logger()->info('Inicio del método store.');
    
        // Validar los datos
        try {
            logger()->info('Validando los datos...');
            $request->validate([
                'descripcionFotografia' => 'required|string|max:255',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:5120', // Guarda hasta 5 MB
            ]);
            logger()->info('Datos validados correctamente.');
        } catch (\Exception $e) {
            logger()->error('Error en la validación: ' . $e->getMessage());
            return response()->json(['success' => false, 'error' => 'Validación fallida'], 400);
        }
    
        // Guardar la imagen
        if ($request->hasFile('image')) {
            logger()->info('El archivo de imagen está presente.');
    
            $file = $request->file('image');
    
            // Verificar el tamaño del archivo y el tipo MIME
            $size = $file->getSize();
            $mimeType = $file->getMimeType();
    
            // Log de tamaño y tipo MIME
            logger()->info('Tamaño del archivo: ' . $size);
            logger()->info('Tipo MIME del archivo: ' . $mimeType);
    
            // Guardar el archivo utilizando el sistema de archivos de Laravel
            try {
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $path = 'images/fotosTemporales/' . $filename;
                Storage::disk('public')->putFileAs('images/fotosTemporales', $file, $filename);
    
                // Log de la ruta del archivo
                logger()->info('Ruta del archivo almacenado manualmente: ' . $path);
    
                return redirect()->route('proyectos.fotos.index', ['id_proyecto']);
            } catch (\Exception $e) {
                // Log del error
                logger()->error('Error al almacenar el archivo manualmente: ' . $e->getMessage());
                return response()->json(['success' => false, 'error' => 'Error al almacenar la imagen manualmente'], 500);
            }
        } else {
            // Log de error si no se encuentra la imagen
            logger()->error('No image uploaded');
            return response()->json(['success' => false, 'error' => 'No image uploaded'], 400);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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

    public function uploadImage(Request $request)
    {
        if($request->hasFile('image')) {
            $file = $request->file('image');
            $path = $file->store('public/images/fotosTemporales');
            return response()->json(['path' => Storage::url($path)], 200);
        } else {
            return response()->json(['error' => 'No image uploaded'], 400);
        }
    }
}
