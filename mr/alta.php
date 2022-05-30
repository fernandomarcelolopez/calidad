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
$hora=date("H")-3;
$hora=$hora.":".date("i");
echo "<form enctype='multipart/form-data' action='cargar.php' method='post'>";
	echo "<table border='1' align='center'>";
		echo "<colgroup>";
			echo "<col width='20%'/>";
			echo "<col width='10%'/>";
			echo "<col width='60%'/>";
		echo "</colgroup>";
		echo "<tbody>";
			echo "<tr>";
				echo "<td class='titulo1' colspan='3' align=center><h2>CARGA DE NOVEDAD</h2></td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td class='titulo2'colspan='1' style='text-align:left'>Fecha del Publicación</td>";
				echo "<td colspan=2 align=left>".date("d/m/Y", strtotime($fecha))." - ".$hora."</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td class='titulo2'colspan='1' style='text-align:left'>Emisor</td>";
				echo "<td colspan=2 align=left>".$nombreper."</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td class='titulo2'colspan='1' rowspan=3 style='text-align:left'>Destino</td>";
				echo "<td colspan=1 align=left>General<input id='seleccion' name='seleccion' type='radio' value='general'/></td>";
				echo "<td colspan=1 align=left>Para todos</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td colspan=1 align=left>Sector<input id='seleccion' name='seleccion' type='radio' value='sector'/></td>";
				echo "<td colspan=1 align=left>";
					echo "<select name='sector'>";
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
				echo "<td colspan=1 align=left>Personal<input id='seleccion' name='seleccion' type='radio' value='personal'/></td>";
				echo "<td colspan=1 align=left>";
					echo "<select name='personal'>";
					$sentencia = "SELECT * FROM personas WHERE estado='1'";
					$consulta = mysqli_query($iden,$sentencia);
					while ($valores = mysqli_fetch_array($consulta)) 
						{
							echo '<option value="'.$valores[Idpersonas].'">'.$valores[nombrepersonas].'</option>';
						}
					echo "</select>";
				echo "</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td class='titulo2' colspan='1' style='text-align:left'>Mensaje</td>";
				echo "<td colspan='2' align=left><textarea name='mensaje' rows='5' cols='120' required maxlength='600' placeholder='Ingrese el Mensaje'></textarea></td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td class='titulo2' colspan='1' rowspan='3' style='text-align:left'>Adjuntar Archivo</td>";
				echo "<td colspan='2' align=left><input name='archivo' type='file' accept='.pdf, .jpg'/></td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td colspan='2' align=left><input name='archivo1' type='file' accept='.pdf, .jpg'/></td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td colspan='2' align=left><input name='archivo2' type='file' accept='.pdf, .jpg'/></td>";
			echo "</tr>";
			echo "<input type='hidden' name='idper' value='".$idper."'>";
			echo "<input type='hidden' name='fecha' value='".$fecha."'>";
			echo "<input type='hidden' name='hora' value='".$hora."'>";
			echo "<tr>";
				echo "<td colspan='3' align='center'>";
					echo "<input type='submit' value='Cargar' name='submit'/>";
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