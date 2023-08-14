<?php require "../php/verify_activeSesson.php" ?>
<?php require "../include-views/template-views/html1.php" ?>
<?php
if (isset($_GET["edit_idEquipo"])) {
    viewEditEquipo();
} else if (isset($_GET["delete_idEquipo"])) {
    viewDeleteEquipo();
} else if (isset($_GET["edit_idEstadoEquipo"])) {
    viewEditEstado();
} else if (isset($_GET["delete_idEstadoEquipo"])) {
    viewDeleteEstado();
} else if (isset($_GET["edit_idMarca"])) {
    viewEditMarca();
} else if (isset($_GET["delete_idMarca"])) {
    viewDeleteMarca();
}
function viewEditEquipo()
{
    global $con;
    $id = $_GET["edit_idEquipo"];
    $query_tipoEquipo = "SELECT * FROM equipo_tipo etipo
    WHERE id_tipoEquipo = '$id'";
    $exec_tipoEquipo = mysqli_query($con, $query_tipoEquipo);
    $tipoEquipo = mysqli_fetch_assoc($exec_tipoEquipo);
?>
    <div class="appBodyContent">
        <section class="externalForm">
            <div class="externalForm__content card">
                <div class="externalForm__header">
                    <h4 class="boldTx">Editar Tipo de componente</h4>
                </div>
                <form id="" class="externalForm__body">
                    <input type="text" class="uppercase form-control" disabled hidden id="id_edit_equipo" value="<?php echo $tipoEquipo['id_tipoEquipo'] ?>">
                    <h5>Nombre del componente</h5>
                    <input type="text" class="uppercase form-control" id="edit_equipo" value="<?php echo $tipoEquipo['nombre_tipoEquipo'] ?>">
                </form>
                <div class="externalForm__footer">
                    <a class="btn smBtn" href="catalogoEquipos.php">Cancelar</a>
                    <button type="button" id="btn_editEquipo" class="btn_editEquipo bgBlack whiteTx smBtn">Guardar</button>
                </div>

            </div>
        </section>
    </div>
<?php
}

function viewDeleteEquipo()
{
    global $con;
    $id = $_GET["delete_idEquipo"];
    $query_tipoEquipo = "SELECT * FROM equipo_tipo etipo
    WHERE id_tipoEquipo = '$id'";
    $exec_tipoEquipo = mysqli_query($con, $query_tipoEquipo);
    $tipoEquipo = mysqli_fetch_assoc($exec_tipoEquipo);
?>
    <div class="appBodyContent">
        <section class="externalForm">
            <div class="externalForm__content card">
                <div class="externalForm__header">
                    <h4 class="boldTx">Eliminar componente</h4>
                    <p>Si estás seguro de querer borrar este componente da click en el botón <b>ELIMINAR</b></p>
                </div>
                <form id="" class="externalForm__body">
                    <input type="text" class="uppercase form-control" disabled hidden id="id_delete_equipo" value="<?php echo $tipoEquipo['id_tipoEquipo'] ?>">
                    <h5>Nombre del componente</h5>
                    <input type="text" class="uppercase form-control" disabled id="delete_equipo" value="<?php echo $tipoEquipo['nombre_tipoEquipo'] ?>">
                </form>
                <div class="externalForm__footer">
                    <a class="btn smBtn" href="catalogoEquipos.php">Cancelar</a>
                    <button type="button" id="btn_deleteEquipo" class="btn_deleteEquipo bgBlack whiteTx smBtn">Eliminar</button>
                </div>

            </div>
        </section>
    </div>
<?php
}

function viewEditEstado()
{
    global $con;
    $id = $_GET["edit_idEstadoEquipo"];
    $query_estado = "SELECT * FROM equipo_estado eEstato
    WHERE id_equipoEstado = '$id'";
    $exec_estado = mysqli_query($con, $query_estado);
    $estado = mysqli_fetch_assoc($exec_estado);

?>
    <div class="appBodyContent">
        <section class="externalForm">
            <div class="externalForm__content card">
                <div class="externalForm__header">
                    <h4 class="boldTx">Editar nombre del estatus</h4>
                </div>
                <form id="" class="externalForm__body">
                    <input type="text" class="uppercase form-control" disabled hidden id="id_edit_estado" value="<?php echo $estado['id_equipoEstado'] ?>">
                    <h5>Nombre del estatus</h5>
                    <input type="text" class="uppercase form-control" id="edit_estado" value="<?php echo $estado['nombre_equipoEstado'] ?>">
                </form>
                <div class="externalForm__footer">
                    <a class="btn smBtn" href="catalogoEquipos.php">Cancelar</a>
                    <button type="button" id="btn_editEstado" class="btn_editEstado bgBlack whiteTx smBtn">Guardar</button>
                </div>

            </div>
        </section>
    </div>
<?php
}

function viewDeleteEstado()
{
    global $con;
    $id = $_GET["delete_idEstadoEquipo"];
    $query_estado = "SELECT * FROM equipo_estado eEstato
    WHERE id_equipoEstado = '$id'";
    $exec_estado = mysqli_query($con, $query_estado);
    $estado = mysqli_fetch_assoc($exec_estado);

?>
    <div class="appBodyContent">
        <section class="externalForm">
            <div class="externalForm__content card">
                <div class="externalForm__header">
                    <h4 class="boldTx">Eliminar estatus</h4>
                    <p>Si estás seguro de querer borrar este estatus da click en el botón <b>ELIMINAR</b></p>
                </div>
                <form id="" class="externalForm__body">
                    <input type="text" class="uppercase form-control" disabled hidden id="id_delete_estado" value="<?php echo $estado['id_equipoEstado'] ?>">
                    <h5>Nombre del estatus</h5>
                    <input type="text" class="uppercase form-control" disabled id="delete_estado" value="<?php echo $estado['nombre_equipoEstado'] ?>">
                </form>
                <div class="externalForm__footer">
                    <a class="btn smBtn" href="catalogoEquipos.php">Cancelar</a>
                    <button type="button" id="btn_deleteEstado" class="btn_deleteEstado bgBlack whiteTx smBtn">Eliminar</button>
                </div>
            </div>
        </section>
    </div>
<?php
}

function viewEditMarca()
{
    global $con;
    $id = $_GET["edit_idMarca"];
    $query_marca = "SELECT * FROM equipo_marca emarca
    WHERE idMarca = '$id'";
    $exec_marca = mysqli_query($con, $query_marca);
    $marca = mysqli_fetch_assoc($exec_marca);

?>
    <div class="appBodyContent">
        <section class="externalForm">
            <div class="externalForm__content card">
                <div class="externalForm__header">
                    <h4 class="boldTx">Editar nombre de marca</h4>
                </div>
                <form id="" class="externalForm__body">
                    <input type="text" class="uppercase form-control" disabled hidden id="id_edit_marca" value="<?php echo $marca['idMarca'] ?>">
                    <h5>Nombre de la marca</h5>
                    <input type="text" class="uppercase form-control" id="edit_marca" value="<?php echo $marca['nombreMarca'] ?>">
                </form>
                <div class="externalForm__footer">
                    <a class="btn smBtn" href="catalogoEquipos.php">Cancelar</a>
                    <button type="button" id="btn_editMarca" class="btn_editMarca bgBlack whiteTx smBtn">Guardar</button>
                </div>

            </div>
        </section>
    </div>
<?php
}

function viewDeleteMarca()
{
    global $con;
    $id = $_GET["delete_idMarca"];
    $query_marca = "SELECT * FROM equipo_marca emarca
    WHERE idMarca = '$id'";
    $exec_marca = mysqli_query($con, $query_marca);
    $marca = mysqli_fetch_assoc($exec_marca);

?>
    <div class="appBodyContent">
        <section class="externalForm">
            <div class="externalForm__content card">
                <div class="externalForm__header">
                    <h4 class="boldTx">Eliminar marca</h4>
                    <p>Si estás seguro de querer borrar esta marca da click en el botón <b>ELIMINAR</b></p>
                </div>
                <form id="" class="externalForm__body">
                    <input type="text" class="uppercase form-control" disabled hidden id="id_delete_marca" value="<?php echo $marca['idMarca'] ?>">
                    <h5>Nombre de la marca</h5>
                    <input type="text" class="uppercase form-control" disabled id="delete_marca" value="<?php echo $marca['nombreMarca'] ?>">
                </form>
                <div class="externalForm__footer">
                    <a class="btn smBtn" href="catalogoEquipos.php">Cancelar</a>
                    <button type="button" id="btn_deleteMarca" class="btn_deleteMarca bgBlack whiteTx smBtn">Eliminar</button>
                </div>

            </div>
        </section>
    </div>
<?php
}

?>

<?php require "../include-views/template-views/html2.php" ?>