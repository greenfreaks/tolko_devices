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
        <td><?php echo $inventario['nombreMarca'] ?></td>
        <td><?php echo $inventario['nombreModelo'] ?></td>
        <td><?php echo $inventario['equipoProcesador'] ?></td>
        <td><?php echo $inventario['equipoRam'] ?></td>
        <td><?php echo $inventario['equipoDiscoDuro'] ?></td>
        <td><?php echo $inventario['equipoNoSerie'] ?></td>
        <td><?php echo $inventario['equipoNoInventario'] ?></td>
        <td><?php echo $inventario['equipoPrecio'] ?></td>
        <td><?php echo $inventario['equipoPrecioLetra'] ?></td>
        <td><?php echo $inventario['prestamoOtorgamiento'] ?></td>
        <td><?php echo $inventario['equipoObservaciones'] ?></td>
    </tr>

<?php
}

?>