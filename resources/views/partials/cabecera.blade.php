<nav class="navbar navbar-expand-lg">
    <div class="container-fluid row" >

        <ul class="navbar-nav ">
          <li class="nav-item col-2">
            <a class="nav-link active" href="/">Inicio</a>
          </li>
          <li class="nav-item col-2">
            <a class="nav-link active" href="/pelis">Películas</a>
          </li>
          <li class="nav-item col-2">
            <a class="nav-link active" href="/acts">Actores</a>
          </li>
          <li class="nav-item col-3">
            <a class="nav-link active" href="/agregarpelis">Agregar Películas</a>
          </li>
          <li class="nav-item col-3">
            <a class="nav-link active" href="/agregaracts">Agregar Actores</a>
          </li>
        </ul>
      </div>

      <form class="d-flex col-6" id="formBusqueda" role="search" method="GET" action="{{ route('buscar') }}">
        <input class="form-control me-2" type="search" name="query" placeholder="Buscar" aria-label="Buscar">
        <button class="btn btn-outline-warning" type="button" onclick="realizarBusqueda()">
            <i class="fa-solid fa-magnifying-glass"></i>
        </button>
    </form>
</nav>

<script>
  function realizarBusqueda() {
      const form = document.getElementById('formBusqueda');
      form.submit();
  }
</script>