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
$nombre=$_SESSION['nombre'];

$idsm=$_POST['idsm'];
$fechareg=$_POST['fecha'];
$horareg=$_POST['hora'];
$consultados=$_POST['consultados'];
$conformes=$_POST['conformes'];


$sentencia = 'SELECT * FROM sugerencia WHERE Idsm = "' . $idsm. '"';
$consulta = mysqli_query($iden,$sentencia);
$buscada = mysqli_fetch_array($consulta);

$nombresm=$buscada['nombresm'];
$centro=$buscada['centro'];
$sector=$buscada['sector'];
$idpersona=$buscada['idpersona'];
$fecha=$buscada['fecha'];
$hora=$buscada['hora'];
$descripcion=$buscada['descripcion'];
$sugerencia=$buscada['sugerencia'];
$estado=$buscada['estado'];

$sentencia = 'SELECT * FROM personas WHERE Idpersonas = ' . $idpersona;
$consulta = mysqli_query($iden,$sentencia);
$buscada = mysqli_fetch_array($consulta);
$persona=$buscada['nombrepersonas'];


$sentencia = "UPDATE sugerencia SET consultados='".$consultados."', conformes= '".$conformes."', idplanilla= '".$idper."', fechaplanilla= '".$fechareg."', horaplanilla= '".$horareg."', estado= 'C/Planilla' WHERE idsm='".$idsm."'";
$consulta = mysqli_query($iden,$sentencia);


echo "<form action='planilla.php' method='post'>";
	echo "<table border='1' align='center'>";
		echo "<colgroup>";
			echo "<col width='20%'/>";
			echo "<col width='70%'/>";
		echo "</colgroup>";
		echo "<tbody>";
			echo "<tr>";
				echo "<td class='titulo2' colspan='1' style='text-align:left'><h2>Sugerencia N°: ".$nombresm."</h2></td>";
				echo "<td class='titulo2' colspan='1' style='text-align:right'><h2>Estado: ".$estado."</h2></td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td class='titulo2' colspan='2' align=center><B>DETALLE DE LA SUGERENCIA</B></td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td class='titulo2'colspan='1' style='text-align:left'>Centro</td>";
				echo "<td colspan='1' align=left>".$centro."</td>";
			echo "</tr>";
			echo "<tr>";
				$sentencia = "SELECT * FROM sector WHERE Idsector='".$sector."'";
				$consulta = mysqli_query($iden,$sentencia);
				$valores = mysqli_fetch_array($consulta);
				$destino=$valores['nombresector']; 
				echo "<td class='titulo2'colspan='1' style='text-align:left'>Sector</td>";
				echo "<td colspan='1' align=left>".$destino."</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td class='titulo2' colspan='1' style='text-align:left'>Sugerido por </td>";
				echo "<td colspan=1 align=left>".$persona." el día ".date("d/m/Y", strtotime($fecha))." a horas ".$hora."</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td class='titulo2' colspan='1' style='text-align:left'>Descripción de lo observado</td>";
				echo "<td colspan='1' align=left>".$descripcion."</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td class='titulo2' colspan='1' style='text-align:left'>Sugerencia aportada</td>";
				echo "<td colspan='1' align=left>".$sugerencia."</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td class='titulo2' colspan='2'><h2>Carga de Registro de Planilla REG-06-PRO-CAL-05</h2></td>";
			echo "</tr>";
			IF($consultados==0)
			{
				echo "<tr>";
					echo "<td class='titulo2' colspan='1' style='text-align:left'>Planilla</td>";
					echo "<td colspan='1' align=left>No se fue necesaria la Consulta</td>";
				echo "</tr>";
			} else 
			{
				echo "<tr>";
					echo "<td class='titulo2' colspan='1' style='text-align:left'>Cantidad de Consultados</td>";
					echo "<td colspan='1' align=left>".$consultados."</td>";
				echo "</tr>";
				echo "<tr>";
					echo "<td class='titulo2' colspan='1' style='text-align:left'>Cantidad de Conformes</td>";
					echo "<td colspan='1' align=left>".$conformes."</td>";
				echo "</tr>";
				echo "<tr>";
					echo "<td class='titulo2' colspan='1' style='text-align:left'>Porcentaje de Conformes</td>";
					$porcentaje=($conformes/$consultados) * 100;
					echo "<td colspan='1' align=left>".$porcentaje ." %</td>";
				echo "</tr>";
			}
			/*			$dia=substr($fechareg,0,4).substr($fechareg,5,2).substr($fechareg,8,4).substr($horareg,0,2).substr($horareg,3,2);
			$directorio = "/var/www/html/calidad/sm/basepla/";
			$archivo = $directorio . $dia . basename($_FILES['archivo']['name']);
			echo "<div>";
			if (move_uploaded_file($_FILES['archivo']['tmp_name'], $archivo)) {
				} else {
				   echo "La subida ha fallado";
				}
				echo "</div>";
			$nombrearchivo = $dia.$_FILES['archivo']['name'];
			echo "<tr>";
				echo "<td class='titulo2' colspan='1' style='text-align:left'>Archivo</td>";
				echo "<td colspan='1' align=left>".$archivo."</td>";
			echo "</tr>";
*/			echo "<tr>";
				echo "<td class='titulo2' colspan='1' style='text-align:left'>Cargado por </td>";
				echo "<td colspan='1' align=left>".$nombre." el día ".date("d/m/Y", strtotime($fechareg))." a horas ".$horareg."</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td colspan='2' align='center'>";
					echo "<input type='submit' value='Enviar' name='submit'/>";
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