@extends('adminlte::page')
@section('adminlte_css')
    <link rel="stylesheet" href="{{ asset('css/new_general.css') }}">
    
@stop

@section('content_header')
    <div class="col-sm-6-left">
        <h1 class="m-0 text-dark">Detalles del paciente</h1> 
        <ol class="breadcrumb float-sm-left">
            <li class="breadcrumb-item"><a href="{{ route('doctor.index') }}">Menú principal</a></li>
            <li class="breadcrumb-item"><a href="{{ route('paciente.index') }}">Pacientes del día</a></li>
            <li class="breadcrumb-item active">Historial Paciente</li>
        </ol>
    </div>
    <br>
    <div class="mt-2 d-flex align-items-center">
        <button type="button" class="btn btn-primary ml-auto" data-toggle="modal" data-target="#agregar_tipo_bitacora">
            ¿Algo ocurrió hoy?, ¡agrégalo a su bitácora!
        </button>
    </div>
@stop


@section('content')
    {!! Toastr::message() !!}
    <div class="card">
        <div class="card-body">
            <x-adminlte-datatable class="table-head-color" id="table1" :heads="$heads" theme="light" striped
                hoverable>
                    <tr>
                        <td>Diabetes</td>
                        <td>12/05/2020</td>
                        <td>18/10/2024</td>
                        <td>El paciente evoluciono a la primera vez que vino</td>
                        <td>Insulina</td>
                        <td>20mg</td>
                        <td>1</td>
                    </tr>
                    <tr>
                        <td>Insuficiencia Renal</td>
                        <td>5/09/2021</td>
                        <td>15/11/2024</td>
                        <td>El paciente muestra coloracion marron</td>
                        <td>Merfomina</td>
                        <td>3 mg</td>
                        <td>3</td>
                    </tr>
                    <tr>
                        <td>Bronquitis crónica</td>
                        <td>12/05/2020</td>
                        <td>18/10/2024</td>
                        <td>El paciente se valoro</td>
                        <td>XL3</td>
                        <td>1 tableta</td>
                        <td>1</td>
                    </tr>
                    <tr>
                        <td>Enfisema pulmonar</td>
                        <td>12/05/2020</td>
                        <td>18/10/2024</td>
                        <td>Sin diagnostico</td>
                        <td>Placebo</td>
                        <td>2 tabletas</td>
                        <td>3</td>
                    </tr>
            </x-adminlte-datatable>
        </div>
    </div>



    <!-- Modal para agregar una nueva bitacora -->
<div class="modal fade" id="agregar_tipo_bitacora" tabindex="-1" role="dialog" aria-labelledby="bitacoraModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="bitacoraModalLabel">Agregar un nuevo evento</h5>
            </div>
            <div class="modal-body">
                <form id="formulario" method="POST" action="#">
                    @csrf
                    <input type="hidden" name="proyecto_id">
                    <input type="hidden" name="bitacora_id"> 
                    <div class="form-group">
                        {{ html()->label('Descripción', 'descripcion') }}
                        {{ html()->textarea('descripcion')->class('form-control')->placeholder('Ingrese una nueva observación')->rows(3) }}
                        @error('descripcion')
                            <small class="text-danger err-message"><strong> Campo Obligatorio </strong></small>
                        @enderror
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@stop


@push('js')
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endpush