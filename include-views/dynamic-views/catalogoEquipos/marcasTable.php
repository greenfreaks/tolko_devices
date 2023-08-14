<?php
$query_marcas = "SELECT * FROM equipo_marca";
$exec_marcas = mysqli_query($con, $query_marcas);
while ($marcas = mysqli_fetch_assoc($exec_marcas)) { ?>
    <tr>
        <td><?php echo $marcas['idMarca'] ?></td>
        <td><?php echo $marcas['nombreMarca'] ?></td>
        <td>
            <a href="equipos_actions.php?edit_idMarca=<?php echo $marcas['idMarca'] ?>" class="btn bgLightGray whiteTx">Editar</a>
            <a href="equipos_actions.php?delete_idMarca=<?php echo $marcas['idMarca'] ?>" class="btn bgLightGray whiteTx">Eliminar</a>
        </td>
    </tr>
<?php
}
?>