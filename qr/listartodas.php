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
$año = date("Y");   

echo "<form action='listartodas.php' method='post' target='principal'>";
	echo "<table>";
	echo "<tbody>";
		echo "<tr>";
			echo "<td class='detalle' colspan='10' align=center>Seleccione Año";
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
			echo "<td class='titulo1' colspan='10' align=center><h2>Lista de Registros de mi área del año '".$actual."'</h2</td>";
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
		$sentencia = "SELECT * FROM quejas WHERE fechareg LIKE '%". $actual."%'";
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
				echo "<td  class='titulo1'colspan='9'>Sin registros correspondientes al año buscado</Font></td>";
			echo "</tr>";
		}	
	echo "</tbody>";
echo "  </table>";
mysqli_close($iden); 
?>
</html> 
