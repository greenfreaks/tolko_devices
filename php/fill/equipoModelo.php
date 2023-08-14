<?php
    $queryModelo = "SELECT * FROM equipo_modelo";
    $execModelo = mysqli_query($con, $queryModelo);
    while($resultModelo = mysqli_fetch_array($execModelo)){
        echo "<option value = ".$resultModelo['idModelo'].">".$resultModelo['nombreModelo']."</option>";
    }
?>