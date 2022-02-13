<<?php 
  include_once('../php/conexion.php'); 
  $link = Conectarse(); 
  session_start();
  if(!isset($_SESSION['gcIdUser'])) {  
  }
  
  $lcIdUser   = $_SESSION["gcIdUser"];
  $lcalias    = $_SESSION["gcAlias"];   
  $lcNombre   = $_SESSION["gcNombre"]; 

  $lcnombreprod = "";
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $lcnombreprod = $_REQUEST['nombreprod'];
  }else{
    header('Location: ../index.html'); 
  }
 
  $sql = "SELECT * FROM productos
  where trim(productos.nombre) = '".$lcnombreprod."'"; 
   
  $result = mysqli_query($link, $sql);
  if (mysqli_num_rows($result) <= 0) {
    $lcmsg = "No hay producto registrados con ese nombre (".$lcnombreprod."), verifique";
	echo "<script>alert('".$lcmsg."')</script>";
	echo"<meta http-equiv='refresh' content='01;URL=../php/menu.php'>";
    
    exit(); 
  }
  if($registro = mysqli_fetch_array($result))
  {
    $idproducto = $registro['idproducto'];
  
  $resultado   = '';
  $sql = "DELETE FROM productos WHERE idproducto = ".$idproducto." ";
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