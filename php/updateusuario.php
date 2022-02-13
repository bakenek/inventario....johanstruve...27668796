<?php 
  include_once('../php/conexion.php'); 
  $link = Conectarse(); 
  session_start();
  if(!isset($_SESSION['gcIdUser'])) {  
  }
  
  $lcIdUser   = $_SESSION["gcIdUser"]; 
  $lcalias    = $_SESSION["gcAlias"];  
  $lcNombre   = $_SESSION["gcNombre"]; 

   $lcAliasUsr = $lcusuario = $lcestatus = $lcnivel = $lcpassword = $lcempresa = "";
   $lcEmpresa = $lcRif = $lcTelf = $lcCelular = $lcEmail = $lcDireccion = "";

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $lcIdusr     = $_REQUEST['hiddenidusr'];
    $lcaliasusr  = $_REQUEST['alias'];
    $lcusuario   = $_REQUEST['usuario'];	
    $lcclave     = $_REQUEST['clave'];	
	
  }else{
    header('Location: ../index.html'); 
  }


	  $sql = "UPDATE usuarios SET 
	  alias       = '".$lcaliasusr."',
	  nombre     = '".$lcusuario."',
	  clave      = '".$lcclave."'
	  WHERE  idusuario = ".$lcIdusr." ";
	
	  if (mysqli_query($link, $sql)) {
		  $lcmsg = "Registro actualizado exitosamente";
	  } else {
		  $lcmsg = "Error: " . $sql . "<br>" . mysqli_error($link);
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
  	<h2>Actualizacion de Usuario</h2>
      <meta http-equiv='refresh' content='01;URL=../php/menu.php'>
  </body>
 </html>