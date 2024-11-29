@extends('layouts.plantilla')
@section('titulo')
<div class="titular">
    {{$pelicula->nombre}}
</div>    
@endsection
@section('general')
    <form action="{{ route('actpelis', $pelicula->id) }}" method="POST" class="mt-4" enctype="multipart/form-data">
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
                    <label for="nombre" class="form-label">Nombre de la Película</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre', $pelicula->nombre) }}" maxlength="100" required>
                </div>
                <div class="mb-3">
                    <label for="sinopsis" class="form-label">Sinopsis</label>
                    <textarea class="form-control" id="sinopsis" name="sinopsis" rows="4" required>{{ old('sinopsis', $pelicula->sinopsis) }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="genero" class="form-label">Género</label>
                    <select class="form-select" id="genero" name="genero">
                        <option value="" {{ $pelicula->genero == null ? 'selected' : '' }}>Selecciona un género</option>
                        @foreach (['Acción', 'Animación', 'Aventuras', 'Bélico', 'Biográfico', 'Ciencia ficción', 'Comedia', 'Documental', 'Drama', 'Erótico', 'Espionaje', 'Fantástico', 'Histórico', 'Mudo', 'Musical', 'Negro', 'Policíaco', 'Suspense', 'Terror', 'Thriller', 'Western'] as $genero)
                            <option value="{{ $genero }}" {{ $pelicula->genero == $genero ? 'selected' : '' }}>{{ $genero }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="duracion" class="form-label">Duración (en minutos)</label>
                    <input type="number" class="form-control" id="duracion" name="duracion" value="{{ old('duracion', $pelicula->duracion) }}" min="1" required>
                </div>
                <div class="mb-3">
                    <label for="fecha" class="form-label">Fecha de Estreno</label>
                    <input type="date" class="form-control" id="fecha" name="fecha" value="{{ old('fecha', $pelicula->fecha) }}" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="link" class="form-label">Enlace al Tráiler</label>
                    <input type="url" class="form-control" id="link" name="link" value="{{ old('link', $pelicula->link) }}" placeholder="https://youtube.com/...">
                </div>
                <div class="mb-3">
                    <label class="form-label">Clasificación</label>
                    <div>
                        @foreach (['AA', 'A', 'B', 'B15', 'C', 'D'] as $clasificacion)
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="clasificacion{{ $clasificacion }}" name="clasificacion" value="{{ $clasificacion }}" {{ $pelicula->clasificacion == $clasificacion ? 'checked' : '' }}>
                                <label class="form-check-label" for="clasificacion{{ $clasificacion }}">{{ $clasificacion }}</label>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Idiomas</label>
                    <div>
                        @foreach (['Español', 'Inglés', 'Francés', 'Alemán'] as $idioma)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="idioma{{ $idioma }}" name="idiomas[]" value="{{ $idioma }}" {{ in_array($idioma, explode(',', $pelicula->idiomas ?? '')) ? 'checked' : '' }}>
                                <label class="form-check-label" for="idioma{{ $idioma }}">{{ $idioma }}</label>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="mb-3">
                    <label for="foto" class="form-label">Póster de la Película</label>
                    <input class="form-control" type="file" id="foto" name="foto" accept="image/*" onchange="mostrarImagen(event)">
                    <br>
                    <img id="imgPreview" 
                         src="{{ $pelicula->foto ? asset('storage/fotos_peliculas/' . $pelicula->foto) : '#' }}" 
                         alt="Vista previa de la imagen" 
                         style="{{ $pelicula->foto ? '' : 'display: none;' }} margin-top: 10px;" 
                         width="150px">
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar Película</button>
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
