@extends('adminlte::page')

@section('adminlte_css')
    <link rel="stylesheet" href="{{ asset('css/new_general.css') }}">
@stop

@section('content_header')
    <div class="col-sm-6-left">
        <h1 class="m-0 text-dark">Área de Fotos del proyecto: </h1>
        <ol class="breadcrumb float-sm-left">
            <li class="breadcrumb-item active">Fotos</li>
        </ol>
    </div>
    <br>
    <div class="mt-2 d-flex align-items-center">
        <a href="{{ route('fotos.create') }}" class="btn btn-primary ml-auto">
            ¡Agregar una nueva evidencia Fotográfica!
        </a>
    </div>
    <!-- Ejemplo de imagen con ruta especifica -->
    {{-- <div class="filtr-item col-sm-3" data-category="1" data-sort="white sample">
        <a class="galeria-a" href="{{ asset('storage/images/fotosTemporales/1717257743.jpg') }}" data-toggle="lightbox" data-title="sample 7 - white">
            <img src="{{ asset('storage/images/fotosTemporales/1717257743.jpg') }}" class="images-custom" alt="white sample" />
            <p>Evidencia 4</p>
        </a>
    </div> --}}
    <div class="filtr-item col-sm-3" data-category="1" data-sort="white sample">
        <a class="galeria-a" href="{{ asset('images/galeria/imagen_1.jpeg') }}" data-toggle="lightbox"
            data-title="sample 7 - white">
            <img src="{{ asset('images/galeria/imagen_1.jpeg') }}" class="images-custom" alt="white sample" />
            <p>Evidencia 1</p>
        </a>
        <a class="galeria-a" href="{{ asset('images/galeria/imagen_2.jpeg') }}" data-toggle="lightbox"
            data-title="sample 7 - white">
            <img src="{{ asset('images/galeria/imagen_2.jpeg') }}" class="images-custom" alt="white sample" />
            <p>Evidencia 2</p>
        </a>
    </div>
@stop

@section('content')
    {!! Toastr::message() !!}
    <div class="card card-primary">
        <div class="card-body">
            <div class="row">
                @foreach ($fotos as $i => $foto)
                    <div class="filtr-item col-sm-3" data-category="1" data-sort="white sample">
                        <a class="galeria-a" href="{{ $foto }}" data-toggle="lightbox"
                            data-title="Evidencia Fotográfica">
                            <img src="{{ $foto }}" class="images-custom" alt="Evidencia Fotográfica" />
                            <p>Evidencia {{ $i + 1 }}</p>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@stop
