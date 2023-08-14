<?php
$query_modelos = "SELECT * FROM equipo_modelo";
$exec_modelos = mysqli_query($con, $query_modelos);
while ($modelos = mysqli_fetch_assoc($exec_modelos)) { ?>
    <tr>
        <td><?php echo $modelos['idModelo'] ?></td>
        <td><?php echo $modelos['nombreModelo'] ?></td>
        <td>
            <a href="equipos_actions.php?edit_idModelo=<?php echo $modelos['idModelo'] ?>" class="btn bgLightGray whiteTx">Editar</a>
            <a href="equipos_actions.php?delete_idModelo=<?php echo $modelos['idModelo'] ?>" class="btn bgLightGray whiteTx">Eliminar</a>
        </td>
    </tr>
<?php
}
?>