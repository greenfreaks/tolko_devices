<?php
    $query_empresaArea = "SELECT * FROM empresa_area";
    $exec_empresaArea = mysqli_query($con, $query_empresaArea);
    while($result_empresaArea = mysqli_fetch_array($exec_empresaArea)){
        echo "<option value = ".$result_empresaArea['id_empresaArea'].">".$result_empresaArea['nombre_empresaArea']." - ".$result_empresaArea['empresa_jefeArea']."   </option>";
    }
?>