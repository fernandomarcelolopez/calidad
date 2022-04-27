<!DOCTYPE html > 
<html lang="es"> 
   <head> 
		<title>SGC911Salta</title>
		<link rel="shortcut icon"href="../img/logo911.png"/>
		<link rel="stylesheet"href="../css/tablas.css"/>
   </head> 
<?php
require('../templates/conexioncom.php');
require('../templates/sesioncom.php');

$fecha = date("Y"). "-".date("m"). "-".date("d"); 
$user=$_SESSION['usuario'];

$idsector=$_POST['idsector'];

$sentencia = "SELECT * FROM sector WHERE Idsector = '".$idsector."'";
$consulta = mysqli_query($iden,$sentencia);
$buscado = mysqli_fetch_assoc($consulta); 
$estadoactual=$buscado['estado'];

If($estadoactual == 1){
$sentencia = "UPDATE sector SET estado='0' WHERE Idsector='".$idsector."'";
$consulta = mysqli_query($iden,$sentencia);
}
Else{
    $sentencia = "UPDATE sector SET estado='1' WHERE Idsector='".$idsector."'";
    $consulta = mysqli_query($iden,$sentencia);
}
echo "<form action='isector.php' method='post' target='principal'>";
	echo "<table>";
	echo "<tbody>";
		echo "<tr>";
			echo "<td class='detalle' colspan='9' align=center>Se cambio el estado del sector con exito";
            echo "<input type='submit' value='Volver' name='submit'/>";
				echo "</td>";
		echo "</tr>";
	echo "<tbody>";
	echo "<table>";
echo "</form>";

?>
</html>