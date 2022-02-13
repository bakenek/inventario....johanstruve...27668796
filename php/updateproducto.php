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

 
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $lcIdpdc     = $_REQUEST['hiddenproduc'];
    $marca      = $_REQUEST['marca'];
    $nombre     = $_REQUEST['nombre'];
	$existencia = $_REQUEST['existencia'];
	$precio     = $_REQUEST['precio'];
	
	
  }else{
    header('Location: ../index.html'); 
  }


    $sql = "UPDATE productos SET 
    nombre       = '".$nombre."',
    marca     = '".$marca."',
    existencia     = '".$existencia."',
    precio      = '".$precio."'
    WHERE  idproducto = ".$lcIdpdc." ";

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
  	     <meta http-equiv='refresh' content='01;URL=../php/menu.php'>
  </body>
 </html>