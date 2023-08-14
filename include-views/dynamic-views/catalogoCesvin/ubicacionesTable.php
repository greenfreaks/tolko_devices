<?php
$query_ubicaciones = "SELECT * FROM empresa_lugar";
$exec_ubicaciones = mysqli_query($con, $query_ubicaciones);
while ($ubicaciones = mysqli_fetch_assoc($exec_ubicaciones)) { ?>
    <tr>
        <td><?php echo $ubicaciones['id_empresaLugar'] ?></td>
        <td><?php echo $ubicaciones['nombre_empresaLugar'] ?></td>
        <td>
            <a href="cesvin_actions.php?edit_idUbicacion=<?php echo $ubicaciones['id_empresaLugar'] ?>" class="btn bgLightGray whiteTx">Editar</a>
            <a href="cesvin_actions.php?delete_idUbicacion=<?php echo $ubicaciones['id_empresaLugar'] ?>" class="btn bgLightGray whiteTx">Eliminar</a>
        </td>
    </tr>
<?php
}
?>