<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cinemagic</title>
    <link rel="icon" href="/imagenes/favicon.ico" type="image/x-icon">
    {{-- bootstrap --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    {{-- fontawesome --}}
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">  
    {{-- google- fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
|   <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    {{-- css --}}
    <link rel="stylesheet" href="/css/styles.css">
</head>
<body >
  <div id="contenedor">
    <div class="cont">
      <div class="img-cont">
        <img src="/imagenes/fonditoo.png" alt="" class="img-fond">
        <div class="text-img">Cinemagic</div>
      </div>
      <div id="esquina-izq-arriba" class="foquito"></div>
      <div id="esquina-der-arriba" class="foquito"></div>
      <div id="esquina-izq-abajo" class="foquito"></div>
      <div id="esquina-der-abajo" class="foquito"></div>
      <div id="izq">
        <div class="foquito"></div>
      </div>
      <div id="arri">
        <div class="foquito"></div><div class="foquito"></div><div class="foquito"></div><div class="foquito"></div><div class="foquito"></div>
        <div class="foquito"></div><div class="foquito"></div><div class="foquito"></div><div class="foquito"></div><div class="foquito"></div>
        <div class="foquito"></div><div class="foquito"></div><div class="foquito"></div><div class="foquito"></div><div class="foquito"></div>
        <div class="foquito"></div><div class="foquito"></div><div class="foquito"></div><div class="foquito"></div><div class="foquito"></div>
        <div class="foquito"></div><div class="foquito"></div><div class="foquito"></div><div class="foquito"></div>
      </div>
      <div id="aba">
        <div class="foquito"></div><div class="foquito"></div><div class="foquito"></div><div class="foquito"></div><div class="foquito"></div>
        <div class="foquito"></div><div class="foquito"></div><div class="foquito"></div><div class="foquito"></div><div class="foquito"></div>
        <div class="foquito"></div><div class="foquito"></div><div class="foquito"></div><div class="foquito"></div><div class="foquito"></div>
        <div class="foquito"></div><div class="foquito"></div><div class="foquito"></div><div class="foquito"></div><div class="foquito"></div>
        <div class="foquito"></div><div class="foquito"></div><div class="foquito"></div><div class="foquito"></div>
      </div>
      <div id="dere">
        <div class="foquito"></div>
      </div>
    </div>
  </div>
@include('partials.mensaje')
@include('partials.cabecera')
@yield('titulo')
  <div class="contenedor">
    @yield('general')
  </div>
@include('partials.footer')
</body>
</html>