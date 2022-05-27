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
$fecha=$buscada['fecha'];
$hora=$buscada['hora'];
$idpersona=$buscada['idpersona'];
$fechaplanilla=$buscada['fechaplanilla'];
$horaplanilla=$buscada['horaplanilla'];
$idplanilla=$buscada['idplanilla'];
$fechafactibilidad=$buscada['fechafactibilidad'];
$horafactibilidad=$buscada['horafactibilidad'];
$idfactibilidad=$buscada['idfactibilidad'];
$fechatrata=$buscada['fechatrata'];
$horatrata=$buscada['horatrata'];
$idtrata=$buscada['idtrata'];
$fechaefecti=$buscada['fechaefecti'];
$horaefecti=$buscada['horaefecti'];
$idefecti=$buscada['idefecti'];
$fechacierre=$buscada['fechacierre'];
$horacierre=$buscada['horacierre'];
$idcierre=$buscada['idcierre'];
$estado=$buscada['estado'];

$sentencia = 'SELECT * FROM personas WHERE Idpersonas = ' . $idpersona;
$consulta = mysqli_query($iden,$sentencia);
$buscada = mysqli_fetch_array($consulta);
$personacarga=$buscada['nombrepersonas'];

$sentencia = 'SELECT * FROM personas WHERE Idpersonas = ' . $idplanilla;
$consulta = mysqli_query($iden,$sentencia);
$buscada = mysqli_fetch_array($consulta);
$personaplanilla=$buscada['nombrepersonas'];

$sentencia = 'SELECT * FROM personas WHERE Idpersonas = ' . $idfactibilidad;
$consulta = mysqli_query($iden,$sentencia);
$buscada = mysqli_fetch_array($consulta);
$personafactibilidad=$buscada['nombrepersonas'];

$sentencia = 'SELECT * FROM personas WHERE Idpersonas = ' . $idtrata;
$consulta = mysqli_query($iden,$sentencia);
$buscada = mysqli_fetch_array($consulta);
$personatrata=$buscada['nombrepersonas'];

$sentencia = 'SELECT * FROM personas WHERE Idpersonas = ' . $idefecti;
$consulta = mysqli_query($iden,$sentencia);
$buscada = mysqli_fetch_array($consulta);
$personaefecti=$buscada['nombrepersonas'];

$sentencia = 'SELECT * FROM personas WHERE Idpersonas = ' . $idcierre;
$consulta = mysqli_query($iden,$sentencia);
$buscada = mysqli_fetch_array($consulta);
$personacierre=$buscada['nombrepersonas'];

echo "<form action='vermissuger.php' method='post'>";
	echo "<table border='1' align='center'>";
		echo "<colgroup>";
			echo "<col width='20%'/>";
			echo "<col width='70%'/>";
		echo "</colgroup>";
		echo "<tbody>";
			echo "<tr>";
				echo "<td class='titulo1' colspan='2' align=center><h2>DETALLE DE PERSONAS QUE REALIZARON LOS REGISTROS</h2></td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td class='titulo2' colspan='2' align=center><B>REGISTRO DE CARGA</B></td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td class='titulo2'colspan='1' style='text-align:left'>Carga realizada por </td>";
				echo "<td colspan=1 align=left>".$personacarga." ".date("d/m/Y", strtotime($fecha))." a horas ".$hora."</td>";
			echo "</tr>";
			if($estado != 'Sin Tratar'){
				echo "<tr>";
				echo "<td class='titulo2' colspan='2' align=center><b>REGISTRO DE PLANILLA</b></td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td class='titulo2'colspan='1' style='text-align:left'>Carga realizada por </td>";
				echo "<td colspan=1 align=left>".$personaplanilla." ".date("d/m/Y", strtotime($fechaplanilla))." a horas ".$horaplanilla."</td>";
			echo "</tr>";
			}
			if($estado != 'Sin Tratar' AND $estado != 'C/Planilla'){
			echo "<tr>";
				echo "<td class='titulo2' colspan='2' align=center><b>REGISTRO DE FACTIBILIDAD</b></td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td class='titulo2'colspan='1' style='text-align:left'>Carga realizada por </td>";
				echo "<td colspan=1 align=left>".$personafactibilidad." ".date("d/m/Y", strtotime($fechafactibilidad))." a horas ".$horafactibilidad."</td>";
			echo "</tr>";
			}	
			if($estado != 'Sin Tratar' AND $estado != 'C/Planilla' AND $estado != 'C/Factibilidad'){
				echo "<tr>";
					echo "<td class='titulo2' colspan='2' align=center><b>REGISTRO DE TRATAMIENTO</b></td>";
				echo "</tr>";
				echo "<tr>";
					echo "<td class='titulo2'colspan='1' style='text-align:left'>Carga realizada por </td>";
					echo "<td colspan=1 align=left>".$personatrata." ".date("d/m/Y", strtotime($fechatrata))." a horas ".$horatrata."</td>";
				echo "</tr>";
				}	
			if($estado != 'Sin Tratar' AND $estado != 'C/Planilla' AND $estado != 'C/Factibilidad' AND $estado != 'C/Tratamiento'){
				echo "<tr>";
					echo "<td class='titulo2' colspan='2' align=center><b>REGISTRO DE EFECTIVIDAD</b></td>";
				echo "</tr>";
				echo "<tr>";
				echo "<td class='titulo2'colspan='1' style='text-align:left'>Carga realizada por </td>";
				echo "<td colspan=1 align=left>".$personaefecti." ".date("d/m/Y", strtotime($fechaefecti))." a horas ".$horaefecti."</td>";
			echo "</tr>";
				}	
				if($estado != 'Sin Tratar' AND $estado != 'C/Planilla' AND $estado != 'C/Factibilidad' AND $estado != 'C/Tratamiento' AND $estado != 'Para Cierre'){
					echo "<tr>";
						echo "<td class='titulo2' colspan='2' align=center><b>REGISTRO DE CIERRE</b></td>";
					echo "</tr>";
					echo "<tr>";
					echo "<td class='titulo2'colspan='1' style='text-align:left'>Carga realizada por </td>";
					echo "<td colspan=1 align=left>".$personacierre." ".date("d/m/Y", strtotime($fechacierre))." a horas ".$horacierre."</td>";
				echo "</tr>";
					}	
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