<?php
include "../php/connection.php";

if (isset($_POST['btnRegUsuario'])) {
    registrarUsuario();
}else if (isset($_POST['btn_editUsuario'])) {
    editarUsuario();
}else if (isset($_POST['btn_deleteUsuario'])) {
    eliminarUsuario();
}

function registrarUsuario()
{
    global $con;
    $admin_nombre = strtoupper(trim($_POST['admin_nombre']));
    $admin_usuario = strtoupper(trim($_POST['admin_usuario']));
    $admin_nivel = $_POST['admin_nivel'];
    $admin_password = trim($_POST['admin_password']);

    $query_insertUserApp = "INSERT INTO admins(nombreAdmin, usuarioAdmin, fk_nivelAdmin, passwordAdmin) 
                            VALUES('$admin_nombre', '$admin_usuario', $admin_nivel, '$admin_password')";
    $exec_insertUserApp = mysqli_query($con, $query_insertUserApp);
    if ($exec_insertUserApp) {
        echo "Success";
    } else {
        echo "Falied";
    }
}

function editarUsuario()
{
    global $con;
    $admin_id = $_POST['edit_admin_id'];
    $admin_nombre = strtoupper(trim($_POST['edit_admin_nombre']));
    $admin_usuario = strtoupper(trim($_POST['edit_admin_usuario']));
    $admin_nivel = $_POST['edit_admin_nivel'];
    $admin_password = trim($_POST['edit_admin_password']);

    $query_insertUpdateUser = "UPDATE admins SET 
    nombreAdmin = '$admin_nombre', 
    usuarioAdmin = '$admin_usuario', 
    usuarioAdmin = '$admin_usuario',
    fk_nivelAdmin = '$admin_nivel',
    passwordAdmin = '$admin_password' 
    WHERE idAdmin = '$admin_id'";
    $exec_insertUpdateUser = mysqli_query($con, $query_insertUpdateUser);
    if($exec_insertUpdateUser){
        echo "Success";
    }else{
        echo "Falied";
    }
}

function eliminarUsuario(){
    global $con;
    $admin_id = $_POST['delete_admin_id'];
    $query_deleteUser = "DELETE FROM admins WHERE idAdmin = '$admin_id'";
    $exec_deleteUser = mysqli_query($con, $query_deleteUser);
    if($query_deleteUser){
        echo "Success";
    }else{
        echo "Failed";
    }
}
