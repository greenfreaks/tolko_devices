<?php
// require "../../../php/connection.php";
$usuarioArea = $_POST['inv_reporteArea'];
$equipoTipo = $_POST['inv_reporteEquipo'];
$equipoMarca = $_POST['inv_reporteMarca'];
$equipoModelo = $_POST['inv_reporteModelo'];
$filtro = "";

if (isset($_POST['inv_reporteButton'])) {
    header('Content-Type: text/csv; charset=latin1');
    header('Content-Disposition: attachment; filename = "Reporte de Inventario.csv"');
    $salida = fopen('php://output', 'w');
    fputcsv(
        $salida,
        array(
            'Nombre de usuario',
            'Área',
            'Puesto',
            'Equipo',
            'Tipo de equipo',
            'Marca',
            'Modelo',
            'Procesador',
            'RAM',
            'Disco Duro',
            'No. Serie',
            'No. Inventario',
            'Precio',
            'Precio Letra',
            'Fecha de Préstamo',
            'Observaciones'
        )
    );

    $query_reporte = "SELECT * FROM inventario inv
    INNER JOIN empresa_area area ON inv.fk_usuarioArea = area.id_empresaArea
    INNER JOIN equipo_tipo eTipo ON inv.fk_equipoTipo = eTipo.id_tipoEquipo
    INNER JOIN equipo_marca eMarca ON inv.fk_equipoMarca = eMarca.idMarca
    INNER JOIN equipo_modelo eModelo ON inv.fk_equipoModelo = eModelo.idModelo
    $filtro";
    $exec_reporte = mysqli_query($con, $query_reporte);

    while ($reporte = mysqli_fetch_assoc($exec_reporte)) {
        fputcsv(
            $salida,
            array(
                $reporte['usuarioNombre'],
                $reporte['nombre_empresaArea'],
                $reporte['usuarioPuesto'],
                $reporte['equipoNombre'],
                $reporte['nombre_tipoEquipo'],
                $reporte['nombreMarca'],
                $reporte['nombreModelo'],
                $reporte['equipoProcesador'],
                $reporte['equipoRam'],
                $reporte['equipoDiscoDuro'],
                $reporte['equipoNoSerie'],
                $reporte['equipoNoInventario'],
                $reporte['equipoPrecio'],
                $reporte['equipoPrecioLetra'],
                $reporte['prestamoOtorgamiento'],
                $reporte['equipoObservaciones']
            )
        );
    }
}
