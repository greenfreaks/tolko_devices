<?php
require 'php/login_registro.php';
if (isset($_SESSION["idAdmin"])) {
    header("Location: sections/home.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />

    <meta name="keywords" content="WEB, SOFTWARE, ARTE, TECNOLOGÍA, DISEÑO, HTML, DIGITAL, INNOVACIÓN">

    <meta name="description" content="Empresa dedicada al desarrollo de software, desarrollo web, 
    creación de contenido multimedia y venta playeras con diseños intrépidos">


    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- ALERTIFY CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />


    <link rel="stylesheet" href="css/style.css">

    <title>Sistema de control de equipos de cómputo de CESVIN</title>
</head>

<body>
    <header class="header">
        <nav id="navHome" class="header__nav boxShadow">
            <div class=" header__nav--logo">
                <!-- <a href="" class="noDecoration greenTx boldTx"><img src="assets/logos/logo_cesvin_h-min.png" alt=""></a> -->
            </div>
        </nav>
    </header>

    <div class="space"></div>

    <div class="formsContainer">
        <section id="userLog" class="userLog boxShadow">
            <form id="userLog__form" class="userLog__form">
                <input type="hidden" id="action" value="login">
                <h2 class="cTx boldTx">Sistema de inventario de equipos</h2>
                <div class="userLog__formData">
                    <!-- <img src="assets/logos/logo_cesvin_v-min.png" alt=""> -->
                    <p class="blackTx">Usuario</p>
                    <input type="text" class="uppercase usuarioAdmin" required>

                    <p class="blackTx">Contraseña</p>
                    <input type="password" class="passwordAdmin" required>

                    <button type="button" class="btnRegLog smBtn bgDarkGray whiteTx alignCenter">Ingresar</button>
                </div>
            </form>
        </section>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous">
    </script>
    <!-- ALERTIFY JS -->
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

    <!-- SWEET ALERT JS -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="js/nav.js"></script>
    <script src="js/login_registro.js"></script>
</body>

</html>