@extends('layouts.plantilla')
@section('titulo')
<div class="titular">
    {{$actor->nombre}}
</div>    
@endsection
@section('general')
    <form action="{{ route('actacts', $actor->id) }}" method="POST" class="mt-4" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre del Actor/Actriz</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre', $actor->nombre) }}" maxlength="100" required>
                </div>
                <div class="mb-3">
                    <label for="edad" class="form-label">Edad</label>
                    <input type="number" class="form-control" id="edad" name="edad" value="{{ old('edad', $actor->edad) }}" min="0" required>
                </div>
                <div class="mb-3">
                    <label><b>Participaciones:</b></label><br>
                    <label for="part1" class="form-label">Participación 1</label>
                    <input type="text" class="form-control" id="part1" name="part1" value="{{ old('part1', $actor->part1) }}">
                </div>
                <div class="mb-3">
                    <label for="part2" class="form-label">Participación 2</label>
                    <input type="text" class="form-control" id="part2" name="part2" value="{{ old('part2', $actor->part2) }}">
                </div>
                <div class="mb-3">
                    <label for="part3" class="form-label">Participación 3</label>
                    <input type="text" class="form-control" id="part3" name="part3" value="{{ old('part3', $actor->part3) }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="nominaciones" class="form-label">Nominaciones</label>
                    <input type="number" class="form-control" id="nominaciones" name="nominaciones" value="{{ old('nominaciones', $actor->nominaciones) }}" min="0" required>
                </div>
                <div class="mb-3">
                    <label for="peliculas" class="form-label">Número de Películas</label>
                    <input type="number" class="form-control" id="peliculas" name="peliculas" value="{{ old('peliculas', $actor->peliculas) }}" min="0" required>
                </div>
                <div class="mb-3">
                    <label for="foto" class="form-label">Foto del Actor/Actriz</label>
                    <input class="form-control" type="file" id="foto" name="foto" accept="image/*" onchange="mostrarImagen(event)">
                    <br>
                    <img id="imgPreview" 
                         src="{{ $actor->foto ? asset('storage/fotos_actores/' . $actor->foto) : '#' }}" 
                         alt="Vista previa de la imagen" 
                         style="{{ $actor->foto ? '' : 'display: none;' }} margin-top: 10px;" 
                         width="150px">
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar Actor/Actriz</button>
    </form>
    <script>
        function mostrarImagen(event) {
            const input = event.target;
            const imgPreview = document.getElementById('imgPreview');

            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    imgPreview.src = e.target.result;
                    imgPreview.style.display = 'block';
                }
                reader.readAsDataURL(input.files[0]);
            } else {
                imgPreview.style.display = 'none';
                imgPreview.src = '#';
            }
        }
    </script>
@endsection