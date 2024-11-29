<div class="modal" id="mensajeModal" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Mensaje</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          @if (session('mensaje'))
          <p>{{ session('mensaje') }}</p>
      @else
          <p>No hay mensaje en la sesión</p>
      @endif
      
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const mensajeModal = new bootstrap.Modal(document.getElementById('mensajeModal'));
        @if (session('mensaje'))
            mensajeModal.show();
            setTimeout(() => {
                mensajeModal.hide();
            }, 3000);
        @endif
    });
</script>