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

$fechareg=$buscada['fechareg'];
$horareg=$buscada['horareg'];
$idpersona=$buscada['idpersona'];
$fecharespuesta=$buscada['fecharespuesta'];
$horarespuesta=$buscada['horarespuesta'];
$idrespuesta=$buscada['idrespuesta'];
$fechaaccion=$buscada['fechaaccion'];
$horaaccion=$buscada['horaaccion'];
$idaccion=$buscada['idaccion'];
$fechaverificacion=$buscada['fechaverificacion'];
$horaverificacion=$buscada['horaverificacion'];
$idverificacion=$buscada['idverificacion'];
$fechacierre=$buscada['fechacierre'];
$horacierre=$buscada['horacierre'];
$idcierre=$buscada['idcierre'];
$estado=$buscada['estado'];

$sentencia = 'SELECT * FROM personas WHERE Idpersonas = ' . $idpersona;
$consulta = mysqli_query($iden,$sentencia);
$buscada = mysqli_fetch_array($consulta);
$personacarga=$buscada['nombrepersonas'];

$sentencia = 'SELECT * FROM personas WHERE Idpersonas = ' . $idrespuesta;
$consulta = mysqli_query($iden,$sentencia);
$buscada = mysqli_fetch_array($consulta);
$personares=$buscada['nombrepersonas'];

$sentencia = 'SELECT * FROM personas WHERE Idpersonas = ' . $idaccion;
$consulta = mysqli_query($iden,$sentencia);
$buscada = mysqli_fetch_array($consulta);
$personaaccion=$buscada['nombrepersonas'];

$sentencia = 'SELECT * FROM personas WHERE Idpersonas = ' . $idverificacion;
$consulta = mysqli_query($iden,$sentencia);
$buscada = mysqli_fetch_array($consulta);
$personaveri=$buscada['nombrepersonas'];

$sentencia = 'SELECT * FROM personas WHERE Idpersonas = ' . $idcierre;
$consulta = mysqli_query($iden,$sentencia);
$buscada = mysqli_fetch_array($consulta);
$personacierre=$buscada['nombrepersonas'];

echo "<form action='vermis.php' method='post'>";
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
				echo "<td colspan=1 align=left>".$personacarga." ".date("d/m/Y", strtotime($fechareg))." a horas ".$horareg."</td>";
			echo "</tr>";
			if($estado != 'Sin Tratar'){
				echo "<tr>";
				echo "<td class='titulo2' colspan='2' align=center><b>REGISTRO DE RESPUESTA</b></td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td class='titulo2'colspan='1' style='text-align:left'>Carga realizada por </td>";
				echo "<td colspan=1 align=left>".$personares." ".date("d/m/Y", strtotime($fecharespuesta))." a horas ".$horarespuesta."</td>";
			echo "</tr>";
			}
			if($estado != 'Sin Tratar' AND $estado != 'Tratada'){
			echo "<tr>";
				echo "<td class='titulo2' colspan='2' align=center><b>REGISTRO DE ACCIONES</b></td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td class='titulo2'colspan='1' style='text-align:left'>Carga realizada por </td>";
				echo "<td colspan=1 align=left>".$personaaccion." ".date("d/m/Y", strtotime($fechaaccion))." a horas ".$horaaccion."</td>";
			echo "</tr>";
			}	
			if($estado != 'Sin Tratar' AND $estado != 'Tratada' AND $estado != 'Para Tratar'){
				echo "<tr>";
					echo "<td class='titulo2' colspan='2' align=center><b>REGISTRO DE VERIFICACIONES</b></td>";
				echo "</tr>";
				echo "<tr>";
					echo "<td class='titulo2'colspan='1' style='text-align:left'>Carga realizada por </td>";
					echo "<td colspan=1 align=left>".$personaveri." ".date("d/m/Y", strtotime($fechaverificacion))." a horas ".$horaverificacion."</td>";
				echo "</tr>";
				}	
			if($estado != 'Sin Tratar' AND $estado != 'Tratada' AND $estado != 'Para Tratar' AND $estado != 'Verificado'){
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