@extends('adminlte::page')

@section('adminlte_css')
    <link rel="stylesheet" href="{{ asset('css/new_general.css') }}">
@stop

@section('content_header')
    <div class="col-sm-6-left">
        <h1 class="m-0 text-dark"> Bitacora de medicamentos</h1>
        <ol class="breadcrumb float-sm-left">
            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Menú principal</a></li>
            <li class="breadcrumb-item active">Hisorial clinico</li>
        </ol>
    </div>
    <br>
@stop

@section('content')
    {!! Toastr::message() !!}
    <div class="card">
        <div class="card-body">
            <x-adminlte-datatable class="table-head-color" id="table1" :heads="['Nombre medicamento', 'Dosis en unidades', 'Dosis por día','Fecha de inicio','Fecha final']" theme="light" striped hoverable>
                    <tr>
                        <td>Insulina</td>
                        <td>20mg</td>
                        <td>1</td>
                        <td>25/12/2021</td>
                        <td>31/12/2021</td>
                        
                    </tr>
                    <tr>
                        <td>Insulina</td>
                        <td>20mg</td>
                        <td>1</td>
                        <td>25/12/2021</td>
                        <td>31/12/2021</td>
                        
                    </tr>
                    <tr>
                        <td>Insulina</td>
                        <td>20mg</td>
                        <td>1</td>
                        <td>25/12/2021</td>
                        <td>31/12/2021</td>
                        
                    </tr>
                    <tr>
                        <td>Insulina</td>
                        <td>20mg</td>
                        <td>1</td>
                        <td>25/12/2021</td>
                        <td>31/12/2021</td>
                        
                    </tr>
                    <tr>
                        <td>Insulina</td>
                        <td>20mg</td>
                        <td>1</td>
                        <td>25/12/2021</td>
                        <td>31/12/2021</td>
                        
                    </tr>

            </x-adminlte-datatable>
        </div>
    </div>

@stop
