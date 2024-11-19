@extends('adminlte::page')

@section('adminlte_css')
    <link rel="stylesheet" href="{{ asset('css/new_general.css') }}">
    <style>
        .form-container {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: 20px auto;
        }

        .form-field {
            margin-bottom: 15px;
        }

        .form-field label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
            color: #333;
        }

        .form-field input,
        .form-field textarea,
        .form-field select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
            color: #555;
        }

        .form-field input:focus,
        .form-field textarea:focus,
        .form-field select:focus {
            outline: none;
            border-color: #007bff;
            box-shadow: 0 0 3px rgba(0, 123, 255, 0.5);
        }

        .btn-submit {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn-submit:hover {
            background-color: #0056b3;
        }
    </style>
@stop

@section('content_header')
    <div class="col-sm-6-left">
        <h1 class="m-0 text-dark">Generar una nueva cita médica</h1>
        <ol class="breadcrumb float-sm-left">
            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Menú principal</a></li>
            <li class="breadcrumb-item active">Generar nueva cita médica</li>
        </ol>
    </div>
    <br>
@stop

@section('content')
    {!! Toastr::message() !!}
    <div class="form-container">
        <form action="{{ route('paciente.store') }}" method="post">
            @csrf

            <!-- Nombre -->
            <div class="form-field">
                <label for="nombre">Nombre del paciente:</label>
                <input id="nombre" name="nombre" type="text" placeholder="Escribe tu nombre completo" required>
            </div>

            <!-- Correo Electrónico -->
            <div class="form-field">
                <label for="correo">Correo electrónico:</label>
                <input id="correo" name="correo" type="email" placeholder="Ingresa tu correo electrónico" required>
            </div>

            <!-- Teléfono -->
            <div class="form-field">
                <label for="telefono">Teléfono:</label>
                <input id="telefono" name="telefono" type="tel" placeholder="Ingresa tu número de teléfono" required>
            </div>

            <!-- Fecha de la cita -->
            <div class="form-field">
                <label for="fecha_cita">Fecha de la cita:</label>
                <input id="fecha_cita" name="fecha_cita" type="date" required>
            </div>

            <!-- Hora de la cita -->
            <div class="form-field">
                <label for="hora_cita">Hora de la cita:</label>
                <input id="hora_cita" name="hora_cita" type="time" required>
            </div>

            <!-- Motivo de la cita -->
            <div class="form-field">
                <label for="motivo">Motivo de la cita:</label>
                <textarea id="motivo" name="motivo" rows="4" placeholder="Describe el motivo de tu cita" required></textarea>
            </div>

            <!-- Especialidad -->
            <div class="form-field">
                <label for="especialidad">Especialidad:</label>
                <select id="especialidad" name="especialidad" required>
                    <option value="" disabled selected>Selecciona una especialidad</option>
                    <option value="general">Medicina General</option>
                    <option value="pediatria">Pediatría</option>
                    <option value="cardiologia">Cardiología</option>
                    <option value="dermatologia">Dermatología</option>
                    <option value="psicologia">Psicología</option>
                </select>
            </div>

            <!-- Botón de Enviar -->
            <button type="submit" class="btn-submit">Confirmar cita</button>
        </form>
    </div>
@stop


