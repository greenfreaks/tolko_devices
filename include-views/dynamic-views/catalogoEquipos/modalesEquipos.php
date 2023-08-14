<!-- Modal Equipos -->
<div class="modal fade" id="modalEquipos" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="boldTx modal-title" id="exampleModalLabel">Registrar nuevo componente</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" id="" class="mb-3">
          <input type="hidden" id="action" value="registrarNuevo_equipo">
          <h5>Nombre del componente</h5>
          <input type="text" class="uppercase form-control" name="nuevoEquipo_nombre" id="nuevoEquipo_nombre">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn smBtn" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" id="btnRegNuevoEquipo" name="btnRegNuevoEquipo" class=" btnRegNuevoEquipo bgBlack whiteTx smBtn">Registrar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Estatus -->
<div class="modal fade" id="modalEstatus" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="boldTx modal-title" id="exampleModalLabel">Registrar nuevo estatus</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="" class="mb-3">
          <h5>Nombre del estatus</h5>
          <input type="text" class="uppercase form-control" id="nuevoEstatus_nombre">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn smBtn" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" id="btnRegNuevoEstatus" class="bgBlack whiteTx smBtn">Registrar</button>
      </div>
    </div>
  </div>
</div>

