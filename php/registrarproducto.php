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
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../css/estilossistema.css">   
  
	<script src="../jquery/jquery.js"></script>
    <script>
		$(document).ready(inicializarEventos);
		function inicializarEventos(){
			$("input[type=text]").focus(function(){	   
			  this.select();
			});
		}
    </script>

  </head>
  <body>
  	<h2>Registro de Productos</h2>
  
    
    <div>
      <form action="registroproducto.php" method="post" enctype="multipart/form-data" target="_self"> 
        <fieldset>
          <legend>Ingreso de Productos</legend>
          <table align="center">
            <caption>CAMPOS DE PRODUCTOS</caption>
            <thead><tr><th>Datos Requeridos</th><th>Informacion a Suministrar</th></tr></thead>
            <tbody>
				
				<tr><td>Nombre</td><td><input type="text"  name="nombre" id="nombre" size="30" maxlength="30" title="Nombre Producto" placeholder="Ingrese el Nombre del producto" required="required" autofocus="autofocus"></td></tr>
                <tr><td>Marca</td><td><input type="text"  name="marca" id="marca" size="20" maxlength="20" title="Marca" placeholder="Ingrese la marca del producto" required="required" value="" ></td></tr>
                <tr><td>Existencia</td><td><input type="text"  name="existencia" id="existencia" size="20" maxlength="20" title="existencia" placeholder="Ingrese la existencia"  value="0" ></td></tr>                
                <tr><td>Precio</td><td><input type="text"  name="precio" id="precio" size="20" maxlength="20" title="precio" placeholder="Ingrese el precio" ></td></tr>                
            </tbody>
            <tfoot><tr><td><input type="submit" value="Guardar" ></td><td>Favor completar todos los campos</td></tfoot>
          </table>  
        </fieldset>
      </form>
    </div>
   
    <a href="../php/menu.php">Volver</a>
   
  </body>
 </html>