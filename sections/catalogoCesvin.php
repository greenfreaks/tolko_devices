<?php require "../php/verify_activeSesson.php" ?>
<?php require "../include-views/template-views/html1.php" ?>
<div class="appBodyContent">
    <h2 class="cTx">Catálogos de CESVIN</h2>

    <div class="space"></div>

    <section class="catCesvin">

        <div class="space"></div>

        <div class="">
            <h3 class="cTx">Áreas</h3>
            <button class="btn bgBlack whiteTx" data-bs-toggle="modal" data-bs-target="#modalArea">Nueva área</button>
            <div class="space"></div>

            <div class="tableContainer">
                <table class="table table-striped table-hover">
                    <thead class="bgBlack">
                        <tr class="whiteTx">
                            <th>Identificador</th>
                            <th>Área</th>
                            <th>Jefe de área</th>
                            <th>Editar / Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php require "../include-views/dynamic-views/catalogoCesvin/areasTable.php" ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="space"></div>
        <?php require "../include-views/dynamic-views/catalogoCesvin/modalesCesvin.php" ?>
    </section>
</div>
<?php require "../include-views/template-views/html2.php" ?>