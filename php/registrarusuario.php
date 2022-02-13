<?php 
  include_once('../php/conexion.php');
  $link = Conectarse(); 
  session_start();
  if(!isset($_SESSION['gcIdUser'])) {  
  }
  
  $lcIdUser   = $_SESSION["gcIdUser"];   
  $lcalias    = $_SESSION["gcAlias"];
  $lcNombre   = $_SESSION["gcNombre"]; 

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title></title>      
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../css/estilossistema.css">    
  
		<script src="..\jquery\jquery.js"></script>
		<script>
		$(document).ready(function(){
				$("input").focus(function(){
						$(this).css("background-color", "#ffff99");
				});
				$("input").blur(function(){
						$(this).css("background-color", "#ffffff");
				});
		});
		</script>

  </head>
  <body>
  	<h2>Registro Usuario</h2>
  	
    <div>
      <form action="registrousuario.php" method="post" target="_self"> 
        <fieldset>
          <legend>Ingreso de Datos Usuario</legend>
          <table>
            <caption>DATOS DE CONTACTO</caption>
            <thead><tr><th>Datos Requeridos</th><th>Informacion a Suministrar</th></tr></thead>
            <tbody>
              <tr><td>Alias</td><td><input type="text"  name="alias" id="alias" size="15" maxlength="15" title="alias Usuario " placeholder="Ingrese el alias del usuario" required="required" autofocus="autofocus"></td></tr>
              <tr><td>Nombre</td><td><input type="text" name="usuario" id="usuario" size="30" maxlength="30" title="Nombre Usuario " placeholder="Ingrese el nombre del usuario" required="required" ></td></tr>
              <tr><td>Contraseña</td><td><input type="text" name="password" id="password" size="10" maxlength="10" title="password" placeholder="Ingrese la palabra clave del usuario" required="required" value="clave1234"></td></tr>
              </select></td></tr>
            </tbody>
            <tfoot><tr><td><input type="submit" class="w3-input w3-border w3-round-large w3-hover-green"></td><td>Todos los Campos son Requeridos</td></tfoot>
          </table>  
        </fieldset>
      </form>
    </div>
    
    <a href="../php/menu.php">Volver</a>
    
  </body>
 </html>