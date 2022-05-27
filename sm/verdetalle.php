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

$idsm=$_POST['idsm'];

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
$consultados=$buscada['consultados'];
$conformes=$buscada['conformes'];
$fechareunion=$buscada['fechareunion'];
$factibilidad=$buscada['factibilidad'];
$impacto=$buscada['impacto'];
$costos=$buscada['costos'];
$fechareunion1=$buscada['fechareunion1'];
$resultado=$buscada['resultado'];
$acciones=$buscada['acciones'];
$plazos=$buscada['plazos'];
$efectividad=$buscada['efectividad'];

$sentencia = 'SELECT * FROM personas WHERE Idpersonas = ' . $idpersona;
$consulta = mysqli_query($iden,$sentencia);
$buscada = mysqli_fetch_array($consulta);
$persona=$buscada['nombrepersonas'];


echo "<form action='vermissuger.php' method='post'>";
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

			if($estado != 'Sin Tratar'){
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
			}
			if($estado != 'Sin Tratar' AND $estado != 'C/Planilla'){
			echo "<tr>";
				echo "<td class='titulo2' colspan='2' align=center><b>DETALLE DE FACTIBILIDAD</b></td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td class='titulo2' colspan='1' style='text-align:left'>Fecha Reunión</td>";
				echo "<td colspan='1' align=left>".$fechareunion."</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td class='titulo2' colspan='1' style='text-align:left'>Analisis de Factibilidad</td>";
				echo "<td colspan='1' align=left>".$factibilidad."</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td class='titulo2' colspan='1' style='text-align:left'>Analisis de Impacto</td>";
				echo "<td colspan='1' align=left>".$impacto."</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td class='titulo2' colspan='1' style='text-align:left'>Analisis de Costos</td>";
				echo "<td colspan='1' align=left>".$costos."</td>";
			echo "</tr>";
			}	
			if($estado != 'Sin Tratar' AND $estado != 'C/Planilla' AND $estado != 'C/Factibilidad'){
				echo "<tr>";
					echo "<td class='titulo2' colspan='2' align=center><b>DETALLE DE TRATAMIENTO</b></td>";
				echo "</tr>";
				echo "<tr>";
					echo "<td class='titulo2' colspan='1' style='text-align:left'>Fecha Reunión</td>";
					echo "<td colspan='1' align=left>".$fechareunion1."</td>";
				echo "</tr>";
				echo "<tr>";
					echo "<td class='titulo2' colspan='1' style='text-align:left'> Resultado del Analisis de la Sugerencia</td>";
					echo "<td colspan='1' align=left>".$resultado."</td>";
				echo "</tr>";
				echo "<tr>";
					echo "<td class='titulo2' colspan='1' style='text-align:left'>Acciones a Realizar</td>";
					echo "<td colspan='1' align=left>".$acciones."</td>";
				echo "</tr>";
				echo "<tr>";
					echo "<td class='titulo2' colspan='1' style='text-align:left'>Plazo Estimado</td>";
					echo "<td colspan='1' align=left>".$plazos." días</td>";
				echo "</tr>";
				}	
				if($estado != 'Sin Tratar' AND $estado != 'C/Planilla' AND $estado != 'C/Factibilidad' AND $estado != 'C/Efectividad'){
					echo "<tr>";
						echo "<td class='titulo2' colspan='2' align=center><b>DETALLE DE EFECTIVIDAD</b></td>";
					echo "</tr>";
					echo "<tr>";
						echo "<td class='titulo2' colspan='1' style='text-align:left'>Detalle de nálisis de Efectividad</td>";
						echo "<td colspan='1' align=left>".$efectividad."</td>";
					echo "</tr>";
				}	
/*			if($estado != 'Sin Tratar' AND $estado != 'Tratada' AND $estado != 'Para Tratar' AND $estado != 'Verificado'){
				echo "<tr>";
					echo "<td class='titulo2' colspan='2' align=center><b>DETALLE DE CIERRE</b></td>";
				echo "</tr>";
				echo "<tr>";
					echo "<td class='titulo2' colspan='1' style='text-align:left'>Observaciones de Cierre</td>";
					echo "<td colspan='1' align=left>".$cierre."</td>";
				echo "</tr>";
				}	
*/			echo "<tr>";
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