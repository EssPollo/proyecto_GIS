@extends('adminlte::page')

@section('adminlte_css')
    <link rel="stylesheet" href="{{ asset('css/new_general.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.min.css">
@stop

@section('content_header')
    <div class="col-sm-6-left">
        <h1 class="m-0 text-dark">Evidencia Fotográfica de los Pacientes</h1>
        <ol class="breadcrumb float-sm-left">
            <li class="breadcrumb-item"><a href="{{ route('doctor.index') }}">Menú principal</a></li>
            <li class="breadcrumb-item active">Galería</li>
        </ol>
    </div>
    <br>
    <div class="mt-2 d-flex align-items-center">
        <a href="{{ route('fotos.create') }}" class="btn btn-primary ml-auto">
            ¡Agregar una nueva evidencia Fotográfica!
        </a>
    </div>
@stop

@section('content')
    {!! Toastr::message() !!}
    <div class="card card-primary">
        <div class="card-body">
            <div class="row">
                @foreach (['imagen_1', 'imagen_2', 'imagen_3', 'imagen_4', 'imagen_5', 'imagen_6', 'imagen_7'] as $index => $image)
                    <div class="filtr-item col-sm-3" data-category="1" data-sort="white sample">
                        <a href="{{ asset("images/galeria/$image.jpeg") }}" data-toggle="lightbox" data-gallery="gallery" data-title="Evidencia {{ $index + 1 }}">
                            <img src="{{ asset("images/galeria/$image.jpeg") }}" class="images-custom" alt="Evidencia {{ $index + 1 }}" />
                            <p>Evidencia {{ $index + 1 }}</p>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@stop

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.min.js"></script>
    <script>
        $(document).on('click', '[data-toggle="lightbox"]', function(event) {
            event.preventDefault();
            $(this).ekkoLightbox({
                alwaysShowClose: true
            });
        });
    </script>
@stop
