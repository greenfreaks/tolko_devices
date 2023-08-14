<?php
    $query_equipoTipo = "SELECT * FROM equipo_tipo";
    $exec_equipoTipo = mysqli_query($con, $query_equipoTipo);
    while($result_equipoTipo = mysqli_fetch_array($exec_equipoTipo)){
        echo "<option value = ".$result_equipoTipo['id_tipoEquipo'].">".$result_equipoTipo['nombre_tipoEquipo']."</option>";
    }
?>