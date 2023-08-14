<?php require "../php/verify_activeSesson.php" ?>
<?php require "../include-views/template-views/html1.php" ?>
<div class="appBodyContent">

    <h1 class="cTx">Catálogo de componentes</h1>
    <div class="space"></div>

    <section class="catEquipos">
        <div>
            <h3 class="cTx">Tipo de componente</h3>
            <button class="btn bgBlack whiteTx" data-bs-toggle="modal" data-bs-target="#modalEquipos">Nuevo componente</button>
            <div class="space"></div>

            <div class="tableContainer">
                <table class="table table-striped table-hover">
                    <thead class="bgBlack">
                        <tr class="whiteTx">
                            <th>Identificador</th>
                            <th>Tipo de componente</th>
                            <th>Editar / Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php require "../include-views/dynamic-views/catalogoEquipos/equiposTable.php" ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="space"></div>

        <div>
            <h3 class="cTx">Estatus del componente</h3>
            <button class="btn bgBlack whiteTx" data-bs-toggle="modal" data-bs-target="#modalEstatus">Nuevo estado</button>
            <div class="space"></div>
            <div class="tableContainer">
                <table class="table table-striped table-hover">
                    <thead class="bgBlack">
                        <tr class="whiteTx">
                            <th>Identificador</th>
                            <th>Estatus</th>
                            <th>Editar / Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php require "../include-views/dynamic-views/catalogoEquipos/equiposEstados.php" ?>
                    </tbody>
                </table>
            </div>
        </div>

        <?php require "../include-views/dynamic-views/catalogoEquipos/modalesEquipos.php" ?>
    </section>
</div>
<?php require "../include-views/template-views/html2.php" ?>