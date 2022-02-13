<?php
function Conectarse()
{
	$servername = "localhost";
	$username   = "id18464961_johanstruve";
	$password   = "gr2WmGc533[]auj6";
	$dbname     = "id18464961_johanst";
	$link = mysqli_connect($servername, $username, $password, $dbname);

	if (!$link) {
	    die("Conneccion fallida: " . mysqli_connect_error());
	}

	return $link;

}
?>

