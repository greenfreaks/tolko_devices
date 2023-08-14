<?php
require 'login_registro.php';
$_SESSION = [];
session_unset();
session_destroy();
header("Location: ../index.php");
?>
