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

echo "<form action='datosreg.php' method='post' target='principal'>";
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
		echo "<td class='titulo1' colspan='7' align=center><h2>Lista de Sugerencias sin tratar</h2</td>";
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

		$sentencia = "SELECT * FROM sugerencia WHERE fecha LIKE '%". $actual."%'";
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
					echo "<form action='verdetallereg.php' method='post' target='principal'>";
					echo "<input type='hidden' value='".$idsm."' name='idsm' id:'idsm' />";
					echo "<input type='submit' value='Ver Det Regist.' name='submit'/>";
					echo "</form>";	
				echo "</td>";
			echo "</tr>";
			$bandera = $bandera +1;
		}
		if($bandera == 0) 
		{
			echo "<tr>";
				echo "<td  class='titulo1'colspan='7'>Sin Sugerencias sin tratar</Font></td>";
			echo "</tr>";
		}	
	echo "</tbody>";
echo "  </table>";
mysqli_close($iden); 
?>
</html> 
