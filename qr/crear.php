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

$fechahoy=$_POST['fechahoy'];
$dia=$_POST['dia'];
switch ($dia) {
	case 0:
		$diareg='Domingo';
		break;
	case 1:
		$diareg='Lunes';
		break;
	case 2:
		$diareg='Martes';
		break;
	case 3:
		$diareg='Miercoles';
		break;
	case 4:
		$diareg='Jueves';
		break;
	case 5:
		$diareg='Viernes';
		break;
	case 6:
		$diareg='Sabado';
		break;}
$horahoy=$_POST['horahoy'];
$fechareg=$_POST['fechareg'];
$horareg=$_POST['horareg'];
$tipo=$_POST['tipo'];
$centro=$_POST['centro'];
$destino=$_POST['destino'];
$canal=$_POST['canal'];
$concepto=$_POST['concepto'];
$descripcion=$_POST['descripcion'];
$nombrea=$_POST['nombrea'];
$domicilio=$_POST['domicilio'];
$telefono=$_POST['telefono'];
$personai=$_POST['personai'];
$iorigen=$_POST['iorigen'];
$suceso=$_POST['suceso'];

$sentencia = "INSERT INTO quejas (nombreqrf, fechareg, horareg, diareg, tipo, centro, destino, canal, concepto, descripcion, nombrea, domicilio, telefono, personai, iorigen, suceso, fechacarga, horacarga, idpersona, estado) VALUES ('".$nombreqrf."', '".$fechareg."', '".$horareg."', '".$diareg."', '".$tipo."', '".$centro."', '".$destino."', '".$canal."', '".$concepto."', '".$descripcion."', '".$nombrea."', '".$domicilio."', '".$telefono."', '".$personai."', '".$iorigen."', '".$suceso."', '".$fechahoy."', '".$horahoy."', '".$idper."', 'Sin Tratar')";
$consulta = mysqli_query($iden,$sentencia);


echo "<form action='vermis.php' method='post'>";
	echo "<table border='1' align='center'>";
		echo "<colgroup>";
			echo "<col width='20%'/>";
			echo "<col width='70%'/>";
		echo "</colgroup>";
		echo "<tbody>";
			echo "<tr>";
				echo "<td class='titulo1' colspan='2' align=center><h2>CARGA DE REGISTRO DE QUEJAS, RECLAMOS O FELICITACIONES</h2></td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td class='titulo2' colspan='2' align=center><B>El registro se cargo con exito<B></td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td class='titulo2'colspan='1' style='text-align:left'>Fecha del Registro</td>";
				echo "<td colspan=1 align=left>".$fechareg."</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td class='titulo2'colspan='1' style='text-align:left'>Hora del Registro</td>";
				echo "<td colspan=1 align=left>".$horareg."</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td class='titulo2'colspan='1' style='text-align:left'>Día del Registro</td>";
					echo "<td colspan=1 align=left>".$diareg."</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td class='titulo2' colspan='1' style='text-align:left'>Tipo</td>";
				echo "<td colspan='1' align=left>".$tipo."</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td class='titulo2' colspan='1' style='text-align:left'>Centro</td>";
				echo "<td colspan='1' align=left>".$centro."</td>";
			echo "</tr>";
			echo "<tr>";
				$sentencia = "SELECT * FROM sector WHERE Idsector='".$destino."'";
				$consulta = mysqli_query($iden,$sentencia);
				$valores = mysqli_fetch_array($consulta);
				$destinof=$valores['nombresector']; 
				echo "<td class='titulo2' colspan='1' style='text-align:left'>Destinado a</td>";
				echo "<td colspan='1' align=left>".$destinof."</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td class='titulo2' colspan='1' style='text-align:left'>Canal de ingreso</td>";
				echo "<td colspan='1' align=left>".$canal."</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td class='titulo2' colspan='1' style='text-align:left'>Concepto</td>";
				echo "<td colspan='1' align=left>".$concepto."</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td class='titulo2' colspan='1' style='text-align:left'>Descripción</td>";
				echo "<td colspan='1' align=left><textarea name='descripcion' rows='2' cols='125' disabled maxlength='220' placeholder='".$descripcion."'></textarea></td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td class='titulo2'colspan='1' style='text-align:left'>Nombre del alertante</td>";
				echo "<td colspan=1 align=left>".$nombrea."</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td class='titulo2'colspan='1' style='text-align:left'>Domicilio de lo ocurrido</td>";
				echo "<td colspan=1 align=left>".$domicilio."</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td class='titulo2'colspan='1' style='text-align:left'>Teléfono del alertante</td>";
				echo "<td colspan=1 align=left>".$telefono."</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td class='titulo2'colspan='1' style='text-align:left'>Persona/s involucrada/s</td>";
				echo "<td colspan=1 align=left>".$personai."</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td class='titulo2'colspan='1' style='text-align:left'>Tipo-subtipo incidente de origen</td>";
				echo "<td colspan=1 align=left>".$iorigen."</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td class='titulo2'colspan='1' style='text-align:left'>Suceso asociado</td>";
				echo "<td colspan=1 align=left>".$suceso."</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td class='titulo2'colspan='1' style='text-align:left'>Datos de la Carga</td>";
				echo "<td colspan=1 align=left>Cargado por ".$nombreper." el día ".$fechahoy." a horas ".$horahoy."</td>";
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