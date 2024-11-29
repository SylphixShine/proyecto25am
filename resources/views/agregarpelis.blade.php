@extends('layouts.plantilla')

@section('titulo')
<div class="titular">
    AGREGAR PELICULAS:
</div>    
@endsection

@section('general')

<form action="/guardarpelis" method="POST" class="mt-4" enctype="multipart/form-data">
    @csrf
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
                <input type="text" class="form-control" id="nombre" name="nombre" maxlength="100" required>
            </div>

            <div class="mb-3">
                <label for="sinopsis" class="form-label">Sinopsis</label>
                <textarea class="form-control" id="sinopsis" name="sinopsis" rows="4" required></textarea>
            </div>

            <div class="mb-3">
                <label for="genero" class="form-label">Género</label>
                <select class="form-select" id="genero" name="genero">
                    <option value="" selected>Selecciona un género</option>
                    <option value="Acción">Acción</option>
                    <option value="Animación">Animación</option>
                    <option value="Aventuras">Aventuras</option>
                    <option value="Bélico">Bélico</option>
                    <option value="Biográfico">Biográfico</option>
                    <option value="Ciencia ficción">Ciencia ficción</option>
                    <option value="Comedia">Comedia</option>
                    <option value="Documental">Documental</option>
                    <option value="Drama">Drama</option>
                    <option value="Erótico">Erótico</option>
                    <option value="Espionaje">Espionaje</option>
                    <option value="Fantástico">Fantástico</option>
                    <option value="Histórico">Histórico</option>
                    <option value="Mudo">Mudo</option>
                    <option value="Musical">Musical</option>
                    <option value="Negro">Negro</option>
                    <option value="Policíaco">Policíaco</option>
                    <option value="Suspense">Suspense</option>
                    <option value="Terror">Terror</option>
                    <option value="Thriller">Thriller</option>
                    <option value="Western">Western</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="duracion" class="form-label">Duración (en minutos)</label>
                <input type="number" class="form-control" id="duracion" name="duracion" min="1" required>
            </div>

            <div class="mb-3">
                <label for="fecha" class="form-label">Fecha de Estreno</label>
                <input type="date" class="form-control" id="fecha" name="fecha" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="link" class="form-label">Enlace al Tráiler</label>
                <input type="url" class="form-control" id="link" name="link" placeholder="https://youtube.com/...">
            </div>

            <div class="mb-3">
                <label class="form-label">Clasificación</label>
                <div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="clasificacionAA" name="clasificacion" value="AA">
                        <label class="form-check-label" for="clasificacionAA">AA</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="clasificacionA" name="clasificacion" value="A">
                        <label class="form-check-label" for="clasificacionA">A</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="clasificacionB" name="clasificacion" value="B">
                        <label class="form-check-label" for="clasificacionB">B</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="clasificacionB15" name="clasificacion" value="B15">
                        <label class="form-check-label" for="clasificacionB15">B15</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="clasificacionC" name="clasificacion" value="C">
                        <label class="form-check-label" for="clasificacionC">C</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="clasificacionD" name="clasificacion" value="D">
                        <label class="form-check-label" for="clasificacionD">D</label>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Idiomas</label>
                <div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="idiomaEspanol" name="idiomas[]" value="Español">
                        <label class="form-check-label" for="idiomaEspanol">Español</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="idiomaIngles" name="idiomas[]" value="Inglés">
                        <label class="form-check-label" for="idiomaIngles">Inglés</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="idiomaFrances" name="idiomas[]" value="Francés">
                        <label class="form-check-label" for="idiomaFrances">Francés</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="idiomaAleman" name="idiomas[]" value="Alemán">
                        <label class="form-check-label" for="idiomaAleman">Alemán</label>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="formFile" class="form-label">Póster de la Película</label>
                <input class="form-control" type="file" id="foto" name="foto" accept="image/*" required onchange="mostrarImagen(event)">
                <br>
                <img id="imgPreview" src="#" alt="Vista previa de la imagen" style="display: none; margin-top: 10px;" width="150px">
            </div>
        </div>
    </div>

    <button type="submit" class="btn btn-warning">Guardar Película</button>
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