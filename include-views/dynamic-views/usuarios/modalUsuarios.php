<!-- Modal Agendar -->
<div class="modal fade" id="modalUsuarios" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="boldTx modal-title" id="exampleModalLabel">Registrar usuarios</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="" class="mb-3">
          <h5>Nombre completo del nuevo usuario</h5>
          <input type="text" class="uppercase form-control" id="admin_nombre">

          <h5>Nombre de usuario</h5>
          <input type="text" class="uppercase form-control" id="admin_usuario">


          <h5>Nivel </h5>
          <select name="" class="form-select" id="admin_nivel">
            <option value="">Selecciona el tipo de usuario</option>
            <?php require "../php/fill/admin_nivel.php" ?>
          </select>

          <h5>Contraseña</h5>
          <input type="text" class="inputPassword form-control" id="admin_password">
          <ul>
            <li class="boldTx">Características necesarias para crear una contraseña:</li>
            <li>Mínimo 8 caracteres</li>
            <li>Almenos una letra mayúscula</li>
            <li>Almenos una letra minúscula</li>
            <li>Almenos un caracter numérico</li>
            <li>No debe tener espacios en blanco</li>
            <li>Al menos un caracter especial <b>(!, @, #, $, %, &, *)</b></li>
          </ul>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn smBtn" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" id="btnRegUsuario" class="inputSubmit bgBlack whiteTx smBtn">Registrar</button>
      </div>
    </div>
  </div>
</div>