<?php
include "../php/connection.php";
if (isset($_POST['btnRegNuevaArea'])) {
    registrarArea();
}else if (isset($_POST['btn_editArea'])) {
    editarArea();
}else if (isset($_POST['btn_deleteArea'])) {
    eliminarArea();
}


function registrarArea()
{
    global $con;
    $area = strtoupper(trim($_POST['nombre_nuevaArea']));
    $jefeArea = strtoupper(trim($_POST['jefe_nuevaArea']));
    $query_nuevaArea = "INSERT INTO empresa_area(nombre_empresaArea, empresa_jefeArea ) 
                            VALUES('$area', '$jefeArea')";
    $exec_nuevaArea = mysqli_query($con, $query_nuevaArea);
    if ($exec_nuevaArea) {
        echo "Success";
    } else {
        echo "Falied";
    }
}

function editarArea(){
    global $con;
    $id_area = $_POST['id_edit_area'];
    $nombre_area = strtoupper(trim($_POST['edit_area']));
    $nombre_jefeArea = strtoupper(trim($_POST['edit_jefeArea']));
    $query_updateArea = "UPDATE empresa_area SET nombre_empresaArea = '$nombre_area', empresa_jefeArea = '$nombre_jefeArea' 
    WHERE id_empresaArea = '$id_area'";
    $exec_updateArea = mysqli_query($con, $query_updateArea);
    if($exec_updateArea){
        echo "Success";
    }else{
        echo "Failed";
    }   
}

function eliminarArea(){
    global $con;
    $id_area = $_POST['id_delete_area'];
    $query_deleteArea = "DELETE FROM empresa_area WHERE id_empresaArea = '$id_area'";
    $exec_deleteArea = mysqli_query($con, $query_deleteArea);
    if($exec_deleteArea){
        echo "Success";
    }else{
        echo "Failed";
    }   
}
