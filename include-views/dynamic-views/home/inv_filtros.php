<?php
$usuarioNombre = trim(strtoupper($_POST['inv_filtrarUsuario']));
$usuarioArea = $_POST['inv_filtrarArea'];
$usuarioPuesto = $_POST['inv_filtrarPuesto'];
$equipoNombre = $_POST['inv_filtrarNombreEquipo'];
$equipoEstatus = $_POST['inv_filtrarEquipoEstatus'];
$equipoTipo = $_POST['inv_filtrarEquipo'];
$equipoMarca = $_POST['inv_filtrarMarca'];
$equipoModelo = $_POST['inv_filtrarModelo'];
$equipoProcesador = $_POST['inv_filtrarProcesador'];
$equipoRam = $_POST['inv_filtrarRam'];
$equipoDDuro = $_POST['inv_filtrarDDuro'];


$filtrarPrestamo1 = $_POST['inv_filtrarPrestamo1'];
$filtrarPrestamo2 = $_POST['inv_filtrarPrestamo2'];

$filtro = "";

if($usuarioNombre != ""){
    if($filtro == ""){
        $filtro = " WHERE usuarioNombre LIKE '%{$usuarioNombre}%'";
    }else{
        $filtro .= " AND usuarioNombre LIKE '%{$usuarioNombre}%'";
    }    
}

if($usuarioArea != ""){
    if($filtro == ""){
        $filtro = " WHERE fk_usuarioArea = {$usuarioArea}";
    }else{
        $filtro .= " AND fk_usuarioArea = {$usuarioArea}";
    } 
}

if($usuarioPuesto != ""){
    if($filtro == ""){
        $filtro = " WHERE usuarioPuesto LIKE '%{$usuarioPuesto}%'";
    }else{
        $filtro .= " AND usuarioPuesto LIKE '%{$usuarioPuesto}%'";
    } 
}

if($equipoNombre != ""){
    if($filtro == ""){
        $filtro = " WHERE equipoNombre LIKE '%{$equipoNombre}%'";
    }else{
        $filtro .= " AND equipoNombre LIKE '%{$equipoNombre}%'";
    } 
}

if($equipoEstatus != ""){
    if($filtro == ""){
        $filtro = " WHERE fk_equipoEstado = {$equipoEstatus}";
    }else{
        $filtro .= " AND fk_equipoEstado = {$equipoEstatus}";
    } 
}

if($equipoTipo != ""){
    if($filtro == ""){
        $filtro = " WHERE fk_equipoTipo = {$equipoTipo}";
    }else{
        $filtro .= " AND fk_equipoTipo = {$equipoTipo}";
    } 
}

if($equipoMarca != ""){
    if($filtro == ""){
        $filtro = " WHERE equipoMarca LIKE '%{$equipoMarca}%' ";
    }else{
        $filtro .= " AND equipoMarca LIKE '%{$equipoMarca}%' ";
    } 
}

if($equipoModelo != ""){
    if($filtro == ""){
        $filtro = " WHERE equipoModelo LIKE '%{$equipoModelo}%'";
    }else{
        $filtro .= " AND equipoModelo LIKE '%{$equipoModelo}%'";
    } 
}

if($equipoProcesador != ""){
    if($filtro == ""){
        $filtro = " WHERE equipoProcesador LIKE '%{$equipoProcesador}%'";
    }else{
        $filtro .= " AND equipoProcesador LIKE '%{$equipoProcesador}%'";
    } 
}

if($equipoRam != ""){
    if($filtro == ""){
        $filtro = " WHERE equipoRam = $equipoRam";
    }else{
        $filtro .= " AND equipoRam = $equipoRam";
    } 
}

if($equipoDDuro != ""){
    if($filtro == ""){
        $filtro = " WHERE equipoDiscoDuro LIKE '%$equipoDDuro%'";
    }else{
        $filtro .= " AND equipoDiscoDuro LIKE '%$equipoDDuro%'";
    } 
}

if($equipoPrecio1 != "" && $equipoPrecio2 != "" ){
    if($filtro == ""){
        $filtro = " WHERE equipoPrecio BETWEEN '$equipoPrecio1' AND '$equipoPrecio2'";
    }else{
        $filtro .= " AND equipoPrecio BETWEEN '$equipoPrecio1' AND '$equipoPrecio2'";
    } 
}


if($filtrarPrestamo1 != "" && $filtrarPrestamo2 != "" ){
    if($filtro == ""){
        $filtro = " WHERE prestamoOtorgamiento BETWEEN '$filtrarPrestamo1' AND '$filtrarPrestamo2'";
    }else{
        $filtro .= " AND prestamoOtorgamiento BETWEEN '$filtrarPrestamo1' AND '$filtrarPrestamo2'";
    } 
}

$query_inventario = "SELECT * FROM inventario inv
INNER JOIN empresa_area area ON inv.fk_usuarioArea = area.id_empresaArea
INNER JOIN equipo_estado eEstado ON inv.fk_equipoEstado = eEstado.id_equipoEstado
INNER JOIN equipo_tipo eTipo ON inv.fk_equipoTipo = eTipo.id_tipoEquipo
$filtro
ORDER BY usuarioNombre ASC";
$result_inventario = mysqli_query($con, $query_inventario);



?>
