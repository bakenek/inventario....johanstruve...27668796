<?php 
  include_once('../php/conexion.php'); 
  $link = Conectarse(); 
  session_start();
  if(!isset($_SESSION['gcIdUser'])) {  
  }
  
  $lcmsg = '';
  $lcIdUser   = $_SESSION["gcIdUser"];
  $lcalias    = $_SESSION["gcAlias"];   
  $lcNombre   = $_SESSION["gcNombre"]; 
 
  $lcAliasUsr = $lcusuario = $lcestatus = $lcnivel = $lcpassword = $lcempresa = "";
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $lcAliasUsr  = $_REQUEST['alias'];
    $lcusuario   = $_REQUEST['usuario'];
    $lcpassword  = $_REQUEST['password']; 
  }else{
    header('Location: ../index.html'); 
  }
 
  $sql = "INSERT INTO usuarios (idusuario, alias, nombre, clave) 
  VALUES (NULL, '$lcAliasUsr','$lcusuario','$lcpassword')";
  if (mysqli_query($link, $sql)) {
      $last_idusr = mysqli_insert_id($link);
	  $lcmsg .= 'Registro insertado exitosamente \n';

  	
  } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($link);
	  $lcmsg .= 'El Registro no pudo ser insertado exitosamente \n';
  }
  
  echo "<script>alert('".$lcmsg."')</script>";
  mysqli_close($link);

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <title></title>        
    <meta charset="UTF-8">
  </head>
  <body>
  	<h2>Registro Usuario</h2>
  	
    <meta http-equiv='refresh' content='01;URL=../php/menu.php'>
  </body>
 </html>