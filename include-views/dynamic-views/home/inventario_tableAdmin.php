<?php
require "inv_filtros.php";
while ($inventario = mysqli_fetch_assoc($result_inventario)) { ?>
    <tr class="uppercase">
        <td><?php echo $inventario['usuarioNombre'] ?></td>
        <td><?php echo $inventario['nombre_empresaArea'] ?></td>
        <td><?php echo $inventario['usuarioPuesto'] ?></td>
        <td><?php echo $inventario['equipoNombre'] ?></td>
        <td><?php echo $inventario['nombre_equipoEstado'] ?></td>
        <td><?php echo $inventario['nombre_tipoEquipo'] ?></td>
        <td><?php echo $inventario['equipoMarca'] ?></td>
        <td><?php echo $inventario['equipoModelo'] ?></td>
        <td><?php echo $inventario['equipoProcesador'] ?></td>
        <td><?php echo $inventario['equipoRam'] ?></td>
        <td><?php echo $inventario['equipoDiscoDuro'] ?></td>
        <td><?php echo $inventario['equipoNoSerie'] ?></td>
        <td><?php echo $inventario['equipoNoInventario'] ?></td>
        <td><?php echo $inventario['equipoPrecio'] ?></td>
        <td><?php echo $inventario['equipoPrecioLetra'] ?></td>
        <td><?php echo $inventario['prestamoOtorgamiento'] ?></td>
        <td><?php echo $inventario['equipoObservaciones'] ?></td>
        <td>
            <?php if ($inventario['prestamoResponsiva'] == "") { ?>
                <a href="home_responsiva.php?id=<?php echo $inventario['idInventario'] ?>" target="_blank" class="capitalize btn btn-success whiteTx boldTx">Generar Formato</a>
                <a href="home_actions.php?id_cartaFirmada=<?php echo $inventario['idInventario'] ?>" class="capitalize btn bgLightGray whiteTx">Subir archivo</a>
            <?php
            } else { ?>
                <a href="<?php echo $inventario['prestamoResponsiva'] ?>" target="_blank" class="capitalize btn btn-success whiteTx boldTx">Ver</a> <br>
                <a href="home_actions.php?id_cambiarCarta=<?php echo $inventario['idInventario'] ?>" class="noTransform"> Cambiar</a>   |   
                <a href="home_actions.php?id_borrarCarta=<?php echo $inventario['idInventario'] ?>" target="_blank" class="noTransform"> Borrar</a>
            <?php
            }
            ?>
        </td>
        <td>
            <a class="capitalize btn bgLightGray whiteTx boldTx" href="home_actions.php?id_editInventario=<?php echo $inventario['idInventario'] ?>">Editar</a>
            <a class="capitalize btn bgLightGray whiteTx boldTx" href="home_actions.php?id_deleteInventario=<?php echo $inventario['idInventario'] ?>">Eliminar</a>
        </td>
    </tr>

<?php
}

?>