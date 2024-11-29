<style>
    .catalogoo h3 {
        width: 100%;
        text-align: center;
        margin-bottom: 15px;
        color: #ffcc00;
    }
    
    .card2, .actor-card {
        width: calc(25% - 20px); 
        min-width: 250px;
        max-width: 300px;
        border: 1px solid #ccc;
        border-radius: 8px;
        overflow: hidden;
        text-align: center;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        background-color: #fff;
    }
    
    .card2:hover, .actor-card:hover {
        transform: scale(1.05);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }
    
    .card2-body, .card-body {
        padding: 10px;
        background-color: rgba(0, 0, 0, 0.7);
        color: #fff;
    }
    
    .actor-card img {
        width: 100%;
        height: 300px; /* Mantener una altura uniforme */
        object-fit: cover;
        border-bottom: 1px solid #ccc;
    }
    
    p {
        color: #666;
        font-size: 1rem;
    }
    
    @media (max-width: 768px) {
        .card2, .actor-card {
            width: calc(50% - 20px); 
        }
    }
    
    @media (max-width: 480px) {
        .card2, .actor-card {
            width: 100%; 
        }
    }
    #act{
        text-align: left !important;
    }
    </style>
    
    @extends('layouts.plantilla')
    
    @section('titulo')
    <div class="titular">
        Resultados de búsqueda para: "{{ $query }}"
    </div>
    @endsection
    
    @section('general')
    <div class="catalogoo">
        <h3>Películas:</h3>
        @forelse ($peliculas as $pelicula)
            <a href="{{ route('pelicula', $pelicula) }}">
                <div class="card card2" style="background: url('/fotos_peliculas/{{ $pelicula->foto }}') no-repeat center center / cover;">
                    <div class="card-body card2-body">
                        <h5 class="card-title">{{ $pelicula->nombre }}</h5>
                    </div>
                </div>
            </a>
        @empty
            <p>No se encontraron películas.</p>
        @endforelse
    </div>
    
    <div class="catalogoo" >
        <h3>Actores:</h3>
        @forelse ($actores as $actor)
        <div class="actor_tg">
            <div class="card actor-card" id="act">
                <img src="/fotos_actores/{{$actor->foto}}" alt="{{$actor->nombre}}">
                <div class="card-body card-body3">
                    <h2 class="card-title">{{$actor->nombre}}</h2>
                    <p class="card-text">Edad: {{$actor->edad}}</p>
                    <div class="mb-4">
                        <h5 class="font-weight-bold mb-2">Trabajos Notables:</h5>
                        <ul class="list-unstyled pl-3">
                            <li>{{$actor->part1}}</li>
                            <li>{{$actor->part2}}</li>
                            <li>{{$actor->part3}}</li>
                        </ul>
                    </div>
                    <div class="d-flex justify-content-between">
                        <p>Nominaciones al Oscar: {{$actor->nominaciones}}</p>
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
        @empty
            <p>No se encontraron actores.</p>
        @endforelse
    </div>
    @endsection