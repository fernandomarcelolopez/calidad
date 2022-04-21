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

if(isset($_POST['sector'])){
	$sector = $_POST['sector'];
}
else {
	$sector = '1';
}
$sentencia = "SELECT * FROM sector WHERE Idsector = '".$sector."'";
$consulta = mysqli_query($iden,$sentencia);
$sectorbuscado = mysqli_fetch_assoc($consulta);
$sectormuestra = $sectorbuscado['nombresector'];


echo "<form action='iusuarios.php' method='post' target='principal'>";
	echo "<table>";
	echo "<tbody>";
		echo "<tr>";
			echo "<td class='detalle' colspan='9' align=center>Seleccione Sector";
				echo "<select name='sector'>";
				$sentencia = "SELECT * FROM sector WHERE estado = '1'";
				$consulta = mysqli_query($iden,$sentencia);
				while($sectorbuscado = mysqli_fetch_assoc($consulta)) 
				{ 
					echo "<option value='".$sectorbuscado['Idsector']."'>".$sectorbuscado['nombresector']."</option>";
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
			echo "<td class='titulo1' colspan='9' align=center><h2>Lista de Usuarios Registrados del sector ".$sectormuestra." </h2</td>";
		echo "</tr>";
		echo "<tr>";
			echo "<td class='titulo2'>N°</td>";
			echo "<td class='titulo2'>Usuario</td>";
			echo "<td class='titulo2'>Nombre y Apellido</td>";
			echo "<td class='titulo2'>Estado</td>";
			echo "<td class='titulo2'>Acción</td>";
		echo "</tr>";
		$numerador=1;
		$sentencia = "SELECT * FROM personas WHERE idsector = '".$sector."'";
		$consulta = mysqli_query($iden,$sentencia);
		while($buscado = mysqli_fetch_assoc($consulta)) 
		{ 
			$idpersona = $buscado['Idpersonas'];
			$usuario = $buscado['usuario'];
			$nombrepersonas = $buscado['nombrepersonas'];
			$estado = $buscado['estado'];

			echo "<tr>";
				echo "<td class='detalle'>". $numerador."</td>";
				echo "<td class='detalle'>".$usuario."</td>";
				echo "<td class='detalle'>". $nombrepersonas."</td>";
				If($estado==1){echo "<td class='detalle'><img src='../img/ok.png' width=30px></td>";}
				If($estado==0){echo "<td class='detalle'><img src='../img/nok.png' width=30px></td>";}
				echo "<td class='detalle'>";
					echo "<form action='cambiarestado.php' method='post' target='principal'>";
					echo "<input type='hidden' value='".$idpersona."' name='persona' id:'persona' />";
					echo "<input type='hidden' value='".$sector."' name='sector' id:'sector' />";
					echo "<input type='submit' value='Cambiar Estado' name='submit'/>";
					echo "</form>";	
				echo "</td>";
			echo "</tr>";
			$numerador = $numerador +1;
		}
		if(($numerador - 1) == 0) 
		{
			echo "<tr>";
				echo "<td  class='titulo1'colspan='9'>Sin usuarios asignados al esta área</Font></td>";
			echo "</tr>";
		}	
	echo "</tbody>";
echo "  </table>";
mysqli_close($iden); 
?>
</html> 
