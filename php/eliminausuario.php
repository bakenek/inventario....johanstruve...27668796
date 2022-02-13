<<?php 
  include_once('../php/conexion.php'); 
  $link = Conectarse(); 
  session_start();
  if(!isset($_SESSION['gcIdUser'])) {  
  }
  
  $lcIdUser   = $_SESSION["gcIdUser"];
  $lcalias    = $_SESSION["gcAlias"];   
  $lcNombre   = $_SESSION["gcNombre"]; 

  $lcAliasUsr = "";
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $lcAliasUsr = $_REQUEST['alias'];
  }else{
    header('Location: ../index.html'); 
  }
 
  $sql = "SELECT usuarios.idusuario, usuarios.alias, usuarios.nombre, usuarios.clave FROM usuarios 
  where trim(usuarios.alias) = '".$lcAliasUsr."' or usuarios.nombre = '".$lcAliasUsr."' ";  
   
  $result = mysqli_query($link, $sql);
  if (mysqli_num_rows($result) <= 0) {
    $lcmsg = "No hay usuarios registrados con ese alias (".$lcAliasUsr."), verifique";
	echo "<script>alert('".$lcmsg."')</script>";
	echo"<meta http-equiv='refresh' content='01;URL=../php/menu.php'>";
    
    exit(); 
  }
  if($registro = mysqli_fetch_array($result))
  {
    $idUsuario = $registro['idusuario'];
 
  $resultado   = '';
  $sql = "DELETE FROM usuarios WHERE idusuario = ".$idUsuario." ";
  if (mysqli_query($link, $sql)) {
     $resultado = 'Registro Usuario Eliminado Exitosamente \n';
  } else {
     $resultado = 'Proceso de Eliminacion Fallido'. mysqli_error($conn).'\n';
  }
}
 
echo "<script>alert('".$resultado."')</script>";
mysqli_close($link);
 
  echo"<meta http-equiv='refresh' content='01;URL=../php/menu.php'>";
?>