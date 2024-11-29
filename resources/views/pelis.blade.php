@extends('layouts.plantilla')

@section('titulo')
<div class="titular">
    PELICULAS:
</div>    
@endsection

@section('general')

<div class="catalogo">  
  @foreach ($peliculas as $pelicula)

  <a href='{{route('pelicula',$pelicula)}}'>
    <div class="card card2" style="width: 18rem; background: url('/fotos_peliculas/{{$pelicula->foto}}') no-repeat center center / cover;">
      <div class="card-body card2-body">
        <h5 class="card-title">{{$pelicula->nombre}}</h5>
        <p class="card-text"><b>Clasificación:</b> <span class="badge bg-secondary">{{$pelicula->clasificacion}}</span></p>
      </div>
    </div>  
  </a>
  
  @endforeach
</div>
@endsection
