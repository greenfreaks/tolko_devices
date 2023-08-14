<?php
    $query_adminNivel = "SELECT * FROM usuario_nivel";
    $exec_adminNivel = mysqli_query($con, $query_adminNivel);
    while($result_adminNivel = mysqli_fetch_array($exec_adminNivel)){
        echo "<option value = ".$result_adminNivel['idNivel'].">".$result_adminNivel['nombreNivel']."</option>";
    }
?>