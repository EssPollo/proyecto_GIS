@extends('adminlte::page')

@section('adminlte_css')
    <link rel="stylesheet" href="{{ asset('css/new_general.css') }}">
@stop

@section('content_header')
    <div class="col-sm-6-left">
        <h1 class="m-0 text-dark"> Bitacora de medicamentos</h1>
        <ol class="breadcrumb float-sm-left">
            <li class="breadcrumb-item"><a href="{{ route('farmaceutico.index') }}">Menú principal</a></li>
            <li class="breadcrumb-item active">Bitacora de Medicamentos</li>
        </ol>
    </div>
    <br>
@stop

@section('content')
    {!! Toastr::message() !!}
    <div class="card">
        <div class="card-body">
            <x-adminlte-datatable class="table-head-color" id="table1" :heads="['Paciente','Nombre medicamento', 'Cantidad']" theme="light" striped hoverable>
                    <tr>
                        <td>Alan</td>
                        <td>Insulina</td>
                        <td>1</td>
                        
                    </tr>
                    <tr>
                        <td>David</td>
                        <td>Insulina</td>
                        <td>1</td>
                        
                    </tr>
                    <tr>
                        <td>William</td>
                        <td>Insulina</td>
                        <td>1</td>
                        
                    </tr>
                    <tr>
                        <td>Karla</td>
                        <td>Insulina</td>
                        <td>1</td>
                        
                    </tr>
            </x-adminlte-datatable>
        </div>
    </div>

@stop