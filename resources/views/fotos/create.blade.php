@extends('adminlte::page')

@section('content_header')
<div class="col-sm-6-left">
    <h1 class="m-0 text-dark">Crea una nueva Evidencia Fotográfica</h1>
    <ol class="breadcrumb float-sm-left">
        <li class="breadcrumb-item"><a href="{{ route('doctor.index') }}">Menú principal</a></li>
        <li class="breadcrumb-item"><a href="{{ route('fotos.index') }}">Evidencias Fotograficas</a></li>
        <li class="breadcrumb-item active">Galería</li>
    </ol>
</div>
<br>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form id="photoForm" enctype="multipart/form-data" method="POST"
                action="{{ route('fotos.store') }}">
                @csrf

                <div class="form-group">
                    <label for="descripcionFotografia">Descripción de la Fotografía</label>
                    <textarea name="descripcionFotografia" class="form-control" placeholder="Ingrese una breve descripción" rows="3"></textarea>
                    @error('descripcionFotografia')
                        <small class="text-danger err-message"><strong> {{ $message }} </strong></small>
                    @enderror
                </div>

                <div id="photoContainer" style="margin-top: 20px;">
                    <!-- La foto tomada se mostrará aquí -->
                </div>

                <button type="button" class="btn btn-primary" onclick="openCamera()">Tomar/Subir Foto</button>
                <input type="file" name="image" id="cameraInput" accept="image/*" capture="environment"
                    style="display: none;" onchange="handleImage(event)">

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary" id="submitButton" disabled>Guardar y Enviar</button>
                </div>
            </form>
        </div>
    </div>
@stop

@push('js')
    <script>
        function openCamera() {
            document.getElementById('cameraInput').click();
        }

        function handleImage(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const img = new Image();
                    img.src = e.target.result;
                    img.onload = function() {
                        const canvas = document.createElement('canvas');
                        const ctx = canvas.getContext('2d');

                        const maxWidth = 1920;
                        const maxHeight = 1080;
                        let width = img.width;
                        let height = img.height;

                        if (width > height) {
                            if (width > maxWidth) {
                                height *= maxWidth / width;
                                width = maxWidth;
                            }
                        } else {
                            if (height > maxHeight) {
                                width *= maxHeight / height;
                                height = maxHeight;
                            }
                        }

                        canvas.width = width;
                        canvas.height = height;
                        ctx.drawImage(img, 0, 0, width, height);

                        canvas.toBlob(function(blob) {
                            if (blob.size <= 5 * 1024 *
                                1024) { // Verificar si el tamaño es menor o igual a 5 MB
                                const newFile = new File([blob], file.name, {
                                    type: file.type
                                });
                                const dataTransfer = new DataTransfer();
                                dataTransfer.items.add(newFile);
                                document.getElementById('cameraInput').files = dataTransfer.files;

                                const imgElement = document.createElement('img');
                                imgElement.src = URL.createObjectURL(blob);
                                imgElement.style.maxWidth = '100%';
                                imgElement.style.height = 'auto';

                                const photoContainer = document.getElementById('photoContainer');
                                photoContainer.innerHTML = ''; // Limpiar cualquier contenido previo
                                photoContainer.appendChild(imgElement);

                                // Habilitar el botón "Guardar y Enviar"
                                document.getElementById('submitButton').disabled = false;
                            } else {
                                alert(
                                'La imagen sigue siendo demasiado grande después de redimensionarla.');
                            }
                        }, file.type, 0.95);
                    }
                }
                reader.readAsDataURL(file);
            }
        }
    </script>
@endpush
