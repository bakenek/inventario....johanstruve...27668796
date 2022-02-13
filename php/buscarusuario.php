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
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../css/estilossistema.css"> 
    <script src="..\jquery\jquery.js"></script>
	<script>
		$(document).ready(function(){
			$("input[type=text]").focus(function(){	   
			  this.select();
			});
    	});
    </script>     
  </head>
  <body>
  	<h2>Busqueda de Usuario por alias</h2>
    <div>
      <form action="actualizarusuario.php" method="post" target="_self"> 
        <fieldset>
          <legend>Ingreso de Datos Usuario</legend>
          <table align="center">
            <caption>DATOS DE CONTACTO</caption>
            <thead><tr><th>Datos Requeridos</th><th>Informacion a Suministrar</th></tr></thead>
            <tbody>
              <tr><td><i class="material-icons md-48">search</i>Cliente</td><td><input type="text" name="alias" id="alias" size="30" maxlength="15" title="Nombre Usuario " placeholder="Ingrese el nombre del usuario" required="required" autofocus="autofocus"></td></tr>
            </tbody>
            <tfoot><tr><td><input type="submit" value="Buscar" ></td><td>Ingrese nombre o alias del cliente</td></tfoot>
          </table>  
        </fieldset>
      </form>
    </div>
     <a href="../php/menu.php">Volver</a>
  </body>
 </html>