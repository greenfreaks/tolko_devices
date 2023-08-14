<?php
require 'login_registro.php';
if(isset($_SESSION["idAdmin"])){
  $idAdmin = $_SESSION["idAdmin"];
  $user = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM admins WHERE idAdmin = $idAdmin"));
}
else{
  header("Location: ../../index.php");
}
?>