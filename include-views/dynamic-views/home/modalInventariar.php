<!-- Modal Inventariar -->
<div class="modal fade" id="modalInventariar" data-bs-backdrop="static" tabindex="-1"
  aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="boldTx modal-title" id="exampleModalLabel">Nuevo componente</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="" class="mb-3">
          <input type="hidden" id="action" value="inventariar">
          <h5>Nombre del usuario</h5>
          <input type="text" class="uppercase form-control" id="usuario_nombre">

          <h5>Área del usuario</h5>
          <select name="" class="form-select" id="usuario_area">
            <option value="">SELECCIONA UNA ÁREA</option>
            <?php require "../php/fill/empresaArea.php" ?>
          </select>

          <h5>Puesto del usuario</h5>
          <input type="text" class="uppercase form-control" id="usuario_puesto">

          <h5>Nombre del componente</h5>
          <input type="text" class="uppercase form-control" id="equipo_nombre">

          <h5>Tipo de componente</h5>
          <select name="" class="form-select" id="equipo_tipo">
            <option value="">SELECCIONA EL TIPO DE COMPONENTE</option>
            <?php require "../php/fill/equipoTipo.php" ?>
          </select>

          <h5>Marca del componente</h5>
          <input type="text" class="uppercase form-control" id="equipo_marca">

          <h5>Modelo del componente</h5>
          <input type="text" class="uppercase form-control" id="equipo_modelo">

          <h5>Procesador</h5>
          <input type="text" class="uppercase form-control" id="equipo_procesador">

          <h5>RAM</h5>
          <input type="text" class="uppercase form-control" id="equipo_ram">

          <h5>Disco Duro</h5>
          <input type="text" class="uppercase form-control" id="equipo_discoDuro">

          <h5>Número de serie</h5>
          <input type="text" class="form-control" id="equipo_noSerie">

          <h5>Número de inventario</h5>
          <input type="text" class="form-control" id="equipo_noInventario">

          <h5>Precio (MXN)</h5>
          <input type="text" class="form-control" id="equipo_precio">

          <h5>Precio (En letra)</h5>
          <input type="text" class="uppercase form-control" id="equipo_precioLetra">

          <h5>Fecha en que se otorga al usuario</h5>
          <input type="date" class="inputDate form-control" id="prestamo_fechaPrestamo">

          <h5>Observaciones</h5>
          <textarea class="form-control" id="prestamo_observaciones"></textarea>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn smBtn" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" id="btnInventariar" class="btnInventariar bgBlack whiteTx smBtn">Registrar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Reportes -->
<div class="modal fade" id="modalReportes" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="boldTx modal-title" id="exampleModalLabel">Generar Reporte</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="inventario_reporteForm" method="POST" action="../php/inventariar.php" class="">
          <div class="">
            <h6>Área</h6>
            <select name="inv_reporteArea" class="form-select" id="inv_reporteArea">
              <option value="">Todas</option>
              <?php require "../php/fill/empresaArea.php" ?>
            </select>
          </div>

          <div class="">
            <h6>Componente</h6>
            <select name="inv_reporteEquipo" class="form-select" id="inv_reporteEquipo">
              <option value="">Todos</option>
              <?php require "../php/fill/equipoTipo.php" ?>
            </select>
          </div>

          <div class="">
            <h6>Marca</h6>
            <input type="text" class="form-control" id="inv_reporteMarca">
          </div>
          <div class="fltUd__uForm--lugar form__item">
            <h6>Modelo</h6>
            <select name="inv_reporteModelo" class="form-select" id="inv_reporteModelo">
              <option value="">Todos</option>
              <?php require "../php/fill/equipoModelo.php" ?>
            </select>
          </div>
          <!-- <input type="submit" name= "inv_reporteButton"> -->
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn smBtn" data-bs-dismiss="modal">Cancelar</button>
        <input class="inv_reporteButton bgBlack whiteTx smBtn" type="submit" name= "inv_reporteButton" value="Generar excel">
        </form>
        <!-- <button type="button" id="inv_reporteButton" class="inv_reporteButton bgBlack whiteTx smBtn">Reporte</button> -->
        
      </div>
    </div>
  </div>
</div>

<!-- Modal Subir Excel -->
<div class="modal fade" id="modalSubirExcel" data-bs-backdrop="static" tabindex="-1"
  aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="boldTx modal-title" id="exampleModalLabel">Subir archivo excel</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="" method="post" class="mb-3" enctype="multipart/form-data" id="inv_formExcel">
          <input type="file" class="form-control" id="inv_subirExcel" name="inv_subirExcel" accept=".csv, .xlsx, .xls ">
          <button class="btn smBtn" id="inv_btnLimpiarExcel">Limpiar campo</button>
          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn smBtn" data-bs-dismiss="modal">Cancelar</button>
        <!-- <button type="button" id="inv_buttonExcel" class="bgBlack whiteTx smBtn">Subir</button> -->
        <input type="submit" id="inv_buttonExcel" name="inv_buttonExcel" class="bgBlack whiteTx smBtn" value="Subir Excel" >
        <?php require "../php/inventariar.php"?>
        </form>
      </div>
    </div>
  </div>
</div>