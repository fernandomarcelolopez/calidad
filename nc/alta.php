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
$sectorusuario=$_SESSION['sector'];

$fecha = date("Y"). "-".date("m"). "-".date("d");   

echo "<form action='crearticket.php' method='post'>";
	echo "<table border='1' align='center'>";
		echo "<colgroup>";
			echo "<col width='20%'/>";
			echo "<col width='70%'/>";
		echo "</colgroup>";
		echo "<tbody>";
			echo "<tr>";
				echo "<td class='titulo1' colspan='2' align=center><h2>CARGA DE NUEVO TICKET</h2></td>";
			echo "</tr>";
			if ($sectorusuario=='6')
			{
			echo "<tr>";
				echo "<td class='titulo2' colspan='1' style='text-align:left'>Origen</td>";
				echo "<td colspan='1' align=left>";
					echo "<select name='origen'>";
						echo "<option value='Expontanea'>Expontaneo</option>";
						echo "<option value='Auditoria Interna'>Auditoria Interna</option>";
						echo "<option value='Auditoria Externa'>Auditoria Externa</option>";
					echo "</select>";
				echo "</td>";
			echo "</tr>";
			}
			else
			{
			echo "<input type='hidden' name='origen' value='Expontanea'>";
			}
			echo "<tr>";
				echo "<td class='titulo2' colspan='1' style='text-align:left'>Desvio Observado por</td>";
				$sentencia = "SELECT * FROM personas WHERE Idpersonas =".$idper;
				$consulta = mysqli_query($iden,$sentencia);
				$valores = mysqli_fetch_array($consulta);

				$buscarsector = "SELECT * FROM sector WHERE Idsector LIKE ". $valores['idsector'];
				$consultasector = mysqli_query($iden,$buscarsector);
				$sectorbuscado = mysqli_fetch_array($consultasector);
				$sectorencontrado = $sectorbuscado['nombresector'];
				echo "<td colspan=1>";
					echo "<input type='hidden' name='nombrepersona' value='".$idper."'>";
					echo  $nombreper." de ".$sectorencontrado;
				echo "</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td class='titulo2' colspan='1' style='text-align:left'>Descripción del Desvio Observado</td>";
				echo "<td colspan='1' align=left><textarea name='descripcion' rows='4' cols='110' required maxlength='480' placeholder='Describa de lo observado'></textarea></td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td class='titulo2' colspan='1' style='text-align:left'>Sector/Área en la que Sucedió</td>";
				echo "<td colspan=1>";
				echo "<select name='sectorarea'>";
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
				echo "<td class='titulo2'colspan='1' style='text-align:left'>Fecha del Desvio</td>";
				echo "<td colspan=1 align=left>";
					echo "<input type='date' name='fecha' value='".$fecha."'>";
				echo "</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td class='titulo2'colspan='1' style='text-align:left'>Centro/Área/Agencia Involucrada</td>";
				echo "<td colspan=1 align=left>";
					echo "<input type='text' id='centro' name='centro' required maxlength='50' size='110'>";
				echo "</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td class='titulo2'colspan='1' style='text-align:left'>A Quien/es Involucro</td>";
				echo "<td colspan=1 align=left>";
					echo "<input type='text' id='involucrados' name='involucrados' required maxlength='50' size='110'>";
				echo "</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td class='titulo2'colspan='1' style='text-align:left'>Afecta al Servicio que Brindamos - ¿Comó?</td>";
				echo "<td colspan=1 align=left>";
					echo "<input type='text' id='afecta' name='afecta' required maxlength='50'  size='110'>";
				echo "</td>";
			echo "<tr>";
			echo "</tr>";
				echo "<td class='titulo2'colspan='1' style='text-align:left'>A que Uusario Afecta</td>";
				echo "<td colspan=1 align=left>";
					echo "<input type='text' id='usuafecta' name='usuafecta' required maxlength='50' size='110'>";
				echo "</td>";
			echo "</tr>";
			echo "<tr >";
				echo "<td class='titulo2' rowspan='2' style='text-align:left'>Resolución del Desvio</td>";
				echo "<td colspan='1' align=left> Se realizo alguna acción inmediata? ";
					echo "<input id='accion' name='accion' type='radio' value='SI'/>Si";
					echo "<input id='accion' name='accion' type='radio' value='NO'/>No";
				echo "</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td colspan='1' align=left> ";
					echo "<textarea name='detalleaccion' type='text' rows='4' cols='110' maxlength='440' placeholder='Describa de la Accion realizada si corresponde'></textarea></td>";
				echo "</td>";
			echo "</tr>";
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