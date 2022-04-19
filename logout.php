<!DOCTYPE html > 
<html lang="es"> 
	<head> 
		<title>SGC911Salta</title>
		<link rel="shortcut icon" href="img/logo911.png"/>
		<link rel="stylesheet" href="css/cabeza.css"/>
	</head> 
<?php
	require('templates/conexioncom.php');
	require('templates/sesioncom.php');
    unset ($SESSION['logeado']);
    session_destroy();
    header('Location: login.php');
?>
</body> 
</html>