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
$sectorusuario=$_SESSION['sector'];

$seleccion = $_POST['seleccion'];
$parte = $_POST['parte'];
$fecha=$_POST['fecha'];
$informante=$_POST['informante'];
$area=$_POST['area'];

$sentencia = "SELECT * FROM sector WHERE Idsector ='".$area."'";
$consulta = mysqli_query($iden,$sentencia);
$valores = mysqli_fetch_array($consulta);
$area1=$valores['nombresector']; 

$sentencia = "SELECT * FROM personas WHERE Idpersonas ='".$informante."'";
$consulta = mysqli_query($iden,$sentencia);
$valores = mysqli_fetch_array($consulta);
$persona=$valores['nombrepersonas']; 

echo "  <table>";
	echo "<tbody>";
		echo "<tr>";
			echo "<td class='titulo1' colspan='7' align=center><h2>Lista de Registros asociados a la busqueda</h2</td>";
		echo "</tr>";
		echo "<tr>";
			if($seleccion == 'fechaq'){
				echo "<td class='titulo2' colspan='7' align=center><B>Resultado de la busqueda de Sugerencia para la fecha: '".date("d/m/Y", strtotime($fecha))."'</B</td>";
			}	
			if($seleccion == 'area'){
				echo "<td class='titulo2' colspan='7' align=center><B>Resultado de la busqueda por el área: '".$area1."'</B</td>";
			}	
			if($seleccion == 'informante'){
				echo "<td class='titulo2' colspan='7' align=center><B>Resultado de la busqueda por Informante: '".$persona."'</B></td>";
			}	
			echo "</tr>";
			echo "<tr>";
				echo "<td class='titulo2'>Nombre</td>";
				echo "<td class='titulo2'>Fecha - Hora</td>";
				echo "<td class='titulo2'>Centro</td>";
				echo "<td class='titulo2'>Sector</td>";
				echo "<td class='titulo2'>Informante</td>";
				echo "<td class='titulo2'>Estado</td>";
				echo "<td class='titulo2'>       </td>";
			echo "</tr>";
			$bandera=0;
			if($seleccion == 'fecha'){
				$sentencia = "SELECT * FROM sugerencia WHERE fecha = '".$fecha."'";
				$consulta = mysqli_query($iden,$sentencia);
			}
			if($seleccion == 'area'){
				$sentencia = "SELECT * FROM sugerencia WHERE sector = '".$area."'";
				$consulta = mysqli_query($iden,$sentencia);
			}
			if($seleccion == 'informante'){
				$sentencia = "SELECT * FROM sugerencia WHERE idpersona  = '".$informante."'";
				$consulta = mysqli_query($iden,$sentencia);
			}
			while($buscado = mysqli_fetch_assoc($consulta)) 
			{ 
				$idsm = $buscado['Idsm'];
				$nombresm = $buscado['nombresm'];
				$fecha = $buscado['fecha'];
				$hora = $buscado['hora'];
				$centro = $buscado['centro'];
				$sector = $buscado['sector'];
				$idpersona = $buscado['idpersona'];
				$estado = $buscado['estado'];
	
				$sentencia1 = 'SELECT * FROM sector WHERE Idsector = "' . $sector. '"';
				$consulta1 = mysqli_query($iden,$sentencia1);
				$buscada = mysqli_fetch_array($consulta1);
				$sectord = $buscada['nombresector'];

				$sentencia1 = 'SELECT * FROM personas WHERE Idpersonas = "' . $idpersona. '"';
				$consulta1 = mysqli_query($iden,$sentencia1);
				$buscada = mysqli_fetch_array($consulta1);
				$persona = $buscada['nombrepersonas'];
				
				echo "<tr>";
					echo "<td class='detalle'>". $nombresm."</td>";
					echo "<td class='detalle'>".date("d/m/Y", strtotime($fecha))." - ".$hora."</td>";
					echo "<td class='detalle'>". $centro."</td>";
					echo "<td class='detalle'>". $sectord."</td>";
					echo "<td class='detalle'>". $persona."</td>";
					echo "<td class='detalle'>". $estado."</td>";
					echo "<td class='detalle'>";
						echo "<form action='verdetalle.php' method='post' target='principal'>";
						echo "<input type='hidden' value='".$idsm."' name='idsm' id:'idsm' />";
						echo "<input type='submit' value='Ver Detalle' name='submit'/>";
						echo "</form>";	
					echo "</td>";
				echo "</tr>";
			$bandera=$bandera +1;
			}
		if($bandera == 0) 
		{
			echo "<tr>";
				echo "<td  class='titulo1'colspan='7'>Sin Registros para mostrar</Font></td>";
			echo "</tr>";
		}	
	echo "</tbody>";
echo "  </table>";
?>
</html>