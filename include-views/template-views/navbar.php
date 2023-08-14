<?php
if($user['fk_nivelAdmin'] == 1){?>
<nav id="navHome" class="header__nav boxShadow">
    <div class=" header__nav--logo">
        <!-- <a href="home.php"><img src="../assets/logos/logo_cesvin_h-min.png" alt=""></a> -->
        <!-- <p class="whiteTx">Mario Sandoval Velázquez</p> -->
    </div>
    <ul class="header__nav--content noList">
        <li><a href="home.php" class="noDecoration whiteTx boldTx">Inventario</a></li>
        <li><a href="catalogoEquipos.php" class="noDecoration whiteTx boldTx">Catálogo de componentes</a></li>
        <li><a href="catalogoCesvin.php" class="noDecoration whiteTx boldTx">Ubicaciones y áreas</a></li>
        <li><a href="usuarios.php" class="noDecoration whiteTx boldTx">Usuarios</a></li>
        <li class="yellowTx boldTx"><i class="fas fa-user"></i> <?php echo $user['nombreAdmin']?></li>
        <li><a href="../php/logout.php" class="noDecoration whiteTx boldTx closeSesion"> <h5>Cerrar sesión <i class="fas fa-sign-out redTx"></i></h5></a></li>
    </ul>
    <div class="header__nav--burger">
        <div class="header__nav--burger-1"></div>
        <div class="header__nav--burger-2"></div>
        <div class="header__nav--burger-3"></div>
    </div>
</nav>
<?php
}else{?>
<nav id="navHome" class="header__nav boxShadow">
    <div class=" header__nav--logo">
        <!-- <img src="../assets/logos/logo_cesvin_h-min.png" alt=""> -->
    </div>
    <ul class="header__nav--content noList">
        <li><a href="home.php" class="noDecoration whiteTx boldTx">Inventario</a></li>
        <li class="yellowTx boldTx"><i class="fas fa-user"></i> <?php echo $user['nombreAdmin']?></li>
        <li><a href="../php/logout.php" class="noDecoration whiteTx boldTx closeSesion"> <h5>Cerrar sesión <i class="fas fa-sign-out redTx"></i></h5></a></li>
    </ul>
    <div class="header__nav--burger">
        <div class="header__nav--burger-1"></div>
        <div class="header__nav--burger-2"></div>
        <div class="header__nav--burger-3"></div>
    </div>
</nav>
<?php
}
?>
