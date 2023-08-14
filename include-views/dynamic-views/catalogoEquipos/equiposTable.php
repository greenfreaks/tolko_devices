<?php
$query_equipos = "SELECT * FROM equipo_tipo";
$exec_equipos = mysqli_query($con, $query_equipos);
while ($equipos = mysqli_fetch_assoc($exec_equipos)) { ?>
    <tr>
        <td><?php echo $equipos['id_tipoEquipo'] ?></td>
        <td><?php echo $equipos['nombre_tipoEquipo'] ?></td>
        <td>
            <a href="equipos_actions.php?edit_idEquipo=<?php echo $equipos['id_tipoEquipo'] ?>" class="btn bgLightGray whiteTx">Editar</a>
            <a href="equipos_actions.php?delete_idEquipo=<?php echo $equipos['id_tipoEquipo'] ?>" class="btn bgLightGray whiteTx">Eliminar</a>
        </td>
    </tr>
<?php
}
?>