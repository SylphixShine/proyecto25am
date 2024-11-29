<link rel="stylesheet" href="/css/styles.css">
<link rel="stylesheet" href="/css/cacahuate.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

@extends('layouts.plantilla')

@section('general')

<div class="container mt-5">
  <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      
      <div class="carousel-item active">
        <div class="row align-items-center">
          <div class="col-md-6">
            <img id="wi" src="/imagenes/wicked.jpeg" class="d-block w-100 rounded" height= "450px" alt="Wicked Image">
          </div>
          <div class="col-md-6">
            <h2 class="display-4 fw-bold">Elphaba y Glinda llegaron a la pantalla grande</h2>
            <p class="lead">Ariana Grande y Cynthia Erivo nos traen este musical lleno de magia y colores. ¡Ven a disfrutarlo!</p>
            <a href="https://cinepolis.com/"><button class="btn btn-primary btn-lg">Quiero boletos</button></a>
          </div>
        </div>
      </div>
      
      <div class="carousel-item">
        <div class="row align-items-center">
          <div class="col-md-6">
            <img id="heathers" src="/imagenes/heathers.jpg" class="d-block w-100 rounded" height= "450px" alt="Another Movie">
          </div>
          <div class="col-md-6">
            <h2 class="display-4 fw-bold">Heathers: Un Musical Oscuro y Divertido que No Puedes Perderte</h2>
            <p class="lead">Prepárate para una mezcla explosiva de humor negro, drama adolescente y música pegajosa. Con personajes inolvidables y giros inesperados, Heathers te llevará al mundo salvaje de la preparatoria Westerburg. ¡Ven y descubre por qué este musical de culto ha conquistado al público en todo el mundo!!</p>
            <a href="https://cinepolis.com/"><button class="btn btn-primary btn-lg">Comprar boletos</button></a>
          </div>
        </div>
      </div>
      
      <div class="carousel-item">
        <div class="row align-items-center">
          <div class="col-md-6">
            <img id="mean" src="/imagenes/CP.png" class="d-block w-100 rounded" height= "450px" alt="Yet Another Movie">
          </div>
          <div class="col-md-6">
            <h2 class="display-4 fw-bold">Un clásico regresa</h2>
            <p class="lead">El 20° aniversario de Chicas Pesadas está a la vuelta de la esquina. ¡Aprovecha y compra tus boletos ya!</p>
            <a href="https://cinepolis.com/"><button class="btn btn-primary btn-lg">Ver más detalles</button></a>
          </div>
        </div>
      </div>
      
    </div>
    
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
</div>

@include('partials.mensaje')

@endsection