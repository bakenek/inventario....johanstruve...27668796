<?php 
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
	echo"<meta http-equiv='refresh' content='01;URL='../php/menu.php'>";
    exit(); 
  }
  if($registro = mysqli_fetch_array($result)) 
    {
    $idUsuario = $registro['idusuario'];
    $alias     = $registro['alias'];
    $nombre    = $registro['nombre'];
	$clave     = $registro['clave'];
	

	
  }


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title></title>       
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../css/estilossistema.css">                    

    
  </head>
  <body>
    <div>
      <form action="updateusuario.php" method="post" target="_self"> 
        <fieldset>
          <legend>Ingreso de Datos Usuario</legend>
         
         
         
         <br/><hr/><br/>
         
          <table align="center">
            <caption>DATOS DEL SISTEMA</caption>
            <thead><tr><th>Datos Requeridos</th><th>Informacion a Suministrar</th></tr></thead>
            <tbody>
              <tr><td>Alias</td><td><input type="text"  name="alias" id="alias" value="<?php echo $alias ?>" size="30" maxlength="15" title="alias Usuario " placeholder="Ingrese el alias del usuario" required="required" autofocus="autofocus"></td></tr>
              <tr><td>Nombre</td><td><input type="text"  name="usuario" id="usuario"  value="<?php echo $nombre ?>" size="30" maxlength="30" title="Nombre Usuario " placeholder="Ingrese el nombre del usuario" required="required" ></td></tr>
              <tr><td>clave</td><td><input type="text"  name="clave" id="clave"  value="<?php echo $clave ?>" size="30" maxlength="30" title="Nombre Usuario " placeholder="Ingrese el nombre del usuario" required="required" ></td></tr>
            </tbody>
            <tfoot><tr><td><input type="hidden" name="hiddenidusr"  id="hiddenidusr" value="<?php echo $idUsuario ?>"><input type="submit" name="botonact" id="botonact" value="Actualizar"></td><td></td></tr></tfoot>
          </table>   
        </fieldset>
      </form>
    </div>
    <div id="resultados" style="color:#993333;"></div>
    <a href="../php/menu.php">Volver</a>
  </body>
 </html>