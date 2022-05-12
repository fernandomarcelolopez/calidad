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
			echo "<td class='titulo1' colspan='10' align=center><h2>Lista de Felicitaciones de mi área sin tratar</h2</td>";
		echo "</tr>";
		echo "<tr>";
			echo "<td class='titulo2'>Origen</td>";
			echo "<td class='titulo2'>Fecha - Hora</td>";
			echo "<td class='titulo2'>Tipo</td>";
			echo "<td class='titulo2'>Suceso Origen</td>";
			echo "<td class='titulo2'>Destinada a</td>";
			echo "<td class='titulo2'>Concepto</td>";
			echo "<td class='titulo2'>Alertante</td>";
			echo "<td class='titulo2'>Domicilio</td>";
			echo "<td class='titulo2'>Estado</td>";
			echo "<td class='titulo2'>       </td>";
		echo "</tr>";
		$sentencia = "SELECT * FROM quejas WHERE destino = '". $area."' AND estado = 'Sin Tratar' AND tipo = 'Felicitación'";
		$consulta = mysqli_query($iden,$sentencia);
		while($buscado = mysqli_fetch_assoc($consulta)) 
		{ 
			$idqrf = $buscado['Idqrf'];
			$nombreqrf = $buscado['nombreqrf'];
			$fechareg = $buscado['fechareg'];
			$horareg = $buscado['horareg'];
			$tipo = $buscado['tipo'];
			$destino = $buscado['destino'];
			$concepto = $buscado['concepto'];
			$nombrea = $buscado['nombrea'];
			$domicilio = $buscado['domicilio'];
			$estado = $buscado['estado'];
			$suceso = $buscado['suceso'];
			$canal = $buscado['canal'];

			$sentencia1 = 'SELECT * FROM sector WHERE Idsector = "' . $destino. '"';
			$consulta1 = mysqli_query($iden,$sentencia1);
			$buscada = mysqli_fetch_array($consulta1);
			$sectord = $buscada['nombresector'];

			echo "<tr>";
				echo "<td class='detalle'>". $canal."</td>";
				echo "<td class='detalle'>".date("d/m/Y", strtotime($fechareg))." - ".$horareg."</td>";
				echo "<td class='detalle'>". $tipo."</td>";
				echo "<td class='detalle'>". $suceso."</td>";
				echo "<td class='detalle'>". $sectord."</td>";
				echo "<td class='detalle'>". $concepto."</td>";
				echo "<td class='detalle'>". $nombrea."</td>";
				echo "<td class='detalle'>". $domicilio."</td>";
				echo "<td class='detalle'>". $estado."</td>";
				echo "<td class='detalle'>";
					echo "<form action='verdetalle.php' method='post' target='principal'>";
					echo "<input type='hidden' value='".$idqrf."' name='idqrf' id:'idqrf' />";
					echo "<input type='submit' value='Ver Detalle' name='submit'/>";
					echo "</form>";	
				echo "</td>";
			echo "</tr>";
			$bandera = $bandera +1;
		}
		if($bandera == 0) 
		{
			echo "<tr>";
				echo "<td  class='titulo1'colspan='9'>Sin Felicitaciones dirigidas al área sin tratar</Font></td>";
			echo "</tr>";
		}	
	echo "</tbody>";
echo "  </table>";
mysqli_close($iden); 
?>
</html> 
