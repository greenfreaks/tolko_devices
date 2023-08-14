<?php require "../php/verify_activeSesson.php" ?>
<?php require "../include-views/template-views/html1.php" ?>
<div class="appBodyContent">
    <h1>Usuarios</h1>
    <div class="space"></div>

    <section class="add">
        <button class="smBtn bgBlack whiteTx boldTx rounded" data-bs-toggle="modal" data-bs-target="#modalUsuarios">
            Nuevo
        </button>
        <?php require "../include-views/dynamic-views/usuarios/modalUsuarios.php" ?>
    </section>

    <div class="space"></div>

    <section class="tableContainer devices">
        <table class="table table_devices table-striped table-hover">
            <thead class="bgBlack">
                <tr class="whiteTx">
                    <th>Nombre</th>
                    <th>Usuario</th>
                    <th>Tipo</th>
                    <th>Contraseña</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody class="searchIn">
                <?php require "../include-views/dynamic-views/usuarios/tableUsuarios.php" ?>
            </tbody>
        </table>
    </section>
</div>
<?php require "../include-views/template-views/html2.php" ?>