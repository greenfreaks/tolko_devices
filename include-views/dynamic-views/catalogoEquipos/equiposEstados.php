<?php
$query_estado= "SELECT * FROM equipo_estado";
$exec_estado = mysqli_query($con, $query_estado);
while ($estado = mysqli_fetch_assoc($exec_estado)) { ?>
    <tr>
        <td><?php echo $estado['id_equipoEstado'] ?></td>
        <td><?php echo $estado['nombre_equipoEstado'] ?></td>
        <td>
            <a href="equipos_actions.php?edit_idEstadoEquipo=<?php echo $estado['id_equipoEstado'] ?>" class="btn bgLightGray whiteTx">Editar</a>
            <a href="equipos_actions.php?delete_idEstadoEquipo=<?php echo $estado['id_equipoEstado'] ?>" class="btn bgLightGray whiteTx">Eliminar</a>
        </td>
    </tr>
<?php
}
?>