<?php
include "../php/connection.php";

if (isset($_POST['btnInventariar'])) {
    inventariar();
} else if (isset($_POST['btn_editInventariar'])) {
    editar();
} else if (isset($_POST['btn_deleteInventariar'])) {
    eliminar();
} else if (isset($_POST['cartaFirmada_btn'])) {
    subirCartaFirmada();
} else if (isset($_POST['nuevaCarta_btn'])) {
    cambiarCartaFirmada();
} else if (isset($_POST['borrarCarta_btn'])) {
    borrarCartaFirmada();
} else if (isset($_POST['inv_reporteButton'])) {
    generarReporte();
} else if (isset($_POST['inv_buttonExcel'])) {
    cargarExcel();
}

function inventariar()
{
    global $con;
    $usuario_nombre = trim(strtoupper($_POST['usuario_nombre']));
    $usuario_area = $_POST['usuario_area'];
    $usuario_puesto = trim(strtoupper($_POST['usuario_puesto']));
    $equipo_nombre = trim(strtoupper($_POST['equipo_nombre']));
    $equipo_tipo = $_POST['equipo_tipo'];

    $equipo_marca = trim(strtoupper($_POST['equipo_marca']));
    $equipo_modelo = trim(strtoupper($_POST['equipo_modelo']));
    $equipo_procesador = trim(strtoupper($_POST['equipo_procesador']));
    $equipo_ram = trim(strtoupper($_POST['equipo_ram']));
    $equipo_discoDuro = trim(strtoupper($_POST['equipo_discoDuro']));
    $equipo_noSerie = trim($_POST['equipo_noSerie']);
    $equipo_noInventario = trim($_POST['equipo_noInventario']);
    $equipo_precio = trim(strtoupper($_POST['equipo_precio']));
    $equipo_precioLetra = trim(strtoupper($_POST['equipo_precioLetra']));
    $prestamo_fechaPrestamo = trim(strtoupper($_POST['prestamo_fechaPrestamo']));
    $prestamo_observaciones = trim(strtoupper($_POST['prestamo_observaciones']));

    $query_repeatedSerial = mysqli_query($con, "SELECT * FROM inventario WHERE equipoNoSerie = '{$equipo_noSerie}'");
    $verify_repeatedSerial = mysqli_num_rows($query_repeatedSerial);
    $query_repeatedInventario = mysqli_query($con, "SELECT * FROM inventario WHERE equipoNoInventario = '{$equipo_noInventario}'");
    $verify_repeatedInventario = mysqli_num_rows($query_repeatedInventario);
    if ($verify_repeatedSerial > 0) {
        echo "No serie existe";
    } else if ($verify_repeatedInventario > 0) {
        echo "No inventario existe";
    } else {
        $inventariar_query = "INSERT INTO `inventario` 
        (`idInventario`, 
        `usuarioNombre`, 
        `fk_usuarioArea`, 
        `usuarioPuesto`, 
        `equipoNombre`, 
        `fk_equipoTipo`,
        `equipoMarca`, 
        `equipoModelo`, 
        `equipoProcesador`,
        `equipoRam`, 
        `equipoDiscoDuro`, 
        `equipoNoSerie`,
        `equipoNoInventario`,
        `equipoPrecio`,
        `equipoPrecioLetra`,
        `prestamoOtorgamiento`,
        `equipoObservaciones`,   
        `createdAt`, 
        `modifiedAt`) 
        VALUES 
        (NULL, 
        '$usuario_nombre', 
        '$usuario_area', 
        '$usuario_puesto', 
        '$equipo_nombre', 
        '$equipo_tipo', 
        '$equipo_marca', 
        '$equipo_modelo', 
        '$equipo_procesador',
        '$equipo_ram ', 
        '$equipo_discoDuro', 
        '$equipo_noSerie', 
        '$equipo_noInventario',  
        '$equipo_precio', 
        '$equipo_precioLetra', 
        '$prestamo_fechaPrestamo', 
        '$prestamo_observaciones', 
        current_timestamp(), 
        NULL); ";

        $inventariar_exec = mysqli_query($con, $inventariar_query);
        if ($inventariar_exec) {
            echo "Success";
        } else {
            echo "Failed";
        }
    }
}

function editar()
{
    global $con;
    $id_inventario = $_POST['edit_id_inventario'];
    $usuario_nombre = trim(strtoupper($_POST['edit_usuario_nombre']));
    $usuario_area = $_POST['edit_usuario_area'];
    $usuario_puesto = trim(strtoupper($_POST['edit_usuario_puesto']));
    $equipo_nombre = trim(strtoupper($_POST['edit_equipo_nombre']));
    $equipo_estado = trim(strtoupper($_POST['edit_equipo_estado']));
    $equipo_tipo = $_POST['edit_equipo_tipo'];

    $equipo_marca = trim(strtoupper($_POST['edit_equipo_marca']));
    $equipo_modelo = trim(strtoupper($_POST['edit_equipo_modelo']));
    $equipo_procesador = trim(strtoupper($_POST['edit_equipo_procesador']));
    $equipo_ram = trim(strtoupper($_POST['edit_equipo_ram']));
    $equipo_discoDuro = trim(strtoupper($_POST['edit_equipo_discoDuro']));
    $equipo_noSerie = trim($_POST['edit_equipo_noSerie']);
    $equipo_noInventario = trim($_POST['edit_equipo_noInventario']);
    $equipo_precio = trim(strtoupper($_POST['edit_equipo_precio']));
    $equipo_precioLetra = trim(strtoupper($_POST['edit_equipo_precioLetra']));
    $prestamo_fechaPrestamo = trim(strtoupper($_POST['edit_prestamo_fechaPrestamo']));
    $prestamo_observaciones = trim(strtoupper($_POST['edit_prestamo_observaciones']));

    $query_updateInventario = "UPDATE inventario
    SET 
        usuarioNombre = '$usuario_nombre',
        fk_usuarioArea = '$usuario_area',
        usuarioPuesto = '$usuario_puesto',
        equipoNombre = '$equipo_nombre',
        fk_equipoEstado = '$equipo_estado',
        fk_equipoTipo = '$equipo_tipo',
        equipoMarca = '$equipo_marca',
        equipoModelo = '$equipo_modelo',
        equipoProcesador = '$equipo_procesador',
        equipoRam = '$equipo_ram',
        equipoDiscoDuro = '$equipo_discoDuro',
        equipoNoSerie = '$equipo_noSerie',
        equipoNoInventario = '$equipo_noInventario',
        equipoPrecio = '$equipo_precio',
        equipoPrecioLetra = '$equipo_precioLetra',
        prestamoOtorgamiento = '$prestamo_fechaPrestamo',
        equipoObservaciones = '$prestamo_observaciones'
        WHERE idInventario = '$id_inventario'
        ";
    $exec_updateInventario = mysqli_query($con, $query_updateInventario);
    if ($exec_updateInventario) {
        echo "Success";
    } else {
        echo "Failed";
    }
}

function eliminar()
{
    global $con;
    $id_inventario = $_POST['delete_id_inventario'];
    $query_deleteInventario = "DELETE FROM inventario WHERE idInventario = '$id_inventario'";
    $exec_deleteInventario = mysqli_query($con, $query_deleteInventario);
    if ($exec_deleteInventario) {
        echo "Success";
    } else {
        echo "Failed";
    }
}

function subirCartaFirmada()
{
    global $con;
    $id_inventario = $_POST['id'];
    $usuario_nombre = $_POST['nombre'];
    $nombre = $_POST['nombre'];
    $ruta = '../files/' . $usuario_nombre . '/';
    $archivo = $ruta . $_FILES['cartaFirmada_equipo_archivo']['name'];

    if (!file_exists($ruta)) {
        mkdir($ruta);
    }
    if (!file_exists($archivo)) {
        $resultado = @move_uploaded_file($_FILES['cartaFirmada_equipo_archivo']['tmp_name'], $archivo);
        if ($resultado) {
            echo "Archivo Guardado";
        } else {
            echo "Error";
        }
    } else {
        echo "El archivo ya existe";
    }

    $query = "UPDATE inventario SET prestamoResponsiva = '$archivo' WHERE idInventario = '$id_inventario' ";
    $exec = mysqli_query($con, $query);
    if ($exec) { ?>
        <script>
            alert("Archivo cargado correctamente");
            setTimeout(function() {
                window.location.replace("../sections/home.php");
            }, 500)
        </script>
    <?php
    } else { ?>
        <script>
            alert("Error al Cargar el archivo");
            setTimeout(function() {
                window.location.replace("../sections/home.php");
            }, 500)
        </script>
    <?php
    }
}
function cambiarCartaFirmada()
{
    global $con;
    $id_inventario = $_POST['id'];
    $usuario_nombre = $_POST['usuarioNombre'];
    $archivo_actual = $_POST['ruta_cartaActual'];
    $ruta = '../files/' . $usuario_nombre . '/';
    $archivo = $ruta . $_FILES['nueva_carta']['name'];

    unlink($archivo_actual);


    if (!file_exists($ruta)) {
        mkdir($ruta);
    }
    if (!file_exists($archivo)) {
        $resultado = @move_uploaded_file($_FILES['nueva_carta']['tmp_name'], $archivo);
        if ($resultado) {
            echo "Archivo Guardado";
        } else {
            echo "Error";
        }
    } else {
        echo "El archivo ya existe";
    }

    $query = "UPDATE inventario SET prestamoResponsiva = '$archivo' WHERE idInventario = '$id_inventario' ";
    $exec = mysqli_query($con, $query);
    if ($exec) { ?>
        <script>
            alert("Archivo modificado correctamente");
            setTimeout(function() {
                window.location.replace("../sections/home.php");
            }, 500)
        </script>
    <?php
    } else { ?>
        <script>
            alert("Error al Cargar el archivo");
            setTimeout(function() {
                window.location.replace("../sections/home.php");
            }, 500)
        </script>
    <?php
    }
}

function borrarCartaFirmada()
{
    global $con;
    $id_inventario = $_POST['id'];
    $usuario_nombre = $_POST['usuarioNombre'];
    $archivo_actual = $_POST['ruta_cartaActual'];
    unlink($archivo_actual);



    $query = "UPDATE inventario SET prestamoResponsiva = '' WHERE idInventario = '$id_inventario'";
    $exec = mysqli_query($con, $query);
    if ($exec) { ?>
        <script>
            alert("Archivo Borrado correctamente");
            setTimeout(function() {
                window.location.replace("../sections/home.php");
            }, 500)
        </script>
    <?php
    } else { ?>
        <script>
            alert("Error al Cargar el archivo");
            setTimeout(function() {
                window.location.replace("../sections/home.php");
            }, 500)
        </script>
        <?php
    }
}

function generarReporte()
{
    global $con;
    $usuarioArea = $_POST['inv_reporteArea'];
    $equipoTipo = $_POST['inv_reporteEquipo'];
    $equipoMarca = $_POST['inv_reporteMarca'];
    $equipoModelo = $_POST['inv_reporteModelo'];
    $filtro = "";


    if ($usuarioArea != "") {
        if ($filtro == "") {
            $filtro = " WHERE fk_usuarioArea = {$usuarioArea}";
        } else {
            $filtro .= " AND fk_usuarioArea = {$usuarioArea}";
        }
    }

    if ($equipoTipo != "") {
        if ($filtro == "") {
            $filtro = " WHERE fk_equipoTipo = {$equipoTipo}";
        } else {
            $filtro .= " AND fk_equipoTipo = {$equipoTipo}";
        }
    }

    if ($equipoMarca != "") {
        if ($filtro == "") {
            $filtro = " WHERE fk_equipoMarca = {$equipoMarca}";
        } else {
            $filtro .= " AND fk_equipoMarca = {$equipoMarca}";
        }
    }

    if ($equipoModelo != "") {
        if ($filtro == "") {
            $filtro = " WHERE equipoModelo = {$equipoModelo}";
        } else {
            $filtro .= " AND equipoModelo = {$equipoModelo}";
        }
    }
    header('Expires: 0');
    header('Cache-control: private');
    header("Content-Type: application/vnd.ms-excel; charset=iso-8859-15");
    header("Cache-Control: cache, must-revalidate");
    header('Content-Description: Filte Transfer');
    header('Last-Modified: ' . date('D, d M Y H:i:s'));
    header("Pragma: public");
    header("Content-Disposition: attachment; filename = Reporte de Inventario de equipos Cesvin.xls");
    header("Content-Transfer-Encoding: binary");
    echo utf8_decode("
        <h2>Reporte de invetario de equipos de CESVIN</h2>
        <table border = '0'>
            <tr style = 'background-color: green; color: white; text-aligh: center; border: 1px solid #000;'>
                <td>Usuario</th>
                <td>Área</th>
                <td>Puesto</th>
                <td>Equipo</th>
                <td>Clasificación</th>
                <td>Marca</th>
                <td>Modelo</th>
                <td>Procesador</th>
                <td>RAM</th>
                <td>Disco Duro</th>
                <td>No. de serie</th>
                <td>No. de inventario</th>
                <td>Precio(MXN)</th>
                <td>Precio letra</th>
                <td>Fecha en que se otorgó al usuario</th>
                <td>Observaciones</th>
            </tr>");
    $query_inventario = "SELECT * FROM inventario inv
                INNER JOIN empresa_area area ON inv.fk_usuarioArea = area.id_empresaArea
                INNER JOIN equipo_tipo eTipo ON inv.fk_equipoTipo = eTipo.id_tipoEquipo
                $filtro";
    $result_inventario = mysqli_query($con, $query_inventario);

    foreach ($result_inventario as $inventario) {
        echo utf8_decode("
                <tr style= 'border: solid 1px #000;     '>
                    <td>{$inventario['usuarioNombre']}</td>
                    <td>{$inventario['nombre_empresaArea']}</td>
                    <td>{$inventario['usuarioPuesto']}</td>
                    <td>{$inventario['equipoNombre']}</td>
                    <td>{$inventario['nombre_tipoEquipo']}</td>
                    <td>{$inventario['equipoMarca']}</td>
                    <td>{$inventario['equipoModelo']}</td>
                    <td>{$inventario['equipoProcesador']}</td>
                    <td>{$inventario['equipoRam']}</td>
                    <td>{$inventario['equipoDiscoDuro']}</td>
                    <td>{$inventario['equipoNoSerie']}</td>
                    <td>{$inventario['equipoNoInventario']}</td>
                    <td>{$inventario['equipoPrecio']}</td>
                    <td>{$inventario['equipoPrecioLetra']}</td>
                    <td>{$inventario['prestamoOtorgamiento']}</td>
                    <td>{$inventario['equipoObservaciones']}</td>
                </tr>");
    }

    echo "
    </table>";
    // header("Location: localhost://home.php");
    // exit();
}

function cargarExcel()
{
    global $con;
    $tipo       = $_FILES['inv_subirExcel']['type'];
    $tamanio    = $_FILES['inv_subirExcel']['size'];
    $archivotmp = $_FILES['inv_subirExcel']['tmp_name'];
    $lineas     = file($archivotmp);

    $i = 0;

    foreach ($lineas as $linea) {
        $cantidad_registros = count($lineas);
        $cantidad_regist_agregados =  ($cantidad_registros - 1);

        if ($i != 0) {

            $datos = explode(",", $linea);

            $usuario = strtoupper(($datos[0]));
            $area = ($datos[2]);
            $puesto = strtoupper(($datos[3]));
            $equipo = strtoupper(($datos[4]));
            $estatusEquipo = ($datos[5]);
            $tipoEquipo = ($datos[6]);
            $marca = strtoupper(($datos[9]));
            $modelo = strtoupper(($datos[10]));
            $procesador = strtoupper(($datos[11]));
            $ram = strtoupper(($datos[12]));
            $discoDuro = strtoupper(($datos[13]));
            $noSerie = ($datos[14]);
            $noInventario = ($datos[15]);
            $precio = ($datos[16]);
            $precioLetra = strtoupper(($datos[17]));
            $fPrestamo = ($datos[19]);
            $observaciones = ($datos[20]);

            $type =gettype($usuario);
            echo $type;
            print $type;

            $query_serieExists = mysqli_query($con, "SELECT * FROM inventario WHERE equipoNoSerie = '{$noSerie}'");
            $result_serieExists = mysqli_num_rows($query_serieExists);
            // $query_inventarioExists = mysqli_query($con, "SELECT * FROM inventario WHERE equipoNoInventario = '{$noInventario}'");
            // $result_inventarioExists = mysqli_num_rows($query_inventarioExists);

            if ($result_serieExists > 0) {
                $update_excel = mysqli_query($con, "UPDATE inventario SET
                usuarioNombre = '{$usuario}',
                fk_usuarioArea = '{$area}',
                equipoNombre = '{$equipo}',
                fk_equipoEstado = '{$estatusEquipo}',
                fk_equipoTipo = '{$tipoEquipo}',
                equipoMarca = '{$marca}',
                equipoModelo = '{$modelo}',
                equipoProcesador = '{$procesador}',
                equipoRam = '{$ram}',
                equipoDiscoDuro = '{$discoDuro}',
                equipoPrecio = '{$precio}',
                equipoPrecioLetra = '{$precioLetra}',
                prestamoOtorgamiento = '{$fPrestamo}',
                equipoObservaciones = '{$observaciones}'

                WHERE equipoNoSerie = '{$noSerie}'
               ;
                ");
            } else {
                $query_excel = "INSERT INTO inventario(
                    usuarioNombre,
                    fk_usuarioArea,
                    usuarioPuesto,
                    equipoNombre,
                    fk_equipoEstado,
                    fk_equipoTipo,
                    equipoMarca,
                    equipoModelo,
                    equipoProcesador,
                    equipoRam,
                    equipoDiscoDuro,
                    equipoNoSerie,
                    equipoNoInventario,
                    equipoPrecio,
                    equipoPrecioLetra,
                    prestamoOtorgamiento,
                    equipoObservaciones
                    )VALUES(
                    '$usuario',
                    '$area',
                    '$puesto',
                    '$equipo',
                    '$estatusEquipo',
                    '$tipoEquipo',
                    '$marca',
                    '$modelo',
                    '$procesador',
                    '$ram',
                    '$discoDuro',
                    '$noSerie',
                    '$noInventario',
                    '$precio',
                    '$precioLetra',
                    '$fPrestamo',
                    '$observaciones'
                    )";
                $exec_excel = mysqli_query($con, $query_excel);
                /**Caso Contrario actualizo el o los Registros ya existentes*/
            }
        }


        $i++;
    }
    if ($exec_excel or $update_excel) { ?>
        <script>
            alert("Datos importados exitosamente");
            setTimeout(function() {
                window.location.reload();
            }, 500)
        </script>
    <?php
    } else { ?>
        <script>
            alert("Ocurrió un error al importar los datos");
            setTimeout(function() {
                window.location.reload();
            }, 500)
        </script>
    <?php
    }

    ?>
<?php
}
