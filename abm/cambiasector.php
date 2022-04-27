<!DOCTYPE html> 
<html lang="es"> 
   <head> 
		<title>SGC911Salta</title>
		<link rel="shortcut icon"href="../img/logo911.png"/>
		<link rel="stylesheet"href="../css/tablas.css"/>
   </head> 
<body>
<?php
require('../templates/conexioncom.php');
require('../templates/sesioncom.php');

$user=$_SESSION['usuario'];
$sector=$_POST['sector'];

$sentencia = "SELECT * FROM sector WHERE Idsector = '".$sector."'";
$consulta = mysqli_query($iden,$sentencia);
$buscado = mysqli_fetch_assoc($consulta); 
$nombresector = $buscado['nombresector'];

echo "<form action='grabasector.php' method='post'>";
	echo "<table border='1' align='center'>";
		echo "<colgroup>";
			echo "<col width='20%'/>";
			echo "<col width='70%'/>";
		echo "</colgroup>";
		echo "<tbody>";
			echo "<tr>";
				echo "<td class='titulo1' colspan='2' align=center><h2>MODIFICA NOMBRE DEL SECTOR</h2></td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td class='titulo2'colspan='1' style='text-align:left'>Nombre del Sector a modificar</td>";
				echo "<td colspan=1 align=left>";
				echo "<input type='hidden' id='idsector' name='idsector' value='".$sector."'>";
				echo "<input type='text' id='sector' name='sector' required maxlength='30' size='90' value='".$nombresector."'>";
				echo "</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td colspan='2' align='center'>";
					echo "<input type='submit' value='Enviar Datos' name='submit'/>";
				echo "</td>";
			echo "</tr>";
		echo "</tbody>";
	echo "</table>";
echo "</form>";
mysqli_close($iden); 
?>
</body> 
</html>