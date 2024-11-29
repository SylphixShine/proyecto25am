@extends('layouts.plantilla')
@section('general')
<div class="container py-5 card-peli">
    <div class="card ">
        <div class="row no-gutters">
            <div class="col-md-4">
                <img src="/fotos_peliculas/{{$pelicula->foto}}" class="card-img img-peli" alt="Póster de la película">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h1 class="card-title">{{$pelicula->nombre}}</h1>
                    <div class="mb-3">
                        <span class="badge bg-light text-dark border me-1">{{$pelicula->genero}}</span>
                    </div>
                    <p class="card-text">{{$pelicula->sinopsis}}</p>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <h5 class="card-text"><strong>Duración: </strong> {{$pelicula->duracion}}min</h5>
                        </div>
                        <div class="col-md-6">
                            <h5 class="card-text"><strong>Fecha de Estreno: </strong>{{$pelicula->fecha}}</h5>
                        </div>
                        <div class="col-md-6">
                            <h5 class="card-text"><strong>Clasificación: </strong>{{$pelicula->clasificacion}}</h5>
                        </div>
                        <div class="col-md-6">
                            <h5 class="card-text"><strong>Idiomas: </strong> 
                                @foreach (explode(',', $pelicula->idiomas) as $idioma)
                                <span class="badge bg-light text-dark border me-1">{{$idioma}}</span>
                                @endforeach</h5>
                        </div>
                    </div>
                    <div class="separator"></div>
                    <h5>Tráiler:</h5>
                    <div class="embed-responsive embed-responsive-16by9 mb-3">
                        @if($pelicula->link)
                            <iframe 
                                width="750" 
                                height="400" 
                                src="{{ $pelicula->link }}" 
                                title="YouTube video player" 
                                frameborder="0" 
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                                allowfullscreen>
                            </iframe>
                        @else
                            <p>No hay tráiler disponible para esta película.</p>
                        @endif
                    </div> <br><br>                   
                    <div class="btn-group botonera">
                        <form action="{{route('borrarpelis',$pelicula)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger boton-eliminar"><i class="fas fa-trash-alt"></i></button>
                        </form>
                        <a href="{{route('editarpelis',$pelicula)}}">
                        <button type="button" class="btn btn-dark boton-cambiar"><i class="fas fa-edit"></i></button>   
                        </a>
                      </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection