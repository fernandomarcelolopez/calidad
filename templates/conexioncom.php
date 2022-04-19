<?php
$iden = mysqli_connect('172.20.1.223', 'calidad', 'calidad');
IF(!$iden)
{ 
	die("Error: No se pudo conectar"); 
}	
IF(!mysqli_select_db($iden,'snc')) 
{
	die("Error: No existe la base de datos");
}
?>