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
$cierre=$buscada['cierre'];
$estado=$buscada['estado'];

$sentencia = 'SELECT * FROM personas WHERE Idpersonas = ' . $idpersona;
$consulta = mysqli_query($iden,$sentencia);
$buscada = mysqli_fetch_array($consulta);

$personacarga=$buscada['nombrepersonas'];


echo "<form action='vermis.php' method='post'>";
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
				echo "<td colspan='1' align=left>Centro: ".$centro." - Área: ".$destinof."</td>";
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
				echo "<td class='titulo2'colspan='1' style='text-align:left'>Teléfono del alertante</td>";
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
			if($estado != 'Sin Tratar'){
				echo "<tr>";
				echo "<td class='titulo2' colspan='2' align=center><b>CARGA DE RESPUESTA</b></td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td class='titulo2' colspan='1' style='text-align:left'>Respuesta</td>";
				echo "<td colspan='1' align=left>".$respuesta."</td>";
			echo "</tr>";
			}
			if($estado != 'Sin Tratar' AND $estado != 'Tratada'){
			echo "<tr>";
				echo "<td class='titulo2' colspan='2' align=center><b>DETALLE DE ACCIONES</b></td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td class='titulo2' colspan='1' style='text-align:left'>Acciones</td>";
				echo "<td colspan='1' align=left>".$accion."</td>";
			echo "</tr>";
			}	
			if($estado != 'Sin Tratar' AND $estado != 'Tratada' AND $estado != 'Para Tratar'){
				echo "<tr>";
					echo "<td class='titulo2' colspan='2' align=center><b>DETALLE DE VERIFICACIONES</b></td>";
				echo "</tr>";
				echo "<tr>";
					echo "<td class='titulo2' colspan='1' style='text-align:left'>Verificaciones</td>";
					echo "<td colspan='1' align=left>".$verificacion."</td>";
				echo "</tr>";
				}	
			if($estado != 'Sin Tratar' AND $estado != 'Tratada' AND $estado != 'Para Tratar' AND $estado != 'Verificado'){
				echo "<tr>";
					echo "<td class='titulo2' colspan='2' align=center><b>DETALLE DE CIERRE</b></td>";
				echo "</tr>";
				echo "<tr>";
					echo "<td class='titulo2' colspan='1' style='text-align:left'>Observaciones de Cierre</td>";
					echo "<td colspan='1' align=left>".$cierre."</td>";
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