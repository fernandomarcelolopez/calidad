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
if(isset($_POST['ano'])){
	$actual = $_POST['ano'];
}
else {
	$actual=date("Y");
}
$actualm = $actual;
$actual="/".substr($actual,2,2);
$año = date("Y");   

echo "<form action='listaractivas.php' method='post' target='principal'>";
	echo "<table>";
	echo "<tbody>";
		echo "<tr>";
			echo "<td class='detalle' colspan='9' align=center>Seleccione Año";
				echo "<select name='ano'>";
				for($i = 2019; $i <= $año; $i++){
					echo "<option value='".$i."'>".$i."</option>";
				}
				echo "</select>";
				echo "<input type='submit' value='Mostrar' name='submit'/>";
				echo "</td>";
		echo "</tr>";
	echo "<tbody>";
	echo "<table>";
echo "</form>";

echo "  <table>";
	echo "<tbody>";
		echo "<tr>";
			echo "<td class='titulo1' colspan='9' align=center><h2>Lista Completa de Tickets Activos correspondientes al año ".$actualm." </h2</td>";
		echo "</tr>";
		echo "<tr>";
			echo "<td class='titulo2'>NC N&ordm</td>";
			echo "<td class='titulo2'>Fecha Obs.</td>";
			echo "<td class='titulo2'>Detectado por</td>";
			echo "<td class='titulo2'>Para el Sector</td>";
			echo "<td class='titulo2'>Accion Inm.</td>";
			echo "<td class='titulo2'>Estado</td>";
			echo "<td class='titulo2'>       </td>";
		echo "</tr>";
		$sentencia = "SELECT * FROM ticket WHERE estado <> 'Cerrado' AND nombretk LIKE '%".$actual."'";
		$consulta = mysqli_query($iden,$sentencia);
		while($tkbuscado = mysqli_fetch_assoc($consulta)) 
		{ 
			$nombretk = $tkbuscado['nombretk'];
			$origen = $tkbuscado['origen'];
			$idpersona = $tkbuscado['idpersona'];
			$sectorpersona = $tkbuscado['sectorpersona'];
			$descripcion = $tkbuscado['descripcion'];
			$sectorarea = $tkbuscado['sectorarea'];
			$fecha = $tkbuscado['fecha'];
			$centro = $tkbuscado['centro'];
			$involucrados = $tkbuscado['involucrados'];
			$afecta = $tkbuscado['afecta'];
			$usuafecta = $tkbuscado['usuafecta'];
			$accion = $tkbuscado['accion'];
			$detalleaccion = $tkbuscado['detalleaccion'];
			$estado = $tkbuscado['estado'];

			$sentencia1 = 'SELECT * FROM personas WHERE Idpersonas = "' . $idpersona. '"';
			$consulta1 = mysqli_query($iden,$sentencia1);
			$personabuscada = mysqli_fetch_array($consulta1);
			$observador = $personabuscada['nombrepersonas'];

			echo "<tr>";
				echo "<td class='detalle'>". $nombretk."</td>";
				echo "<td class='detalle'>".date("d/m/Y", strtotime($fecha))."</td>";
				echo "<td class='detalle'>". $observador." de ".$sectorpersona."</td>";
				echo "<td class='detalle'>". $sectorarea."</td>";
				echo "<td class='detalle'>". $accion."</td>";
				echo "<td class='detalle'>". $estado."</td>";
				echo "<td class='detalle'>";
					echo "<form action='verdetalle.php' method='post' target='principal'>";
					echo "<input type='hidden' value='".$nombretk."' name='numero' id:'numero' />";
					echo "<input type='hidden' value='0' name='generado' id:'numero' />";
					echo "<input type='submit' value='Ver Detalle' name='submit'/>";
					echo "</form>";	
				echo "</td>";
			echo "</tr>";
			$bandera = $bandera +1;
		}
		if($bandera == 0) 
		{
			echo "<tr>";
				echo "<td  class='titulo1'colspan='9'>Sin Tickets Activos del Área</Font></td>";
			echo "</tr>";
		}	
	echo "</tbody>";
echo "  </table>";
mysqli_close($iden); 
?>
</html> 
