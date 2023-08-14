<?php
include "../php/connection.php";
if(isset($_POST['btnRegNuevoEquipo'])){
    registrarEquipo();
}else if(isset($_POST['btn_editEquipo'])){
    editarEquipo();
}else if(isset($_POST['btn_deleteEquipo'])){
    eliminarEquipo();
}else if(isset($_POST['btnRegNuevoEstatus'])){
    registrarEstado();
}else if(isset($_POST['btn_editEstado'])){
    editarEstado();
}else if(isset($_POST['btn_deleteEstado'])){
    eliminarEstado();
}

function registrarEquipo(){
    global $con;
    $nuevoEquipo = strtoupper(trim($_POST['nuevoEquipo_nombre']));
    $query_insertEquipo = "INSERT INTO equipo_tipo(nombre_tipoEquipo) VALUES('$nuevoEquipo')";
    $exec_insertEquipo = mysqli_query($con, $query_insertEquipo);
    if($exec_insertEquipo){
        echo "Success";
    }else{
        echo "Failed";
    }   
}

function editarEquipo(){
    global $con;
    $id_equipo = $_POST['id_edit_equipo'];
    $nombre_equipo = strtoupper(trim($_POST['edit_equipo']));
    $query_updateEquipo = "UPDATE equipo_tipo SET nombre_tipoEquipo = '$nombre_equipo' WHERE id_tipoEquipo = '$id_equipo'";
    $exec_updateEquipo = mysqli_query($con, $query_updateEquipo);
    if($exec_updateEquipo){
        echo "Success";
    }else{
        echo "Failed";
    }   
}

function eliminarEquipo(){
    global $con;
    $id_equipo = $_POST['id_delete_equipo'];
    $query_deleteEquipo = "DELETE FROM equipo_tipo WHERE id_tipoEquipo = '$id_equipo'";
    $exec_deleteEquipo = mysqli_query($con, $query_deleteEquipo);
    if($exec_deleteEquipo){
        echo "Success";
    }else{
        echo "Failed";
    }   
}

function registrarEstado(){
    global $con;
    $nuevoEstado = strtoupper(trim($_POST['nuevoEstatus_nombre']));
    $query_insertEstado = "INSERT INTO equipo_estado(nombre_equipoEstado) VALUES('$nuevoEstado')";
    $exec_insertEstado = mysqli_query($con, $query_insertEstado);
    if($exec_insertEstado){
        echo "Success";
    }else{
        echo "Failed";
    }   
}
function editarEstado(){
    global $con;
    $id_estado = $_POST['id_edit_estado'];
    $nombre_estado = strtoupper(trim($_POST['edit_estado']));
    $query_updateEstado = "UPDATE equipo_estado SET nombre_equipoEstado = '$nombre_estado' WHERE id_equipoEstado = '$id_estado'";
    $exec_updateEstado = mysqli_query($con, $query_updateEstado);
    if($exec_updateEstado){
        echo "Success";
    }else{
        echo "Failed";
    }   
}

function eliminarEstado(){
    global $con;
    $id_estado = $_POST['id_delete_estado'];
    $query_deleteEstado = "DELETE FROM equipo_estado WHERE id_equipoEstado = '$id_estado'";
    $exec_deleteEstado = mysqli_query($con, $query_deleteEstado);
    if($exec_deleteEstado){
        echo "Success";
    }else{
        echo "Failed";
    }   
}


