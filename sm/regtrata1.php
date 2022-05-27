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

$sentencia = 'SELECT * FROM personas WHERE Idpersonas = ' . $idpersona;
$consulta = mysqli_query($iden,$sentencia);
$buscada = mysqli_fetch_array($consulta);
$persona=$buscada['nombrepersonas'];

$fecha = date("Y"). "-".date("m"). "-".date("d");   
$hora=date("H")-3;
$hora=$hora.":".date("i");

echo "<form action='cargatrata1.php' method='post'>";
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
				echo "<td class='titulo2' colspan='2'><h2>Carga de Registro de Factibilidad</h2></td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td class='titulo2' colspan='1' style='text-align:left'>Reunión realizada el </td>";
				echo "<td colspan='1' align=left><input type='date' id='fechareunion' name='fechareunion' required></td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td class='titulo2' colspan='1' style='text-align:left'>Factibilidad</td>";
				echo "<td colspan='1' align=left><textarea name='factibilidad' rows='2' cols='110' required maxlength='220' placeholder='Describa la factibilidad sobre lo sugerido'></textarea></td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td class='titulo2' colspan='1' style='text-align:left'>Impacto</td>";
				echo "<td colspan='1' align=left><textarea name='impacto' rows='2' cols='110' required maxlength='220' placeholder='Describa el impacto sobre lo sugerido'></textarea></td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td class='titulo2' colspan='1' style='text-align:left'>Costos</td>";
				echo "<td colspan='1' align=left><textarea name='costos' rows='2' cols='110' required maxlength='220' placeholder='Describa en analisis de costos sobre lo sugerido'></textarea></td>";
			echo "</tr>";
			echo "<input type='hidden' name='fecha' value='".$fecha."'>";
			echo "<input type='hidden' name='hora' value='".$hora."'>";
			echo "<input type='hidden' name='idsm' value='".$idsm."'>";
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