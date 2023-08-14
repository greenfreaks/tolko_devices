<!-- Modal Areas -->
<div class="modal fade" id="modalArea" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="boldTx modal-title" id="exampleModalLabel">Registrar nueva Área</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="" class="mb-3">
          <input type="hidden" id="action" value="registrar_nuevaArea">
          <h5>Nombre de la área</h5>
          <input type="text" class="uppercase form-control" id="nombre_nuevaArea">

          <h5>Nombre del jefe de la área</h5>
          <input type="text" class="uppercase form-control" id="jefe_nuevaArea">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn smBtn" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" id="btnRegNuevaArea" class="bgBlack whiteTx smBtn">Registrar</button>
      </div>
    </div>
  </div>
</div>