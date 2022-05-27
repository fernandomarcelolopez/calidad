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
echo "<form action='crear.php' method='post'>";
	echo "<table border='1' align='center'>";
		echo "<colgroup>";
			echo "<col width='20%'/>";
			echo "<col width='70%'/>";
		echo "</colgroup>";
		echo "<tbody>";
			echo "<tr>";
				echo "<td class='titulo1' colspan='2' align=center><h2>CARGA DE SUGERENCIAS PARA LA MEJORA</h2></td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td class='titulo2'colspan='1' style='text-align:left'>Fecha del Registro</td>";
				echo "<td colspan=1 align=left>".date("d/m/Y", strtotime($fecha))."</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td class='titulo2'colspan='1' style='text-align:left'>Hora del Registro</td>";
				echo "<td colspan=1 align=left>".$hora."</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td class='titulo2'colspan='1' style='text-align:left'>Nombre del colaborador</td>";
				echo "<td colspan=1 align=left>".$nombreper."</td>";
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
				echo "<td class='titulo2' colspan='1' style='text-align:left'>Sector</td>";
				echo "<td colspan='1' align=left>";
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
				echo "<td class='titulo2' colspan='1' style='text-align:left'>Descripción de la situación observada</td>";
				echo "<td colspan='1' align=left><textarea name='descripcion' rows='4' cols='125' required maxlength='500' placeholder='Resumen de la situación que observa y que motiva la sugerencia'></textarea></td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td class='titulo2' colspan='1' style='text-align:left'>Sugerencia</td>";
				echo "<td colspan='1' align=left><textarea name='sugerencia' rows='4' cols='125' required maxlength='500' placeholder='detalla lo mas claramente posible lo que sugieres para mejorar lo observado'></textarea></td>";
			echo "</tr>";
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