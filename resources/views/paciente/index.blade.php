@extends('adminlte::page')

@section('adminlte_css')
    <link rel="stylesheet" href="{{ asset('css/new_general.css') }}">
@stop

@section('content_header')
    <div class="col-sm-6-left">
        <h1 class="m-0 text-dark"> Pacientes del día</h1>
        <ol class="breadcrumb float-sm-left">
            <li class="breadcrumb-item"><a href="{{ route('doctor.index') }}">Menú principal</a></li>
            <li class="breadcrumb-item active">Pacientes</li>
        </ol>
    </div>
    <br>
    <div class="mt-2 d-flex align-items-center">
        <button type="button" class="btn btn-primary ml-auto" data-toggle="modal" data-target="#agregar_tipo_bitacora">
            Agregar un nuevo paciente
        </button>
    </div>
@stop

@section('content')
    {!! Toastr::message() !!}
    <div class="card">
        <div class="card-body">
            <x-adminlte-datatable class="table-head-color" id="table1" :heads="['Nombre', 'Apellido paterno', 'Apellido materno','Historial','Evidencia Fotográfica']" theme="light" striped hoverable>
                    <tr>
                        <td>Alan</td>
                        <td>Ramirez</td>
                        <td>Navarrete</td>
                        <td>
                            <img src="{{ asset('images/icons/btn_ver.png') }}" class="custom_btn" alt="Detalles"
                                    onclick="simulateClickById('Detalles_')">
                            
                                    <a id="Detalles_"
                                        href="{{ route('historial.index') }}"
                                        class="btn btn-sm btn-primary mx-1 shadow" title="Detalles" style="display: none;">
                                        Foto
                                    </a>
                        </td>
                        <td>
                            <img src="{{ asset('images/icons/btn_foto.png') }}" class="custom_btn" alt="Fotografia"
                            onclick="simulateClickById('Fotografia_')">
                        </td>
                        <a id="Fotografia_"
                        href="{{ route('fotos.paciente') }}"
                        class="btn btn-sm btn-primary mx-1 shadow" title="Detalles" style="display: none;">
                        Foto
                    </a>
                    </tr>
                    <tr>
                        <td>Karla</td>
                        <td>Cruz</td>
                        <td>Hernandez</td>
                        <td>
                            <img src="{{ asset('images/icons/btn_ver.png') }}" class="custom_btn" alt="Detalles"
                                    onclick="simulateClickById('#')">
                        </td>
                        <td>
                            <img src="{{ asset('images/icons/btn_foto.png') }}" class="custom_btn" alt="Fotografia"
                            onclick="document.getElementById('#').submit();">
                        </td>
                    </tr>
                    <tr>
                        <td>Guadalupe</td>
                        <td>Navarrete</td>
                        <td>Tovar</td>
                        <td>
                            <img src="{{ asset('images/icons/btn_ver.png') }}" class="custom_btn" alt="Detalles"
                                    onclick="simulateClickById('#')">
                        </td>
                        <td>
                            <img src="{{ asset('images/icons/btn_foto.png') }}" class="custom_btn" alt="Fotografia"
                            onclick="document.getElementById('#').submit();">
                        </td>
                    </tr>
                    <tr>
                        <td>Amelie</td>
                        <td>Ramírez</td>
                        <td>Cruz</td>
                        <td>
                            <img src="{{ asset('images/icons/btn_ver.png') }}" class="custom_btn" alt="Detalles"
                                    onclick="simulateClickById('#')">
                        </td>
                        <td>
                            <img src="{{ asset('images/icons/btn_foto.png') }}" class="custom_btn" alt="Fotografia"
                            onclick="document.getElementById('#').submit();">
                        </td>
                    </tr>
            </x-adminlte-datatable>
        </div>
    </div>

    <!-- Modal para agregar una nueva bitácora -->
<div class="modal fade" id="agregar_tipo_bitacora" tabindex="-1" role="dialog" aria-labelledby="bitacoraModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="bitacoraModalLabel">Agregar un nuevo paciente</h5>
            </div>

        </div>
    </div>
</div>


@stop

@push('js')
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        // Limpia el modal de agregar bitácora
        $(document).ready(function() {
            $('#formulario').on('submit', function() {
                $('#tipo_bitacora').val('');
                $('#nuevo_tipo_bitacora').val('');
                $('#descripcion').val('');
            });
        });
    </script>

    <script>
        function abrirModalEditar(element) {
            var id = $(element).data('id');
            var nombre = $(element).data('nombre');
            var descripcion = $(element).data('descripcion');

            $('#formularioEditar').attr('action', `/proyectos/${proyecto_id}/tipos_bitacoras/${id}`);
            $('#formularioEditar input[name="tipo_bitacora"]').val(nombre);
            $('#formularioEditar textarea[name="descripcion"]').val(descripcion);

            $('#editar_tipo_bitacora').modal('show');
        }
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const tipoBitacoraSelect = document.querySelector('select[name="tipo_bitacora"]');
            const nuevoTipoBitacoraContainer = document.getElementById('nuevo_tipo_bitacora_container');

            tipoBitacoraSelect.addEventListener('change', function() {
                if (this.value === 'crear_nuevo') {
                    nuevoTipoBitacoraContainer.style.display = 'block';
                } else {
                    nuevoTipoBitacoraContainer.style.display = 'none';
                }
            });

            // Add event listener for form submission
            document.getElementById('formulario').addEventListener('submit', function(event) {
                event.preventDefault(); // Prevent the form from submitting normally
                const formData = new FormData(this);
                for (let [key, value] of formData.entries()) {
                    console.log(key, value); // Print form data to console
                }
                // Submit the form programmatically after logging the data
                this.submit();
            });
        });
    </script>

@endpush


