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

$user=$_SESSION['usuario'];
$idper=$_SESSION['idper'];
$nombreper=$_SESSION['nombre'];

$fecha=$_POST['fecha'];
$hora=$_POST['hora'];
$centro=$_POST['centro'];
$sector=$_POST['sector'];
$descripcion=$_POST['descripcion'];
$sugerencia=$_POST['sugerencia'];

$sentencia = 'SELECT * FROM control';
$consulta = mysqli_query($iden,$sentencia);
$sncbuscado = mysqli_fetch_array($consulta);
$numerosm = $sncbuscado['smnumero'];
$anosm = $sncbuscado['anosm'];
  
$fechacontrol = date("y");  
if ($fechacontrol !== $anosm)
{
	$sentencia = "UPDATE control SET smnumero= '2', anosm ='".$fechacontrol."'  WHERE id=1";
	$consulta = mysqli_query($iden,$sentencia);
	$numerosm = 1;
	$anosm = $fechacontrol;
}

$nombresm= $numerosm . "/". $anosm;

$sentencia = "INSERT INTO sugerencia (nombresm, centro, sector, idpersona, fecha, hora, descripcion, sugerencia, estado) VALUES ('".$nombresm."', '".$centro."', '".$sector."', '".$idper."', '".$fecha."', '".$hora."', '".$descripcion."', '".$sugerencia."', 'Sin Tratar')";
$consulta = mysqli_query($iden,$sentencia);

$nuevonumero = $numerosm +1;
$sentencia = "UPDATE control SET smnumero='".$nuevonumero ."' WHERE id=1";
$consulta = mysqli_query($iden,$sentencia);


echo "<form action='vermissuger.php' method='post'>";
	echo "<table border='1' align='center'>";
		echo "<colgroup>";
			echo "<col width='20%'/>";
			echo "<col width='70%'/>";
		echo "</colgroup>";
		echo "<tbody>";
			echo "<tr>";
				echo "<td class='titulo1' colspan='2' align=center><h2>CARGA DE SUGERENCIAS</h2></td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td class='titulo2' colspan='2' align=center><B>El registro se cargo con exito<B></td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td class='titulo2' colspan='1' style='text-align:left'>A su sugerencia se le asigno el número:</td>";
				echo "<td colspan='1' align=left>".$nombresm."</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td class='titulo2' colspan='1' style='text-align:left'>Centro</td>";
				echo "<td colspan='1' align=left>".$centro."</td>";
			echo "</tr>";
			echo "<tr>";
				$sentencia = "SELECT * FROM sector WHERE Idsector='".$sector."'";
				$consulta = mysqli_query($iden,$sentencia);
				$valores = mysqli_fetch_array($consulta);
				$destinof=$valores['nombresector']; 
				echo "<td class='titulo2' colspan='1' style='text-align:left'>Destinado a</td>";
				echo "<td colspan='1' align=left>".$destinof."</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td class='titulo2' colspan='1' style='text-align:left'>Descripción de la sutuiación observada</td>";
				echo "<td colspan='1' align=left>".$descripcion."</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td class='titulo2' colspan='1' style='text-align:left'>Sugerencia</td>";
				echo "<td colspan='1' align=left>".$sugerencia."</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td class='titulo2'colspan='1' style='text-align:left'>Datos de la Carga</td>";
				echo "<td colspan=1 align=left>Cargado por ".$nombreper." el día ".date("d/m/Y", strtotime($fecha))." a horas ".$hora."</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td colspan='2' align='center'>";
					echo "<input type='submit' value='Salir' name='submit'/>";
				echo "</td>";
			echo "</tr>";
		echo "</tbody>";
	echo "</table>";
echo "</form>";
mysqli_free_result($consulta);
mysqli_close($iden); 
?>
</body> 
</html>