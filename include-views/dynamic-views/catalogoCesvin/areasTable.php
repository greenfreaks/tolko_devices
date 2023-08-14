<?php
$query_areas = "SELECT * FROM empresa_area";
$exec_areas = mysqli_query($con, $query_areas);
while ($areas = mysqli_fetch_assoc($exec_areas)) { ?>
    <tr>
        <td><?php echo $areas['id_empresaArea'] ?></td>
        <td><?php echo $areas['nombre_empresaArea'] ?></td>
        <td><?php echo $areas['empresa_jefeArea'] ?></td>
        <td>
            <a href="cesvin_actions.php?edit_idArea=<?php echo $areas['id_empresaArea'] ?>" class="btn bgLightGray whiteTx">Editar</a href="cesvin_actions.php?edit_idUbicacion=<?php echo $ubicaciones['id_empresaLugar'] ?>">
            <a href="cesvin_actions.php?delete_idArea=<?php echo $areas['id_empresaArea'] ?>" class="btn bgLightGray whiteTx">Eliminar</a href="cesvin_actions.php?edit_idUbicacion=<?php echo $ubicaciones['id_empresaLugar'] ?>">
        </td>
    </tr>
<?php
}
?>