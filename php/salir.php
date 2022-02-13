<?php 
	include_once('../php/conexion.php'); 
	$link = Conectarse(); 

	mysqli_close($link);

	session_start();
	session_unset(); 
	session_destroy();
	
	header('Location: ../index.html');
?>
