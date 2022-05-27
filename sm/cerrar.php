<!DOCTYPE html > 
<html lang="es"> 
   <head> 
		<title>SGC911Salta</title>
		<link rel="shortcut icon" href="../img/logo911.png"/>
		<link rel="stylesheet" href="../css/tablas.css"/>
   </head> 
<?php
require('../templates/conexioncom.php');
require('../templates/sesioncom.php');
$bandera = 0;
$user=$_SESSION['usuario'];

$sentencia1 = 'SELECT * FROM personas WHERE usuario = "' . $user. '"';
$consulta1 = mysqli_query($iden,$sentencia1);
$personabuscada = mysqli_fetch_array($consulta1);
$usuario = $personabuscada['Idpersonas'];
$area = $personabuscada['idsector'];

$sentencia2 = 'SELECT * FROM sector WHERE Idsector = "' . $area. '"';
$consulta2 = mysqli_query($iden,$sentencia2);
$areabuscada = mysqli_fetch_array($consulta2);
$area1 = $areabuscada['nombresector'];

echo "  <table>";
	echo "<tbody>";
		echo "<tr>";
			echo "<td class='titulo1' colspan='7' align=center><h2>Lista de Sugerencias para Cierre</h2</td>";
		echo "</tr>";
		echo "<tr>";
			echo "<td class='titulo2'>Numero</td>";
			echo "<td class='titulo2'>Fecha - Hora</td>";
			echo "<td class='titulo2'>Centro</td>";
			echo "<td class='titulo2'>sector</td>";
			echo "<td class='titulo2'>Realizada por</td>";
			echo "<td class='titulo2'>Estado</td>";
			echo "<td class='titulo2'>       </td>";
		echo "</tr>";
		$sentencia = "SELECT * FROM sugerencia WHERE estado = 'Para Cierre'";
		$consulta = mysqli_query($iden,$sentencia);
		while($buscado = mysqli_fetch_assoc($consulta)) 
		{ 
			$idsm = $buscado['Idsm'];
			$nombresm = $buscado['nombresm'];
			$fecha = $buscado['fecha'];
			$hora = $buscado['hora'];
			$centro = $buscado['centro'];
			$sector = $buscado['sector'];
			$idpersona = $buscado['idpersona'];
			$descripcion = $buscado['descripcion'];
			$sugerencia = $buscado['sugerencia'];
			$estado = $buscado['estado'];

			$sentencia1 = 'SELECT * FROM sector WHERE Idsector = "' . $sector. '"';
			$consulta1 = mysqli_query($iden,$sentencia1);
			$buscada = mysqli_fetch_array($consulta1);
			$sectord = $buscada['nombresector'];

			$sentencia1 = 'SELECT * FROM personas WHERE Idpersonas = "' . $idpersona. '"';
			$consulta1 = mysqli_query($iden,$sentencia1);
			$buscada = mysqli_fetch_array($consulta1);
			$nombrepersona = $buscada['nombrepersonas'];

			echo "<tr>";
				echo "<td class='detalle'>". $nombresm."</td>";
				echo "<td class='detalle'>".date("d/m/Y", strtotime($fecha))." - ".$hora."</td>";
				echo "<td class='detalle'>". $centro."</td>";
				echo "<td class='detalle'>". $sectord."</td>";
				echo "<td class='detalle'>". $nombrepersona."</td>";
				echo "<td class='detalle'>". $estado."</td>";
				echo "<td class='detalle'>";
					echo "<form action='regcierre.php' method='post' target='principal'>";
					echo "<input type='hidden' value='".$idsm."' name='idsm' id:'idam' />";
					echo "<input type='submit' value='Reg. Cierre' name='submit'/>";
					echo "</form>";	
				echo "</td>";
			echo "</tr>";
			$bandera = $bandera +1;
		}
		if($bandera == 0) 
		{
			echo "<tr>";
				echo "<td  class='titulo1'colspan='7'>Sin Sugerencias para Cierre</Font></td>";
			echo "</tr>";
		}	
	echo "</tbody>";
echo "  </table>";
mysqli_close($iden); 
?>
</html> 
