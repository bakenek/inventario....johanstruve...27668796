<?php 
	include_once('../php/conexion.php'); 
	$link = Conectarse(); 
	$lcUser = $lcClave = "";
	$lcmsg  = "";
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$lcUser  = $_REQUEST['uname'];
		$lcClave = $_REQUEST['psw']; 
	}else{
		header('Location: ../index.html'); 
	}

	$sql = "SELECT * FROM usuarios WHERE alias = '$lcUser'"; 
	$result = mysqli_query($link, $sql);

	if (mysqli_num_rows($result) > 0) {
		while ($reg = mysqli_fetch_assoc($result)){
	     	$lcIdUser   = $reg['idusuario'];
			$lcalias    = trim($reg['alias']);
			$lcpassword = trim($reg['clave']);
			$lcNombre   = trim($reg['nombre']);
		}
	} else {
			$lcmsg .= 'Usuario no existe \\n';
			echo "<script>alert('".$lcmsg."')</script>";
			echo"<meta http-equiv='refresh' content='01;URL=../index.html'> ";
		exit(); 	
	}
	
	
	if ($lcClave != $lcpassword) {
			$lcmsg .= 'Clave invalida \\n';
			echo "<script>alert('".$lcmsg."')</script>";
			echo"<meta http-equiv='refresh' content='01;URL=../index.html'> ";
		exit(); 	
	}

	
	session_start();
	$_SESSION["gcIdUser"]   = $lcIdUser;
	$_SESSION["gcAlias"]   = $lcalias;
	$_SESSION["gcNombre"]   = $lcNombre;
	
	header('Location: ../php/menu.php');
	
	mysqli_free_result($result);
	mysqli_close($link);
	

?>
