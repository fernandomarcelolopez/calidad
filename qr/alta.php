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

$fecha = date("Y"). "-".date("m"). "-".date("d");   
$dia=date("w");
$hora=date("H")-3;
$hora=$hora.":".date("i");
echo "<form action='crear.php' method='post'>";
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
				echo "<td class='titulo2'colspan='1' style='text-align:left'>Fecha del Registro</td>";
				echo "<td colspan=1 align=left>";
					echo "<input type='date' name='fechareg' value='".$fecha."'>";
				echo "</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td class='titulo2'colspan='1' style='text-align:left'>Hora del Registro</td>";
				echo "<td colspan=1 align=left>";
					echo "<input type='time' name='horareg' value='".$hora."'>";
				echo "</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td class='titulo2' colspan='1' style='text-align:left'>Tipo</td>";
				echo "<td colspan='1' align=left>";
					echo "<select name='tipo'>";
						echo "<option value='Queja'>Queja</option>";
						echo "<option value='Reclamo'>Reclamo</option>";
						echo "<option value='Felicitación'>Felicitación</option>";
					echo "</select>";
				echo "</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td class='titulo2' colspan='1' style='text-align:left'>Centro</td>";
				echo "<td colspan='1' align=left>";
					echo "<select name='centro'>";
						echo "<option value='Salta'>Salta</option>";
						echo "<option value='Oran'>Oran</option>";
						echo "<option value='Tartagal'>Tartagal</option>";
					echo "</select>";
				echo "</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td class='titulo2' colspan='1' style='text-align:left'>Destinado a</td>";
				echo "<td colspan='1' align=left>";
					echo "<select name='destino'>";
						$sentencia = "SELECT * FROM sector WHERE estado='1'";
						$consulta = mysqli_query($iden,$sentencia);
						while ($valores = mysqli_fetch_array($consulta)) 
							{
								echo '<option value="'.$valores[Idsector].'">'.$valores[nombresector].'</option>';
							}
					echo "</select>";
				echo "</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td class='titulo2' colspan='1' style='text-align:left'>Canal de ingreso</td>";
				echo "<td colspan='1' align=left>";
					echo "<select name='canal'>";
						echo "<option value='Llamada 911'>Llamada 911</option>";
						echo "<option value='Web'>Web</option>";
						echo "<option value='Llamada Otros'>Llamada Otros</option>";
						echo "<option value='Redes sociales'>Redes sociales</option>";
					echo "</select>";
				echo "</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td class='titulo2' colspan='1' style='text-align:left'>Concepto</td>";
				echo "<td colspan='1' align=left>";
					echo "<select name='concepto'>";
						echo "<option value='Mala Atención'>Mala Atención</option>";
						echo "<option value='Buen Accionar'>Buen Accionar</option>";
						echo "<option value='No entro llamada'>No entro llamada</option>";
						echo "<option value='Demora en la atención'>Demora en la atención</option>";
						echo "<option value='Muchas preguntas'>Muchas preguntas</option>";
						echo "<option value='Desinterés'>Desinterés</option>";
						echo "<option value='Psicologo no quieso atender'>Psicologo no quieso atender</option>";
						echo "<option value='Cámara sin Luz'>Cámara sin Luz</option>";
						echo "<option value='No Pertinente'>No Pertinente</option>";
					echo "</select>";
				echo "</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td class='titulo2' colspan='1' style='text-align:left'>Descripción</td>";
				echo "<td colspan='1' align=left><textarea name='descripcion' rows='2' cols='125' required maxlength='220' placeholder='Resumen de la Queja, Reclamo o Felicitación'></textarea></td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td class='titulo2'colspan='1' style='text-align:left'>Nombre del alertante</td>";
				echo "<td colspan=1 align=left>";
					echo "<input type='text' id='nombrea' name='nombrea' required maxlength='50' size='130'>";
				echo "</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td class='titulo2'colspan='1' style='text-align:left'>Domicilio de lo ocurrido</td>";
				echo "<td colspan=1 align=left>";
					echo "<input type='text' id='domicilio' name='domicilio' required maxlength='110' size='130'>";
				echo "</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td class='titulo2'colspan='1' style='text-align:left'>Teléfono del alertante</td>";
				echo "<td colspan=1 align=left>";
					echo "<input type='text' id='telefono' name='telefono' required maxlength='15' size='130'>";
				echo "</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td class='titulo2'colspan='1' style='text-align:left'>Persona/s involucrada/s</td>";
				echo "<td colspan=1 align=left>";
					echo "<input type='text' id='personai' name='personai' required maxlength='110' size='130'>";
				echo "</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td class='titulo2'colspan='1' style='text-align:left'>Tipo-subtipo incidente de origen</td>";
				echo "<td colspan=1 align=left>";
					echo "<input type='text' id='iorigen' name='iorigen' required maxlength='110' size='130'>";
				echo "</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td class='titulo2'colspan='1' style='text-align:left'>Suceso asociado</td>";
				echo "<td colspan=1 align=left>";
					echo "<input type='text' id='suceso' name='suceso' required maxlength='15' size='130'>";
				echo "</td>";
			echo "</tr>";
			echo "<input type='hidden' name='fechahoy' value='".$fecha."'>";
			echo "<input type='hidden' name='dia' value='".$dia."'>";
			echo "<input type='hidden' name='horahoy' value='".$hora."'>";
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