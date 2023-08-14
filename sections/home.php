<?php require "../php/verify_activeSesson.php" ?>
<?php require "../include-views/template-views/html1.php" ?>
<div class="appBodyContent">

    <h1>Inventario de equipos</h1>
    <div class="space"></div>
    <section class="add">
        <?php
        if ($user['fk_nivelAdmin'] == 1) { ?>
        <button class="btn bgBlack whiteTx boldTx rounded" data-bs-toggle="modal" data-bs-target="#modalInventariar">
            Nuevo
        </button>
        <button class="btn bgLightGray whiteTx" data-bs-toggle="modal" data-bs-target="#modalSubirExcel">Subir
            Excel</button>
        <?php

        }
        ?>


    </section>

    <div class="space"></div>

    <section class="fitrosInventario  card">
        <h4>Filtros de búsqueda</h4>
        <form class="filtrosInventario__form" id="filtrosInventario" method="POST">
            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                            Filtros de usuario
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body flexH">
                            <div class="nombreUsuario">
                                <h6>Usuario</h6>
                                <input type="text" class="form-control uppercase" name="inv_filtrarUsuario"
                                    id="inv_filtrarUsuario" placeholder="Nombre del usuario..."
                                    value="<?php echo $_POST["inv_filtrarUsuario"] ?>">
                            </div>

                            <div class="areaUsuario">
                                <h6>Área</h6>
                                <select name="inv_filtrarArea" id="inv_filtrarArea" class="form-select">
                                    <option value="">Todas</option>
                                    <?php require "../php/fill/empresaArea.php" ?>
                                </select>
                            </div>

                            <div class="puestoUsuario">
                                <h6>Puesto</h6>
                                <input type="text" class="form-control uppercase" name="inv_filtrarPuesto"
                                    id="inv_filtrarPuesto" placeholder="Puesto del usuario..."
                                    value="<?php echo $_POST["inv_filtrarPuesto"] ?>">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Filtros de equipos de cómputo
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body flexH">
                            <div class="equipoNombre">
                                <h6>Nombre del equipo</h6>
                                <input type="text" class="form-control uppercase" name="inv_filtrarNombreEquipo"
                                    id="inv_filtrarNombreEquipo" placeholder="Nombre del equipo..."
                                    value="<?php echo $_POST["inv_filtrarNombreEquipo"] ?>">
                            </div>

                            <div class="equipoEstatus">
                                <h6>Estatus del equipo</h6>
                                <select name="inv_filtrarEquipoEstatus" id="inv_filtrarEquipoEstatus"
                                    class="form-select">
                                    <option value="">Todos</option>
                                    <?php require "../php/fill/equipo_estado.php" ?>
                                </select>
                            </div>

                            <div class="equipoTipo">
                                <h6>Tipo de equipo</h6>
                                <select name="inv_filtrarEquipo" id="inv_filtrarEquipo" class="form-select">
                                    <option value="">Todos</option>
                                    <?php require "../php/fill/equipoTipo.php" ?>
                                </select>
                            </div>

                            <div class="equipoMarca">
                                <h6>Marca</h6>
                                <input type="text" class="uppercase form-control" name="inv_filtrarMarca">
                            </div>
                            <div class="equipoModelo">
                                <h6>Modelo</h6>
                                <input type="text" class="uppercase form-control" name="inv_filtrarModelo">
                            </div>

                            <div class="equipoProcesador">
                                <h6>Procesador</h6>
                                <input type="text" class="form-control uppercase" name="inv_filtrarProcesador"
                                    id="inv_filtrarEquipoProcesador" placeholder="Procesador..."
                                    value="<?php echo $_POST["inv_filtrarProcesador"] ?>">
                            </div>

                            <div class="equipoRam">
                                <h6>RAM</h6>
                                <input type="text" class="form-control uppercase" name="inv_filtrarRam"
                                    id="inv_filtrarEquipoRam" placeholder="Ram..."
                                    value="<?php echo $_POST["inv_filtrarRam"] ?>">
                            </div>

                            <div class="equipoDDuro">
                                <h6>Disco Duro</h6>
                                <input type="text" class="form-control uppercase" name="inv_filtrarDDuro"
                                    id="inv_filtrarEquipoDDuro" placeholder="Disco Duro..."
                                    value="<?php echo $_POST["inv_filtrarDDuro"] ?>">
                            </div>

                            <div class="equipoPrecio card flexV">
                                <h6>Precio</h6>
                                <div class="flexH">
                                    <div>
                                        <h6>Desde</h6>
                                        <input type="number" name="inv_filtrarEquipoPrecio1" id="inv_filtrarPrecio1"
                                            class="form-control"
                                            value="<?php echo $_POST["inv_filtrarEquipoPrecio1"] ?>">
                                    </div> <br>

                                    <div>
                                        <h6>Hasta</h6>
                                        <input type="number" name="inv_filtrarEquipoPrecio2" id="inv_filtrarPrecio2"
                                            class="form-control"
                                            value="<?php echo $_POST["inv_filtrarEquipoPrecio2"] ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            Filtro de fechas
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body flexH">
                            <div class="fechaPrestamo">
                                <h6>Fecha de prestamo</h6>
                                <div class="flexH">
                                    <div>
                                        <h6>Desde</h6>
                                        <input type="date" name="inv_filtrarPrestamo1" id="inv_filtrarFechaPrestamo1"
                                            class="form-control" value="<?php echo $_POST["inv_filtrarPrestamo1"] ?>">
                                    </div>

                                    <div>
                                        <h6>Hasta</h6>
                                        <input type="date" name="inv_filtrarPrestamo2" id="inv_filtrarFechaPrestamo2"
                                            class="form-control" value="<?php echo $_POST["inv_filtrarPrestamo2"] ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <br>
            <div class="InventarioButton>
                <!-- <input type=" submit" class="btn btn-primary" id="inv_btnFiltrar" name="inv_btnFiltrar"
                value="Buscar">
                <button id="inv_btnFiltrar" name="inv_btnFiltrar" class="btn btn-primary">Buscar</button>
                <a href="home.php">Borrar filtros</a>
            </div>

        </form>
    </section>
    <input class="btn btn-success" type="button" onclick="tableToExcel('tableExcel', 'Reporte de inventario')"
        value="Descargar excel">
    <div class="space"></div>
    <?php require "../include-views/dynamic-views/home/inv_filtros.php";
            $total = mysqli_num_rows($result_inventario);
            echo "<h3>Registros encontrados: {$total}</h3>";
        ?>
    <section class="tableContainer devices">
        
        <table class="table table_devices table-striped table-hover" id="tableExcel">
            <thead class="bgBlack">
                <tr class="whiteTx">
                    <th>USUARIO</th>
                    <th>AREA</th>
                    <th>PUESTO</th>
                    <th>NOMBRE DEL COMPONENTE</th>
                    <th>ESTADO DEL COMPONENTE</th>
                    <th>TIPO DE COMPONENTE</th>
                    <th>MARCA</th>
                    <th>MODELO</th>
                    <th>PROCESADOR</th>
                    <th>RAM</th>
                    <th>DISCO DURO</th>
                    <th>No. DE SERIE</th>
                    <th>NO. DE INVENTARIO</th>
                    <th>PRECIO(MXN)</th>
                    <th>PRECIO LETRA</th>
                    <th>FECHA DE PRESTAMO AL USUARIO</th>
                    <th>OBSERVACIONES</th>
                    <th>RESPONSIVA</th>
                    <?php
                    if ($user['fk_nivelAdmin'] == 1) { ?>
                    <th>Editar / Eliminar</th>
                    <?php
                    }
                    ?>

                </tr>
            </thead>
            <tbody class="searchIn">
                <?php
                if ($user['fk_nivelAdmin'] == 1) {
                    require "../include-views/dynamic-views/home/inventario_tableAdmin.php";
                } else {
                    require "../include-views/dynamic-views/home/inventario_tableUser.php";
                }
                ?>
            </tbody>
        </table>
    </section>

</div>

<?php require "../include-views/dynamic-views/home/modalInventariar.php" ?>
<?php require "../include-views/dynamic-views/home/inv_filtros.php" ?>

<script type="text/javascript">
    window.location.hash = "no-back-button";
    window.location.hash = "Again-No-back-button"; //esta linea es necesaria para chrome
    window.onhashchange = function () {
        window.location.hash = "no-back-button";
    }
</script>
<?php require "../include-views/template-views/html2.php" ?>