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
$efectividad=$_POST['efectividad'];


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
$fechareunion=$buscada['fechareunion'];
$factibilidad=$buscada['factibilidad'];
$impacto=$buscada['impacto'];
$costos=$buscada['costos'];
$fechareunion1=$buscada['fechareunion1'];
$resultado=$buscada['resultado'];
$acciones=$buscada['acciones'];
$plazos=$buscada['plazos'];

$sentencia = 'SELECT * FROM personas WHERE Idpersonas = ' . $idpersona;
$consulta = mysqli_query($iden,$sentencia);
$buscada = mysqli_fetch_array($consulta);
$persona=$buscada['nombrepersonas'];


$sentencia = "UPDATE sugerencia SET efectividad='".$efectividad."',  idefecti= '".$idper."', fechaefecti= '".$fechareg."', horaefecti= '".$horareg."', estado= 'Para Cierre' WHERE idsm='".$idsm."'";
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
				echo "<td class='titulo2' colspan='2' align=center><b>CARGA DE PLANILLAS</b></td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td class='titulo2' colspan='1' style='text-align:left'>Resultado de la consulta</td>";
				IF($conformes==0)
				{
				echo "<td colspan='1' align=left>No fue necesaria la realización de consulta</td>";
				} else
				{
				$porcentaje=($conformes/$consultados) * 100;
				echo "<td colspan='1' align=left>Total de Consultados: ".$consultados." - Conformes: ".$conformes." - Porcentaje de Conformes: ".$porcentaje."%</td>";
				}
			echo "</tr>";
			echo "<tr>";
				echo "<td class='titulo2' colspan='2'><b>REGISTRO DE FACTIBILIDAD</b></td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td class='titulo2' colspan='1' style='text-align:left'>Reunión realizada el </td>";
				echo "<td colspan='1' align=left>".date("d/m/Y", strtotime($fechareunion))."</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td class='titulo2' colspan='1' style='text-align:left'>Factibilidad</td>";
				echo "<td colspan='1' align=left>".$factibilidad."</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td class='titulo2' colspan='1' style='text-align:left'>Impacto</td>";
				echo "<td colspan='1' align=left>".$impacto."</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td class='titulo2' colspan='1' style='text-align:left'>Costos</td>";
				echo "<td colspan='1' align=left>".$costos."</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td class='titulo2' colspan='2'><b>REGISTRO DE TRATAMIENTO</b></td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td class='titulo2' colspan='1' style='text-align:left'>Reunión realizada el </td>";
				echo "<td colspan='1' align=left>".date("d/m/Y", strtotime($fechareunion1))."</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td class='titulo2' colspan='1' style='text-align:left'>Resultado de la Sugerencia</td>";
				echo "<td colspan='1' align=left>".$resultado."</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td class='titulo2' colspan='1' style='text-align:left'>Acciones a realizar</td>";
				echo "<td colspan='1' align=left>".$acciones."</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td class='titulo2' colspan='1' style='text-align:left'>Plazo estimativo de implementación</td>";
				echo "<td colspan='1' align=left>".$plazo." días</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td class='titulo2' colspan='2'><b>REGISTRO DE EFECTIVIDAD</b></td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td class='titulo2' colspan='1' style='text-align:left'>Resultado del análisis de la Efectividad de lo realizado</td>";
				echo "<td colspan='1' align=left>".$efectividad."</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td class='titulo2' colspan='1' style='text-align:left'>Cargado por </td>";
				echo "<td colspan='1' align=left>".$nombre." el día ".date("d/m/Y", strtotime($fechareg))." a horas ".$horareg."</td>";
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