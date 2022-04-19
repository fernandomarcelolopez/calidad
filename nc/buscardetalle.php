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

$seleccion = $_POST['seleccion'];
$numero=$_POST['numero'];
$ano=$_POST['ano'];
$ticketbuscado=$numero."/".$ano;
$nombreo=$_POST['nombreo'];

$sentencia0 = "SELECT * FROM personas WHERE Idpersonas = '".$nombreo."'";
$consulta0 = mysqli_query($iden,$sentencia0);
$perbuscado = mysqli_fetch_assoc($consulta0); 
$nombreobservador = $perbuscado['nombrepersonas'];
$areag=$_POST['areag'];
$aread=$_POST['aread'];
$fechad=$_POST['fechad'];
$fechar=$_POST['fechar'];
$fechac=$_POST['fechac'];

if($seleccion == 'numero' OR $seleccion == 'nombreo'OR $seleccion == 'areag'OR $seleccion == 'aread' OR $seleccion == 'fechad'){

echo "  <table>";
	echo "<tbody>";
		echo "<tr>";
			echo "<td class='titulo1' colspan='9' align=center><h2>Lista de Tickets asociados a la busqueda</h2</td>";
		echo "</tr>";
		echo "<tr>";
			if($seleccion == 'numero'){
				echo "<td class='titulo2' colspan='9' align=center><B>Resultado de la busqueda por el numero de Ticket ".$nombretk." </B</td>";
			}	
			if($seleccion == 'nombreo'){
				echo "<td class='titulo2' colspan='9' align=center><B>Resultado de la busqueda por el Nombre ".$nombreobservador." </B</td>";
			}	
			if($seleccion == 'areag'){
				echo "<td class='titulo2' colspan='9' align=center><B>Resultado de la busqueda por el área generadora ".$areag." </B</td>";
			}	
			if($seleccion == 'aread'){
				echo "<td class='titulo2' colspan='9' align=center><B>Resultado de la busqueda por el área de destino ".$aread." </B</td>";
			}	
			if($seleccion == 'fechad'){
				echo "<td class='titulo2' colspan='9' align=center><B>Resultado de la busqueda por fecha de observación ".$fechad." </B</td>";
			}	
			echo "</tr>";
		echo "<tr>";
			echo "<td class='titulo2'>Ticket N°</td>";
			echo "<td class='titulo2'>Fecha Obs.</td>";
			echo "<td class='titulo2'>Detectado por</td>";
			echo "<td class='titulo2'>Para el Sector</td>";
			echo "<td class='titulo2'>Accion Inm.</td>";
			echo "<td class='titulo2'>Estado</td>";
			echo "<td class='titulo2'>       </td>";
		echo "</tr>";
		$bandera=0;
		if($seleccion == 'numero'){
			$sentencia = "SELECT * FROM ticket WHERE nombretk = '".$ticketbuscado."'";
			$consulta = mysqli_query($iden,$sentencia);
		}
		if($seleccion == 'nombreo'){
			$sentencia = "SELECT * FROM ticket WHERE idpersona = '".$nombreo."'";
			$consulta = mysqli_query($iden,$sentencia);
		}
		if($seleccion == 'areag'){
			$sentencia = "SELECT * FROM ticket WHERE sectorpersona = '".$areag."'";
			$consulta = mysqli_query($iden,$sentencia);
		}
		if($seleccion == 'aread'){
			$sentencia = "SELECT * FROM ticket WHERE sectorarea = '".$aread."'";
			$consulta = mysqli_query($iden,$sentencia);
		}
		if($seleccion == 'fechad'){
			$sentencia = "SELECT * FROM ticket WHERE fecha = '".$fechad."'";
			$consulta = mysqli_query($iden,$sentencia);
		}
		while($tkbuscado = mysqli_fetch_assoc($consulta)) 
		{ 
			$nombretk = $tkbuscado['nombretk'];
			$origen = $tkbuscado['origen'];
			$idpersona = $tkbuscado['idpersona'];
			$sectorpersona = $tkbuscado['sectorpersona'];
			$descripcion = $tkbuscado['descripcion'];
			$sectorarea = $tkbuscado['sectorarea'];
			$fecha = $tkbuscado['fecha'];
			$centro = $tkbuscado['centro'];
			$involucrados = $tkbuscado['involucrados'];
			$afecta = $tkbuscado['afecta'];
			$usuafecta = $tkbuscado['usuafecta'];
			$accion = $tkbuscado['accion'];
			$detalleaccion = $tkbuscado['detalleaccion'];
			$estado = $tkbuscado['estado'];
	
			$sentencia1 = 'SELECT * FROM personas WHERE Idpersonas = "' . $idpersona. '"';
			$consulta1 = mysqli_query($iden,$sentencia1);
			$personabuscada = mysqli_fetch_array($consulta1);
			$observador = $personabuscada['nombrepersonas'];

		echo "<tr>";
				echo "<td class='detalle'>". $nombretk."</td>";
				echo "<td class='detalle'>".date("d/m/Y", strtotime($fecha))."</td>";
				echo "<td class='detalle'>". $observador." de ".$sectorpersona."</td>";
				echo "<td class='detalle'>". $sectorarea."</td>";
				echo "<td class='detalle'>". $accion."</td>";
				echo "<td class='detalle'>". $estado."</td>";
				echo "<td class='detalle'>";
					echo "<form action='verdetalle.php' method='post' target='principal'>";
					echo "<input type='hidden' value='".$nombretk."' name='numero' id:'numero' />";
					echo "<input type='hidden' value='0' name='generado' id:'numero' />";
					echo "<input type='submit' value='Ver Detalle' name='submit'/>";
					echo "</form>";	
				echo "</td>";
			echo "</tr>";
			$bandera = $bandera +1;
		}
		if($bandera == 0) 
		{
			echo "<tr>";
				echo "<td  class='titulo1'colspan='9'>Sin Tickets Activos del Área</Font></td>";
			echo "</tr>";
		}	
	echo "</tbody>";
echo "  </table>";
}
if($seleccion == 'fechar' )
{
	echo "  <table>";
		echo "<tbody>";
			echo "<tr>";
				echo "<td class='titulo1' colspan='9' align=center><h2>Lista de Tickets asociados a la busqueda</h2</td>";
			echo "</tr>";
			echo "<tr>";
						echo "<td class='titulo2' colspan='9' align=center><B>Resultado de la busqueda por fecha de respuesta ".$fechar." </B</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td class='titulo2'>Ticket N°</td>";
				echo "<td class='titulo2'>Fecha Obs.</td>";
				echo "<td class='titulo2'>Detectado por</td>";
				echo "<td class='titulo2'>Para el Sector</td>";
				echo "<td class='titulo2'>Accion Inm.</td>";
				echo "<td class='titulo2'>Estado</td>";
				echo "<td class='titulo2'>       </td>";
			echo "</tr>";
			$bandera=0;
			$sentencia1 = "SELECT * FROM respuesta WHERE fecharespuesta = '".$fechar."'";
			$consulta1 = mysqli_query($iden,$sentencia1);
			while($ticketbuscado = mysqli_fetch_assoc($consulta1)) 
			{
				$sentencia = "SELECT * FROM ticket WHERE nombretk = '".$ticketbuscado['nombretk']."'";
				$consulta = mysqli_query($iden,$sentencia);
				$tkbuscado = mysqli_fetch_assoc($consulta); 
					$nombretk = $tkbuscado['nombretk'];
					$origen = $tkbuscado['origen'];
					$idpersona = $tkbuscado['idpersona'];
					$sectorpersona = $tkbuscado['sectorpersona'];
					$descripcion = $tkbuscado['descripcion'];
					$sectorarea = $tkbuscado['sectorarea'];
					$fecha = $tkbuscado['fecha'];
					$centro = $tkbuscado['centro'];
					$involucrados = $tkbuscado['involucrados'];
					$afecta = $tkbuscado['afecta'];
					$usuafecta = $tkbuscado['usuafecta'];
					$accion = $tkbuscado['accion'];
					$detalleaccion = $tkbuscado['detalleaccion'];
					$estado = $tkbuscado['estado'];
		
					$sentencia1 = 'SELECT * FROM personas WHERE Idpersonas = "' . $idpersona. '"';
					$consulta1 = mysqli_query($iden,$sentencia1);
					$personabuscada = mysqli_fetch_array($consulta1);
					$observador = $personabuscada['nombrepersonas'];
		
					echo "<tr>";
						echo "<td class='detalle'>". $nombretk."</td>";
						echo "<td class='detalle'>".date("d/m/Y", strtotime($fecha))."</td>";
						echo "<td class='detalle'>". $observador." de ".$sectorpersona."</td>";
						echo "<td class='detalle'>". $sectorarea."</td>";
						echo "<td class='detalle'>". $accion."</td>";
						echo "<td class='detalle'>". $estado."</td>";
						echo "<td class='detalle'>";
							echo "<form action='verdetalle.php' method='post' target='principal'>";
							echo "<input type='hidden' value='".$nombretk."' name='numero' id:'numero' />";
							echo "<input type='hidden' value='0' name='generado' id:'numero' />";
							echo "<input type='submit' value='Ver Detalle' name='submit'/>";
							echo "</form>";	
						echo "</td>";
					echo "</tr>";
					$bandera = $bandera +1;
			}
			if($bandera == 0) 
			{
				echo "<tr>";
					echo "<td  class='titulo1'colspan='9'>Sin Tickets Activos del Área</Font></td>";
				echo "</tr>";
			}	
		echo "</tbody>";
	echo "  </table>";
}
if($seleccion == 'fechac' )
{
	echo "  <table>";
		echo "<tbody>";
			echo "<tr>";
				echo "<td class='titulo1' colspan='9' align=center><h2>Lista de Tickets asociados a la busqueda</h2</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td class='titulo2' colspan='9' align=center><B>Resultado de la busqueda por fecha de cierre ".$fechac." </B</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td class='titulo2'>Ticket N°</td>";
				echo "<td class='titulo2'>Fecha Obs.</td>";
				echo "<td class='titulo2'>Detectado por</td>";
				echo "<td class='titulo2'>Para el Sector</td>";
				echo "<td class='titulo2'>Accion Inm.</td>";
				echo "<td class='titulo2'>Estado</td>";
				echo "<td class='titulo2'>       </td>";
			echo "</tr>";
			$bandera=0;
			$sentencia1 = "SELECT * FROM cierre WHERE fecha = '".$fechac."'";
			$consulta1 = mysqli_query($iden,$sentencia1);
			while($ticketbuscado = mysqli_fetch_assoc($consulta1)) 
			{
				$sentencia = "SELECT * FROM ticket WHERE nombretk = '".$ticketbuscado['nombretk']."'";
				$consulta = mysqli_query($iden,$sentencia);
				$tkbuscado = mysqli_fetch_assoc($consulta); 
					$nombretk = $tkbuscado['nombretk'];
					$origen = $tkbuscado['origen'];
					$idpersona = $tkbuscado['idpersona'];
					$sectorpersona = $tkbuscado['sectorpersona'];
					$descripcion = $tkbuscado['descripcion'];
					$sectorarea = $tkbuscado['sectorarea'];
					$fecha = $tkbuscado['fecha'];
					$centro = $tkbuscado['centro'];
					$involucrados = $tkbuscado['involucrados'];
					$afecta = $tkbuscado['afecta'];
					$usuafecta = $tkbuscado['usuafecta'];
					$accion = $tkbuscado['accion'];
					$detalleaccion = $tkbuscado['detalleaccion'];
					$estado = $tkbuscado['estado'];
		
					$sentencia1 = 'SELECT * FROM personas WHERE Idpersonas = "' . $idpersona. '"';
					$consulta1 = mysqli_query($iden,$sentencia1);
					$personabuscada = mysqli_fetch_array($consulta1);
					$observador = $personabuscada['nombrepersonas'];
		
					echo "<tr>";
						echo "<td class='detalle'>". $nombretk."</td>";
						echo "<td class='detalle'>".date("d/m/Y", strtotime($fecha))."</td>";
						echo "<td class='detalle'>". $observador." de ".$sectorpersona."</td>";
						echo "<td class='detalle'>". $sectorarea."</td>";
						echo "<td class='detalle'>". $accion."</td>";
						echo "<td class='detalle'>". $estado."</td>";
						echo "<td class='detalle'>";
							echo "<form action='verdetalle.php' method='post' target='principal'>";
							echo "<input type='hidden' value='".$nombretk."' name='numero' id:'numero' />";
							echo "<input type='hidden' value='0' name='generado' id:'numero' />";
							echo "<input type='submit' value='Ver Detalle' name='submit'/>";
							echo "</form>";	
						echo "</td>";
					echo "</tr>";
					$bandera = $bandera +1;
			}
			if($bandera == 0) 
			{
				echo "<tr>";
					echo "<td  class='titulo1'colspan='9'>Sin Tickets Activos del Área</Font></td>";
				echo "</tr>";
			}	
		echo "</tbody>";
	echo "  </table>";
}
?>
</html>