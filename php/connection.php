<?php
session_start();

$host = "localhost";
$user = "root";
$pass = "";
$db = "tolko_device_control";

$con = mysqli_connect($host, $user, $pass, $db);

// if($con){
//     echo "Conexión exitosa";
// }else{
//     echo "Falló conexión";
// }


ini_set('display_errors','Off');
ini_set('error_reporting', E_ALL );
define('WP_DEBUG', false);
define('WP_DEBUG_DISPLAY', false);
?>