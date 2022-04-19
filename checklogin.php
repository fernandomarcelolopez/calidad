<!DOCTYPE html> 
<html lang="es"> 
   <head> 
    <title>SGC911Salta</title>
    <link rel="shortcut icon" href="img/logo911.png"/>
    <link rel="stylesheet" href="css/estilos.css"/>
   </head> 
<body>

<?php
require('templates/conexioncom.php');

session_start();
IF (isset($_POST['usuario']))
{
	$usuario = $_POST['usuario'];
	$clave = $_POST['clave'];

	$consulta = "SELECT * FROM personas WHERE usuario = '". $usuario."'";
	$resultado = mysqli_query($iden,$consulta);
	$datos = mysqli_fetch_assoc($resultado);
	IF($datos['clave'] == md5($clave) && $datos['estado'] == 1)
	{
		$perfil = $datos['perfil'];
		$nombre = $datos['nombrepersonas'];
		$idper = $datos['Idpersonas'];
		$sector = $datos['idsector'];
		$_SESSION['logeado'] = true;	
		$_SESSION['idper'] = $idper;	
		$_SESSION['nombre'] = $nombre;	
		$_SESSION['usuario'] = $usuario;	
		$_SESSION['perfil'] = $perfil;	
		$_SESSION['sector'] = $sector;	
		$_SESSION['inicio'] = time();	
		$_SESSION['demora'] = 600;	
		$_SESSION['tiempo'] = $_SESSION['inicio'] + $_SESSION['demora'];	
		header("Location:portal.php");
	}
	IF($datos['clave'] == md5($clave) && $datos['estado'] == 2)
	{
		$perfil = $datos['perfil'];
		$nombre = $datos['nombrepersonas'];
		$idper = $datos['Idpersonas'];
		$_SESSION['logeado'] = true;	
		$_SESSION['idper'] = $idper;	
		$_SESSION['nombre'] = $nombre;	
		$_SESSION['usuario'] = $usuario;	
		$_SESSION['perfil'] = $perfil;	
		$_SESSION['inicio'] = time();	
		$_SESSION['tiempo'] = $_SESSION['inicio'] + (5*60);	
		header("Location:cambia.php");
	}
	IF($datos['clave'] == md5($clave) && $datos['estado'] == 0)
	{
		header("Location:login.php?estado=4");
	}
	IF($datos['clave'] !== md5($clave))
	{
		header("Location:login.php?estado=1");
	}

	mysqli_close($iden); 
}
ELSE
{
	header("Location:login.php");
}
?>
</body> 
</html>