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

$idqrf=$_POST['idqrf'];

$sentencia = 'SELECT * FROM quejas WHERE Idqrf = "' . $idqrf. '"';
$consulta = mysqli_query($iden,$sentencia);
$buscada = mysqli_fetch_array($consulta);

$fechahoy=$buscada['fechacarga'];
$dia=$buscada['diareg'];
$horahoy=$buscada['horacarga'];
$fechareg=$buscada['fechareg'];
$horareg=$buscada['horareg'];
$tipo=$buscada['tipo'];
$centro=$buscada['centro'];
$destino=$buscada['destino'];
$canal=$buscada['canal'];
$concepto=$buscada['concepto'];
$descripcion=$buscada['descripcion'];
$nombrea=$buscada['nombrea'];
$domicilio=$buscada['domicilio'];
$telefono=$buscada['telefono'];
$personai=$buscada['personai'];
$iorigen=$buscada['iorigen'];
$suceso=$buscada['suceso'];
$idpersona=$buscada['idpersona'];
$respuesta=$buscada['respuesta'];
$accion=$buscada['accion'];
$verificacion=$buscada['verificacion'];

$sentencia = 'SELECT * FROM personas WHERE Idpersonas = ' . $idpersona;
$consulta = mysqli_query($iden,$sentencia);
$buscada = mysqli_fetch_array($consulta);

$personacarga=$buscada['nombrepersonas'];

$fecha = date("Y"). "-".date("m"). "-".date("d");   
$dia=date("w");
$hora=date("H")-3;
$hora=$hora.":".date("i");

echo "<form action='regcierre.php' method='post'>";
	echo "<table border='1' align='center'>";
		echo "<colgroup>";
			echo "<col width='20%'/>";
			echo "<col width='70%'/>";
		echo "</colgroup>";
		echo "<tbody>";
			echo "<tr>";
				echo "<td class='titulo1' colspan='2' align=center><h2>DETALLE DE QUEJAS, RECLAMOS O FELICITACIONES</h2></td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td class='titulo2' colspan='2' align=center><B>DETALLE DE LO SUCEDIDO</B></td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td class='titulo2'colspan='1' style='text-align:left'>Fecha del Registro</td>";
				echo "<td colspan=1 align=left>".$dia." ".date("d/m/Y", strtotime($fechareg))." a horas ".$horareg."</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td class='titulo2' colspan='1' style='text-align:left'>Tipo</td>";
				echo "<td colspan='1' align=left>".$tipo."</td>";
			echo "</tr>";
			echo "<tr>";
				$sentencia = "SELECT * FROM sector WHERE Idsector='".$destino."'";
				$consulta = mysqli_query($iden,$sentencia);
				$valores = mysqli_fetch_array($consulta);
				$destinof=$valores['nombresector']; 
				echo "<td class='titulo2' colspan='1' style='text-align:left'>Destinado a</td>";
				echo "<td colspan='1' align=left>Centro: ".$centro." - ??rea: ".$destinof."</td>";
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
				echo "<td class='titulo2' colspan='1' style='text-align:left'>Descripci??n</td>";
				echo "<td colspan='1' align=left>".$descripcion."</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td class='titulo2' colspan='2' align=center><B>DETALLE DEL ALERTANTE</B></td>";
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
				echo "<td class='titulo2'colspan='1' style='text-align:left'>Tel??fono del alertante</td>";
				echo "<td colspan=1 align=left>".$telefono."</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td class='titulo2' colspan='2' align=center><B>DETALLE DEL INCIDENTE GENERADOR</B></td>";
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
				echo "<td class='titulo2' colspan='2' align=center><b>DETALLE DE RESPUESTA</b></td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td class='titulo2' colspan='1' style='text-align:left'>Respuesta</td>";
				echo "<td colspan='1' align=left>".$respuesta."</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td class='titulo2' colspan='2' align=center><b>DETALLE DE LAS ACCIONES</b></td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td class='titulo2' colspan='1' style='text-align:left'>Acciones</td>";
				echo "<td colspan='1' align=left>".$accion."</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td class='titulo2' colspan='2' align=center><b>DETALLE DE LA VERIFICACION DE EFECTIVIDAD DE LAS ACCIONES</b></td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td class='titulo2' colspan='1' style='text-align:left'>Verificaci??n</td>";
				echo "<td colspan='1' align=left>".$verificacion."</td>";
			echo "</tr>";

			echo "<tr>";
				echo "<td class='titulo1' colspan='2' align=center><h2>CARGA DE CIERRE DE REGISTRO</h2></td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td class='titulo2' colspan='1' style='text-align:left'>Observaciones de Cierre</td>";
				echo "<td colspan='1' align=left><input type='text' id='cierre' name='cierre' required maxlength='130' size='110'></td>";
			echo "</tr>";
			echo "</tr>";
				echo "<input type='hidden' name='idqrf' value='".$idqrf."'>";
				echo "<input type='hidden' name='idper' value='".$idper."'>";
				echo "<input type='hidden' name='fecha' value='".$fecha."'>";
				echo "<input type='hidden' name='hora' value='".$hora."'>";
			echo "<tr>";
				echo "<td colspan='2' align='center'>";
					echo "<input type='submit' value='Enviar Datos' name='submit'/>";
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