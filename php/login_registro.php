<?php
require "connection.php";

// IF
if(isset($_POST["action"])){
  if($_POST["action"] == "login"){
    login();
  }
}

// LOGIN
function login(){
  global $con;

  $usuarioAdmin = strtoupper(trim($_POST["usuarioAdmin"]));
  $passwordAdmin = trim($_POST["passwordAdmin"]);

  $user = mysqli_query($con, "SELECT * FROM admins WHERE usuarioAdmin = '$usuarioAdmin'");

  if(mysqli_num_rows($user) > 0){

    $row = mysqli_fetch_assoc($user);

    if($passwordAdmin == $row['passwordAdmin']){
      echo "Login Successful";
      $_SESSION["login"] = true;
      $_SESSION["idAdmin"] = $row["idAdmin"];
    }
    else{
      echo "Wrong Password";
      exit;
    }
  }
  else{
    echo "User Not Registered";
    exit;
  }
}
?>
