<?php
    $query_equipoEstado = "SELECT * FROM equipo_estado";
    $exec_equipoEstado = mysqli_query($con, $query_equipoEstado);
    while($result_equipoEstado = mysqli_fetch_array($exec_equipoEstado)){
        echo "<option value = ".$result_equipoEstado['id_equipoEstado'].">".$result_equipoEstado['nombre_equipoEstado']."</option>";
    }
?>