<?php
$query_admins = "SELECT * FROM admins adm
INNER JOIN  usuario_nivel univel ON adm.fk_nivelAdmin = univel.idNivel";
$exec_admins = mysqli_query($con, $query_admins);

while ($admin = mysqli_fetch_array($exec_admins)) { ?>
    <tr>
        <td><?php echo $admin['nombreAdmin'] ?></td>
        <td><?php echo $admin['usuarioAdmin'] ?></td>
        <td><?php echo $admin['nombreNivel'] ?></td>
        <td><?php echo $admin['passwordAdmin'] ?></td>
        <td class="">
            <a href="usuarios_actions.php?edit_idUsuario=<?php echo $admin['idAdmin'] ?>" class="btn bgLightGray whiteTx">Editar</a href="cesvin_actions.php?edit_idUbicacion=<?php echo $ubicaciones['id_empresaLugar'] ?>">
            <a href="usuarios_actions.php?delete_idUsuario=<?php echo $admin['idAdmin'] ?>" class="btn bgLightGray whiteTx">Eliminar</a href="cesvin_actions.php?edit_idUbicacion=<?php echo $ubicaciones['id_empresaLugar'] ?>">
        </td>

    </tr>
<?php
}
?>