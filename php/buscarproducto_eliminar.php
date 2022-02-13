<?php 
  include_once('../php/conexion.php');
  $link = Conectarse(); 
  session_start();
  if(!isset($_SESSION['gcIdUser'])) {
    header('Location: ../index.html');   
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
  	<h2>Busqueda de Producto</h2>
  	
    <div>
     <form action="eliminarproducto.php" method="post" target="_self"> 
        <fieldset>
          <legend>Busqueda de productos</legend>
          <table align="center">
            <caption>Nombre del producto</caption>
            <thead><tr><th>Datos Requeridos</th><th>Informacion a Suministrar</th></tr></thead>
            <tbody>
              <tr>
                  <td><i class="material-icons md-48">search</i>Producto</td><td><input type="text" name="nombreprod" id="nombreprod" size="30" maxlength="30" title="Nombre Producto" placeholder="Ingrese el Nombre del producto" autofocus="autofocus"></td>
              </tr>
              
             </tbody> 
            <tfoot><tr><td><input type="submit" value="Eliminar"></td><td>Ingrese el nombre del producto</td></tfoot>
          </table>  
        </fieldset>
      	
      
    </form>
    </div>
    <a href="../php/menu.php">Volver</a>
  </body>
 </html>