<?php require "../php/verify_activeSesson.php" ?>
<?php require "../include-views/template-views/html1.php" ?>
<?php
if (isset($_GET["edit_idUsuario"])) {
    viewEditUsuario();
}else if(isset($_GET["delete_idUsuario"])) {
    viewDeleteUsuario();
}

function viewEditUsuario()
{
    global $con;
    $id = $_GET["edit_idUsuario"];
    $query_admin = "SELECT * FROM admins adm
    INNER JOIN  usuario_nivel univel ON adm.fk_nivelAdmin = univel.idNivel
    WHERE idAdmin = '$id'";
    $exec_admin = mysqli_query($con, $query_admin);
    $admin = mysqli_fetch_assoc($exec_admin);
?>
<div class="appBodyContent">
    <section class="externalForm">
        <div class="externalForm__content card">
            <div class="externalForm__header">
                <h4 class="boldTx">Editar información del usuario</h4>
            </div>
            <form id="" class="externalForm__body verticalScroll">
                <input id="edit_admin_id" disabled hidden class="form-control" value="<?php echo $admin['idAdmin'] ?>">
                <h5>Nombre completo del usuario</h5>
                <input type="text" class="uppercase form-control" id="edit_admin_nombre"
                    value="<?php echo $admin['nombreAdmin'] ?>">

                <h5>Nombre de usuario</h5>
                <input type="text" class="uppercase form-control" id="edit_admin_usuario"
                    value="<?php echo $admin['usuarioAdmin'] ?>">

                <h5>Nivel </h5>
                <select name="" class="form-select" id="edit_admin_nivel">
                    <option value="<?php echo $admin['fk_nivelAdmin'] ?>"><?php echo $admin['nombreNivel'] ?></option>
                    <option value="" disabled>SELECCIONA EL TIPO DE USUARIO</option>
                    <?php require "../php/fill/admin_nivel.php" ?>
                </select>

                <h5>Contraseña</h5>
                <input type="text" class="form-control" id="edit_admin_password"
                    value="<?php echo $admin['passwordAdmin'] ?>">
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
            <div class="externalForm__footer">
                <a class="btn smBtn" href="usuarios.php">Cancelar</a>
                <button type="button" id="btn_editUsuario"
                    class="btn_editUsuario bgBlack whiteTx smBtn">Guardar</button>
            </div>
        </div>
    </section>
</div>
<?php
}

function viewDeleteUsuario()
{
    global $con;
    $id = $_GET["delete_idUsuario"];
    $query_admin = "SELECT * FROM admins adm
    INNER JOIN  usuario_nivel univel ON adm.fk_nivelAdmin = univel.idNivel
    WHERE idAdmin = '$id'";
    $exec_admin = mysqli_query($con, $query_admin);
    $admin = mysqli_fetch_assoc($exec_admin);
?>
<div class="appBodyContent">
    <section class="externalForm">
        <div class="externalForm__content card">
            <div class="externalForm__header">
                <h4 class="boldTx">Eliminar usuario</h4>
                <p>Si estás seguro de querer borrar el registro con la siguiente información da click en el botón
                    <b>ELIMINAR</b></p>
            </div>
            <form id="" class="externalForm__body verticalScroll">
                <input id="delete_admin_id" disabled hidden class="form-control"
                    value="<?php echo $admin['idAdmin'] ?>">
                <h5>Nombre completo del usuario</h5>
                <input type="text" disabled class="uppercase form-control" id="delete_admin_nombre"
                    value="<?php echo $admin['nombreAdmin'] ?>">

                <h5>Nombre de usuario</h5>
                <input type="text" disabled class="uppercase form-control" id="delete_admin_usuario"
                    value="<?php echo $admin['usuarioAdmin'] ?>">

                <h5>Nivel</h5>
                <select name="" disabled class="form-select" id="delete_admin_nivel">
                    <option value="<?php echo $admin['fk_nivelAdmin'] ?>"><?php echo $admin['nombreNivel'] ?></option>
                    <option value="" disabled>SELECCIONA EL TIPO DE USUARIO</option>
                    <?php require "../php/fill/admin_nivel.php" ?>
                </select>

                <h5>Contraseña</h5>
                <input type="text" disabled class="form-control" id="delete_admin_password"
                    value="<?php echo $admin['passwordAdmin'] ?>">
            </form>
            <div class="externalForm__footer">
                <a class="btn smBtn" href="usuarios.php">Cancelar</a>
                <button type="button" id="btn_deleteUsuario"
                    class="btn_deleteUsuario bgBlack whiteTx smBtn">Eliminar</button>
            </div>
        </div>
    </section>
</div>
<?php
}

?>

<?php require "../include-views/template-views/html2.php" ?>