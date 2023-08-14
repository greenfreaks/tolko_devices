<?php require "../php/verify_activeSesson.php" ?>
<?php require "../include-views/template-views/html1.php" ?>
<?php

if (isset($_GET['id_editInventario'])) {
    viewEditInventario();
} else if (isset($_GET['id_deleteInventario'])) {
    viewDeleteInventario();
} else if (isset($_GET['id_cartaFirmada'])) {
    viewSubirCartaFirmada();
} else if (isset($_GET['id_cambiarCarta'])) {
    viewCambiarCarta();
}else if (isset($_GET['id_borrarCarta'])) {
    viewBorrarCarta();
}

function viewEditInventario()
{
    global $con;
    $id = $_GET["id_editInventario"];
    $query_inventario = "SELECT * FROM inventario inv
    INNER JOIN empresa_area area ON inv.fk_usuarioArea = area.id_empresaArea
    INNER JOIN equipo_estado eEstado ON inv.fk_equipoEstado = eEstado.id_equipoEstado
    INNER JOIN equipo_tipo eTipo ON inv.fk_equipoTipo = eTipo.id_tipoEquipo
    WHERE idInventario = '$id'";
    $exec_inventario = mysqli_query($con, $query_inventario);
    $inventario = mysqli_fetch_assoc($exec_inventario);
?>
    <div class="appBodyContent">
        <section class="externalForm">
            <div class="externalForm__content card">
                <div class="externalForm__header">
                    <h4 class="boldTx">Editar Registro de inventario</h4>
                </div>
                <form id="" class="externalForm__body verticalScroll">
                    <input type="text" class="form-control" disabled hidden id="edit_id_inventario" value="<?php echo $inventario['idInventario'] ?>">
                    <h5>Nombre del usuario</h5>
                    <input type="text" class="uppercase form-control" id="edit_usuario_nombre" value="<?php echo $inventario['usuarioNombre'] ?>">

                    <h5>Área del usuario</h5>
                    <select name="" class="form-select" id="edit_usuario_area">
                        <option value="<?php echo $inventario["fk_usuarioArea"]; ?>">
                            <?php echo $inventario["nombre_empresaArea"]; ?></option>
                        <option value="">SELECCIONA UN ÁREA</option>
                        <?php require "../php/fill/empresaArea.php" ?>
                    </select>

                    <h5>Puesto del usuario</h5>
                    <input type="text" class="uppercase form-control" id="edit_usuario_puesto" value="<?php echo $inventario['usuarioNombre'] ?>">

                    <h5>Nombre del componente</h5>
                    <input type="text" class="uppercase form-control" id="edit_equipo_nombre" value="<?php echo $inventario['equipoNombre'] ?>">

                    <h5>Estado del componente</h5>
                    <select name="" class="form-select" id="edit_equipo_estado">
                        <option value="<?php echo $inventario['fk_equipoEstado'] ?>"><?php echo $inventario['nombre_equipoEstado'] ?></option>
                        <option value="">SELECCIONA EL ESTADO DEL COMPONENTE</option>
                        <?php require "../php/fill/equipo_estado.php" ?>
                    </select>

                    <h5>Tipo de componente</h5>
                    <select name="" class="form-select" id="edit_equipo_tipo">
                        <option value="<?php echo $inventario["fk_equipoTipo"]; ?>">
                            <?php echo $inventario["nombre_tipoEquipo"]; ?></option>
                        <option value="">SELECCIONA EL TIPO DE COMPONENTE</option>
                        <?php require "../php/fill/equipoTipo.php" ?>
                    </select>


                    <h5>Marca del componente</h5>
                    <input type="text" class="form-control" id="edit_equipo_marca" value="<?php echo $inventario['equipoMarca']?>">

                    <h5>Modelo del componente</h5>
                    <input type="text" id="edit_equipo_modelo" class="form-control" value="<?php echo $inventario['equipoModelo']?>">

                    <h5>Procesador</h5>
                    <input type="text" class="uppercase form-control" id="edit_equipo_procesador" value="<?php echo $inventario["equipoProcesador"]; ?>">

                    <h5>RAM</h5>
                    <input type="text" class="uppercase form-control" id="edit_equipo_ram" value="<?php echo $inventario["equipoRam"]; ?>">

                    <h5>Disco Duro</h5>
                    <input type="text" class="uppercase form-control" id="edit_equipo_discoDuro" value="<?php echo $inventario["equipoDiscoDuro"]; ?>">

                    <h5>Número de serie</h5>
                    <input type="text" class="uppercase form-control" id="edit_equipo_noSerie" value="<?php echo $inventario["equipoNoSerie"]; ?>">

                    <h5>Número de inventario</h5>
                    <input type="text" class="uppercase form-control" id="edit_equipo_noInventario" value="<?php echo $inventario["equipoNoInventario"]; ?>">

                    <h5>Precio (MXN)</h5>
                    <input type="text" class="uppercase form-control" id="edit_equipo_precio" value="<?php echo $inventario["equipoPrecio"]; ?>">

                    <h5>Precio (En letra)</h5>
                    <input type="text" class="uppercase form-control" id="edit_equipo_precioLetra" value="<?php echo $inventario["equipoPrecioLetra"]; ?>">

                    <h5>Fecha en que se otorga al usuario</h5>
                    <input type="date" class="inputDate uppercase form-control" id="edit_prestamo_fechaPrestamo" value="<?php echo $inventario["prestamoOtorgamiento"]; ?>">

                    <h5>Observaciones</h5>
                    <textarea class="uppercase form-control" id="edit_prestamo_observaciones" value=""><?php echo $inventario["equipoObservaciones"]; ?></textarea>
                </form>
                <div class="externalForm__footer">
                    <a class="btn smBtn" href="home.php">Cancelar</a>
                    <button type="button" id="btn_editInventariar" class="btn_editInventariar bgBlack whiteTx smBtn">Guardar</button>

                </div>

            </div>
        </section>
    </div>
<?php
}

function viewDeleteInventario()
{
    global $con;
    $id = $_GET["id_deleteInventario"];
    $query_inventario = "SELECT * FROM inventario inv
    INNER JOIN empresa_area area ON inv.fk_usuarioArea = area.id_empresaArea
    INNER JOIN equipo_tipo eTipo ON inv.fk_equipoTipo = eTipo.id_tipoEquipo
    WHERE idInventario = '$id'";
    $exec_inventario = mysqli_query($con, $query_inventario);
    $inventario = mysqli_fetch_assoc($exec_inventario);
?>
    <div class="appBodyContent">
        <section class="externalForm">
            <div class="externalForm__content card">
                <div class="externalForm__header">
                    <h4 class="boldTx">Eliminar registro del inventario</h4>
                    <p>Si estás seguro de querer borrar el registro con la siguiente información da click en el botón <b>ELIMINAR</b></p>
                </div>
                <form id="" class="externalForm__body verticalScroll">
                    <input type="text" class="form-control" disabled hidden id="delete_id_inventario" value="<?php echo $inventario['idInventario'] ?>">
                    <h5>Nombre del usuario</h5>
                    <input type="text" disabled class="form-control" id="delete_usuario_nombre" value="<?php echo $inventario['usuarioNombre'] ?>">

                    <h5>Área del usuario</h5>
                    <select name="" disabled class="form-select" id="delete_usuario_area">
                        <option value="<?php echo $inventario["fk_usuarioArea"]; ?>">
                            <?php echo $inventario["nombre_empresaArea"]; ?></option>
                        <option value="">SELECCIONA UN ÁREA</option>
                        <?php require "../php/fill/empresaArea.php" ?>
                    </select>

                    <h5>Puesto del usuario</h5>
                    <input type="text" disabled disabled class="form-control" id="delete_usuario_puesto" value="<?php echo $inventario['usuarioNombre'] ?>">

                    <h5>Nombre del componente</h5>
                    <input type="text" disabled class="form-control" id="delete_equipo_nombre" value="<?php echo $inventario['equipoNombre'] ?>">

                    <h5>Tipo componente</h5>
                    <select name="" disabled class="form-select" id="delete_equipo_tipo">
                        <option value="<?php echo $inventario["fk_equipoTipo"]; ?>">
                            <?php echo $inventario["nombre_tipoEquipo"]; ?></option>
                        <option value="">SELECCIONA EL TIPO DE COMPONENTE</option>
                        <?php require "../php/fill/equipoTipo.php" ?>
                    </select>

                    <h5>Marca del componente</h5>
                    <input type="text" class="form-control" id="delete_equipo_marca" value="<?php echo $inventario['equipoMarca']?>">

                    <h5>Modelo del componente</h5>
                    <input type="text" class="uppercase form-control" disabled id="delete_equipo_modelo" value="<?php echo $inventario['equipoModelo']?>">

                    <h5>Procesador</h5>
                    <input type="text" disabled class="form-control" id="delete_equipo_procesador" value="<?php echo $inventario["equipoProcesador"]; ?>">

                    <h5>RAM</h5>
                    <input type="text" disabled class="form-control" id="delete_equipo_ram" value="<?php echo $inventario["equipoRam"]; ?>">

                    <h5>Disco Duro</h5>
                    <input type="text" disabled class="form-control" id="delete_equipo_discoDuro" value="<?php echo $inventario["equipoDiscoDuro"]; ?>">

                    <h5>Número de serie</h5>
                    <input type="text" disabled class="form-control" id="delete_equipo_noSerie" value="<?php echo $inventario["equipoNoSerie"]; ?>">

                    <h5>Número de inventario</h5>
                    <input type="text" disabled class="form-control" id="delete_equipo_noInventario" value="<?php echo $inventario["equipoNoInventario"]; ?>">

                    <h5>Precio (MXN)</h5>
                    <input type="text" disabled class="form-control" id="delete_equipo_precio" value="<?php echo $inventario["equipoPrecio"]; ?>">

                    <h5>Precio (En letra)</h5>
                    <input type="text" disabled class="form-control" id="delete_equipo_precioLetra" value="<?php echo $inventario["equipoPrecioLetra"]; ?>">

                    <h5>Fecha en que se otorga al usuario</h5>
                    <input type="date" disabled class="form-control" id="delete_prestamo_fechaPrestamo" value="<?php echo $inventario["prestamoOtorgamiento"]; ?>">

                    <h5>Observaciones</h5>
                    <textarea class="form-control" disabled id="delete_prestamo_observaciones" value=""><?php echo $inventario["equipoObservaciones"]; ?></textarea>
                </form>
                <div class="externalForm__footer">
                    <a class="btn smBtn" href="home.php">Cancelar</a>
                    <button type="button" id="btn_deleteInventariar" class="btn_deleteInventariar bgBlack whiteTx smBtn">Eliminar</button>

                </div>

            </div>
        </section>
    </div>
<?php
}

function viewSubirCartaFirmada()
{
    global $con;
    $id = $_GET["id_cartaFirmada"];
    $query_inventario = "SELECT * FROM inventario inv
    INNER JOIN empresa_area area ON inv.fk_usuarioArea = area.id_empresaArea
    INNER JOIN equipo_tipo eTipo ON inv.fk_equipoTipo = eTipo.id_tipoEquipo
    INNER JOIN equipo_marca eMarca ON inv.fk_equipoMarca = eMarca.idMarca
    INNER JOIN equipo_modelo eModelo ON inv.fk_equipoModelo = eModelo.idModelo
    WHERE idInventario = '$id'";
    $exec_inventario = mysqli_query($con, $query_inventario);
    $inventario = mysqli_fetch_assoc($exec_inventario);
?>
    <div class="appBodyContent">
        <section class="externalForm">
            <div class="externalForm__content card">
                <div class="externalForm__header">
                    <h4 class="boldTx">Subir carta responsiva firmada</h4>
                </div>
                <form method="post" class="externalForm__body verticalScroll" enctype="multipart/form-data">
                    <input type="text" class="form-control" hidden name="id" value="<?php echo $inventario['idInventario'] ?>">
                    <h5>Nombre del usuario</h5>
                    <input type="text" class="form-control" disabled name="nombre" value="<?php echo $inventario['usuarioNombre'] ?>">
                    

                    <h5>Subir archivo</h5>
                    <input type="file" class="form-control" name="cartaFirmada_equipo_archivo" id="cartaFirmada_equipo_archivo">

                    <button class="btn cartaFirmada_limpiar_campo">Borrar archivo</button>
                    <div class="externalForm__footer">
                        <a class="btn smBtn" href="home.php">Cancelar</a>
                        <input type="submit" class="smBtn bgBlack whiteTx" name="cartaFirmada_btn" id="cartaFirmada_btn" value="Subir Archivo">
                        <?php require "../php/inventariar.php" ?>
                </form>
            </div>

    </div>
    </section>
    </div>
<?php
}

function viewCambiarCarta()
{
    global $con;
    $id = $_GET["id_cambiarCarta"];
    $query_inventario = "SELECT * FROM inventario inv
    INNER JOIN empresa_area area ON inv.fk_usuarioArea = area.id_empresaArea
    INNER JOIN equipo_tipo eTipo ON inv.fk_equipoTipo = eTipo.id_tipoEquipo
    WHERE idInventario = '$id'";
    $exec_inventario = mysqli_query($con, $query_inventario);
    $inventario = mysqli_fetch_assoc($exec_inventario);
?>
    <div class="appBodyContent">
        <section class="externalForm">
            <div class="externalForm__content card">
                <div class="externalForm__header">
                    <h4 class="boldTx">Cambiar carta responsiva</h4>
                </div>
                <form method="post" class="externalForm__body verticalScroll" enctype="multipart/form-data">
                    <input type="text" class="form-control" hidden name="id" value="<?php echo $inventario['idInventario'] ?>">
                    <input type="text" class="form-control" hidden name="usuarioNombre" value="<?php echo $inventario['usuarioNombre'] ?>">

                    <h5>Archivo Actual</h5>
                    <input type="text" class="form-control" hidden  name="ruta_cartaActual" value="<?php echo $inventario['prestamoResponsiva'] ?>">
                    <input type="text" class="form-control" disabled hidden  name="" value="<?php echo $inventario['prestamoResponsiva'] ?>">
                    <a href="<?php echo $inventario['prestamoResponsiva'] ?>" target="_blank" class="capitalize btn btn-success whiteTx boldTx">Ver</a> <br>
                    <div class="space"></div>
                    <h5>Sustituír por:</h5>
                    <input type="file" class="form-control" name="nueva_carta" id="nueva_carta">

                    <div class="externalForm__footer">
                        <a class="btn smBtn" href="home.php">Cancelar</a>
                        <input type="submit" class="smBtn bgBlack whiteTx" name="nuevaCarta_btn" id="nuevaCarta_btn" value="Guardar">
                        <?php require "../php/inventariar.php" ?>
                </form>
            </div>

    </div>
    </section>
    </div>
<?php
}

function viewBorrarCarta()
{
    global $con;
    $id = $_GET["id_borrarCarta"];
    $query_inventario = "SELECT * FROM inventario inv
    INNER JOIN empresa_area area ON inv.fk_usuarioArea = area.id_empresaArea
    INNER JOIN equipo_tipo eTipo ON inv.fk_equipoTipo = eTipo.id_tipoEquipo
    WHERE idInventario = '$id'";
    $exec_inventario = mysqli_query($con, $query_inventario);
    $inventario = mysqli_fetch_assoc($exec_inventario);
?>
    <div class="appBodyContent">
        <section class="externalForm">
            <div class="externalForm__content card">
                <div class="externalForm__header">
                    <h4 class="boldTx">Eliminar carta responsiva</h4>
                </div>
                <form method="post" class="externalForm__body verticalScroll" enctype="multipart/form-data">
                    <input type="text" class="form-control" hidden name="id" value="<?php echo $inventario['idInventario'] ?>">
                    <input type="text" class="form-control" hidden name="usuarioNombre" value="<?php echo $inventario['usuarioNombre'] ?>">

                    <h5>Archivo Actual</h5>
                    <input type="text" class="form-control" hidden  name="ruta_cartaActual" value="<?php echo $inventario['prestamoResponsiva'] ?>">
                    <input type="text" class="form-control" disabled hidden name="" value="<?php echo $inventario['prestamoResponsiva'] ?>">
                    <a href="<?php echo $inventario['prestamoResponsiva'] ?>" target="_blank" class="capitalize btn btn-success whiteTx boldTx">Ver</a> <br>

                    <div class="externalForm__footer">
                        <a class="btn smBtn" href="home.php">Cancelar</a>
                        <input type="submit" class="smBtn bgBlack whiteTx" name="borrarCarta_btn" id="nuevaCarta_btn" value="Eliminar Archivo">
                        <?php require "../php/inventariar.php" ?>
                </form>
            </div>

    </div>
    </section>
    </div>
<?php
}
?>

<?php require "../include-views/template-views/html2.php" ?>