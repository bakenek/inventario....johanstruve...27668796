<?php 
  include_once('../php/conexion.php'); 
  $link = Conectarse(); 
  session_start();
  if(!isset($_SESSION['gcIdUser'])) {
    header('Location: ../index.html');   
  }
  
  $lcmsg = '';
  $lcIdUser   = $_SESSION["gcIdUser"];
  $lcalias    = $_SESSION["gcAlias"];   
  $lcNombre   = $_SESSION["gcNombre"]; 
 
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$lcNombre = test_input($_REQUEST['nombre']);
	$lcMarca  = test_input($_REQUEST['marca']);
	$liExist  = ($_REQUEST['existencia']);
	$lnPrecio = ($_REQUEST['precio']);
	
  }else{
    header('Location: ../index.html'); 
  }
  function test_input($data) {
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
	$data = filter_var($data, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH); 
	$data = trim($data);
    return $data;
  }

	$sql = "INSERT INTO productos (idproducto, nombre, marca, existencia, precio) 
	VALUES (NULL,  '$lcNombre','$lcMarca', '$liExist', '$lnPrecio')";
	if (mysqli_query($link, $sql)) {
	  $last_id = mysqli_insert_id($link);
		$lcmsg .= 'Registro insertado exitosamente, ID: '. $last_id.' \\n';
	} else {
	  echo "Error: " . $sql . "<br>" . mysqli_error($link);
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
  	<h2>Registro Producto</h2>
  	
    <meta http-equiv='refresh' content='01;URL=../php/menu.php'>
  </body>
 </html>