<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; 
use App\Models\Paciente;
use App\Notifications\NotificacionBotTelegram;
use Brian2694\Toastr\Facades\Toastr;
use Barryvdh\DomPDF\Facade\Pdf;

class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
       // Obtén el usuario autenticado 
       $doctor = auth()->user(); 
       // Obtén los pacientes del doctor 
       $pacientes = $doctor->patients;
        return view('paciente.index',compact('pacientes', 'doctor') );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('historial.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Capturar los datos del formulario
        $nombre = $request->input('nombre');
        $correo = $request->input('correo');
        $telefono = $request->input('telefono');
        $fechaCita = $request->input('fecha_cita');
        $horaCita = $request->input('hora_cita');
        $motivo = $request->input('motivo');
        $especialidad = $request->input('especialidad');

        // Formatear la fecha y hora actuales
        $fechaActual = now()->format('Y-m-d');
        $horaActual = now()->format('H:i:s');

        // Crear el mensaje para Telegram
        $mensajeParaTelegram = "Nueva Cita Médica Solicitada:\n\n" .
            "🗓️ **Fecha de la Cita:** $fechaCita\n" .
            "⏰ **Hora de la Cita:** $horaCita\n" .
            "👤 **Paciente:** $nombre\n" .
            "📧 **Correo:** $correo\n" .
            "📞 **Teléfono:** $telefono\n" .
            "🩺 **Especialidad:** $especialidad\n" .
            "📝 **Motivo:** $motivo\n\n" .
            "📅 **Fecha de Solicitud:** $fechaActual\n" .
            "⏱️ **Hora de Solicitud:** $horaActual";

        try {
            $usuario = new \App\Models\User();
            $usuario->notify(new \App\Notifications\NotificacionBotTelegram($mensajeParaTelegram));

            // Mostrar mensaje de éxito con Toastr
            Toastr::success('Cita Confirmada', 'Éxito');

        } catch (\Exception $e) {
            // En caso de error, mostrar mensaje de fallo
            Toastr::error('No se pudo enviar el mensaje a Telegram. Intenta nuevamente.', 'Error');
            return back();
        }

        return redirect()->route('admin.index');
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

    public function PacientePDF()
    {

        $pdf = PDF::loadView('paciente.pdf');
        return $pdf->stream();

    }
}
