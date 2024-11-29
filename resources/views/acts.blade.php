@extends('layouts.plantilla')
@section('titulo')
<div class="titular"> ACTORES: </div>    
@endsection
@section('general')
<div class="catalogo">
  @foreach ($actores as $actor)
      <div class="actor_tg" >
        <div class="card actor-card">
            <img src="/fotos_actores/{{$actor->foto}}" alt="{{$actor->nombre}}">
            <div class="card-body card-body3">
                <h2 class="card-title">{{$actor->nombre}}</h2>
                <p class="card-text">Edad: {{$actor->edad}}</p>
                <div class="mb-4">
                    <h5 class="font-weight-bold mb-2">Trabajos Notables:</h5>
                    <ul class="list-unstyled pl-3">
                        <li>{{$actor->part1}}</li><li>{{$actor->part2}}</li><li>{{$actor->part3}}</li>
                    </ul>
                </div>
                <div class="d-flex justify-content-between">
                    <p>Nominaciones a premios: {{$actor->nominaciones}}</p>
                    <p>Películas: {{$actor->peliculas}}</p>
                </div>
                <div class="btn-group">
                  <form action="{{route('borraracts',$actor)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger boton-eliminar"><i class="fas fa-trash-alt"></i></button>
                  </form>
                  <a href="{{route('editaracts',$actor)}}">
                  <button type="button" class="btn btn-dark boton-cambiar"><i class="fas fa-edit"></i></button>   
                  </a>
                </div>
            </div>
        </div>
      </div>
  @endforeach
</div>
@endsection