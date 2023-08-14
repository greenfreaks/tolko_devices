<?php
    $queryMarca = "SELECT * FROM equipo_marca";
    $execMarca = mysqli_query($con, $queryMarca);
    while($resultMarca = mysqli_fetch_array($execMarca)){
        echo "<option value = ".$resultMarca['idMarca'].">".$resultMarca['nombreMarca']."</option>";
    }
?>