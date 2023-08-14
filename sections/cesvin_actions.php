<?php require "../php/verify_activeSesson.php" ?>
<?php require "../include-views/template-views/html1.php" ?>
<?php
if (isset($_GET["edit_idArea"])) {
    viewEditArea();
} else if (isset($_GET["delete_idArea"])) {
    viewDeleteArea();
}


function viewEditArea()
{
    global $con;
    $id = $_GET["edit_idArea"];
    $query_area = "SELECT * FROM empresa_area area
    WHERE id_empresaArea = '$id'";
    $exec_area = mysqli_query($con, $query_area);
    $area = mysqli_fetch_assoc($exec_area);

?>
    <div class="appBodyContent">
        <section class="externalForm">
            <div class="externalForm__content card">
                <div class="externalForm__header">
                    <h4 class="boldTx">Editar nombre de la área</h4>
                </div>
                <form id="" class="externalForm__body">
                    <input type="text" class="uppercase form-control" disabled hidden  id="id_edit_area" value="<?php echo $area['id_empresaArea'] ?>">
                    <h5>Nombre de la área</h5>
                    <input type="text" class="uppercase form-control" id="edit_area" value="<?php echo $area['nombre_empresaArea'] ?>">
                    <h5>Nombre del jefe de área</h5>
                    <input type="text" class="uppercase form-control" id="edit_jefeArea" value="<?php echo $area['empresa_jefeArea'] ?>">
                </form>
                <div class="externalForm__footer">
                    <a class="btn smBtn" href="catalogoCesvin.php">Cancelar</a>
                    <button type="button" id="btn_editArea" class="btn_editArea bgBlack whiteTx smBtn">Guardar</button>
                </div>

            </div>
        </section>
    </div>
<?php
}

function viewDeleteArea()
{
    global $con;
    $id = $_GET["delete_idArea"];
    $query_area = "SELECT * FROM empresa_area area
    WHERE id_empresaArea = '$id'";
    $exec_area = mysqli_query($con, $query_area);
    $area = mysqli_fetch_assoc($exec_area);

?>
    <div class="appBodyContent">
        <section class="externalForm">
            <div class="externalForm__content card">
                <div class="externalForm__header">
                    <h4 class="boldTx">Eliminar Área</h4>
                    <p>Si estás seguro de querer borrar esta área da click en el botón <b>ELIMINAR</b></p>
                </div>
                <form id="" class="externalForm__body">
                <input type="text" class="uppercase form-control" disabled hidden id="id_delete_area" value="<?php echo $area['id_empresaArea'] ?>">
                    <h5>Nombre de la área</h5>
                    <input type="text" class="uppercase form-control" disabled id="delete_area" value="<?php echo $area['nombre_empresaArea'] ?>">
                    <h5>Nombre del jefe de área</h5>
                    <input type="text" class="uppercase form-control" disabled id="delete_jefeArea" value="<?php echo $area['empresa_jefeArea'] ?>">
                </form>
                <div class="externalForm__footer">
                    <a class="btn smBtn" href="catalogoCesvin.php">Cancelar</a>
                    <button type="button" id="btn_deleteArea" class="btn_deleteArea bgBlack whiteTx smBtn">Eliminar</button>
                </div>

            </div>
        </section>
    </div>
<?php
}

?>

<?php require "../include-views/template-views/html2.php" ?>