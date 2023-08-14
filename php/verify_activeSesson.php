<?php
require 'login_registro.php';
$_SESSION['ultimoAcceso'] = date("Y-n-j H:i:s");
if(isset($_SESSION["idAdmin"])){
  $idAdmin = $_SESSION["idAdmin"];
  $user = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM admins WHERE idAdmin = $idAdmin"));
}
else if(!isset($_SESSION["idAdmin"])){
  header("Location: ../index.php");
}else{
  $fechaGuardada = $_SESSION['ultimoAcceso'];
  $ahora = date("Y-n-j H:i:s");
  $tiempo_transcurrido = (strtotime($ahora)-strtotime($fechaGuardada));
  if($tiempo_transcurrido >=600){
    session_destroy();
    header("Location: ../index.php");
    $_SESSION['ultimoAcceso'] = $ahora;
  }
}

?>