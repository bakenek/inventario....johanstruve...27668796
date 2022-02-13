<?php 
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
    $lcmsg = "No hay productos registrados con ese nombre (".$lcnombreprod."), verifique";
	echo "<script>alert('".$lcmsg."')</script>";
	echo"<meta http-equiv='refresh' content='01;URL=../php/menu.php'>";
    exit(); 
  }
  if($registro = mysqli_fetch_array($result)) 
    {
    $idproducto = $registro['idproducto'];
    $marca      = $registro['marca'];
    $nombre     = $registro['nombre'];
	$existencia = $registro['existencia'];
	$precio     = $registro['precio'];

	
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
      <form action="updateproducto.php" method="post" target="_self"> 
        <fieldset>
          <legend>Ingreso de Datos Usuario</legend>
         
         
         
         <br/><hr/><br/>
         
          <table align="center">
            <caption>DATOS DEL SISTEMA</caption>
            <thead><tr><th>Datos Requeridos</th><th>Informacion a Suministrar</th></tr></thead>
            <tbody>
              
              <tr><td>Nombre</td><td><input type="text"  name="nombre" id="nombre" value="<?php echo $nombre  ?>" size="30" maxlength="30" title="Nombre Producto" placeholder="Ingrese el Nombre del producto" required="required" autofocus="autofocus"></td></tr>
                <tr><td>Marca</td><td><input type="text"  name="marca" id="marca" value="<?php echo $marca ?>" size="20" maxlength="20" title="Marca" placeholder="Ingrese la marca del producto" required="required"  ></td></tr>
                <tr><td>Existencia</td><td><input type="text"  name="existencia" id="existencia" value="<?php echo $existencia ?>" size="20" maxlength="20" title="existencia" placeholder="Ingrese la existencia"   ></td></tr>                
                <tr><td>Precio</td><td><input type="text"  name="precio" id="precio" value="<?php echo $precio  ?>" size="20" maxlength="20" title="precio" placeholder="Ingrese el precio" ></td></tr>
            
            
            
            </tbody>
            <tfoot><tr><td><input type="hidden" name="hiddenproduc"  id="hiddenproduc" value="<?php echo $idproducto?>"><input type="submit" name="botonact" id="botonact" value="Actualizar"></td><td></td></tr></tfoot>
          </table>   
        </fieldset>
      </form>
    </div>
    <div id="resultados" style="color:#993333;"></div>
    <a href="../php/menu.php">Volver</a>
  </body>
 </html>