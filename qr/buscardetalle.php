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
$parte = $_POST['parte'];
$fechaq=$_POST['fechaq'];
$fechar=$_POST['fechar'];
$fechaf=$_POST['fechaf'];
$area=$_POST['area'];
$alertante=$_POST['alertante'];
$direccion=$_POST['direccion'];
$telefono=$_POST['telefono'];
$involucrado=$_POST['involucrado'];
$tipo=$_POST['tipo'];
$suceso=$_POST['suceso'];

$sentencia = "SELECT * FROM sector WHERE Idsector ='".$area."'";
$consulta = mysqli_query($iden,$sentencia);
$valores = mysqli_fetch_array($consulta);
$area1=$valores['nombresector']; 


if($parte == '1'){
echo "  <table>";
	echo "<tbody>";
		echo "<tr>";
			echo "<td class='titulo1' colspan='12' align=center><h2>Lista de Registros asociados a la busqueda</h2</td>";
		echo "</tr>";
		echo "<tr>";
			if($seleccion == 'fechaq'){
				echo "<td class='titulo2' colspan='12' align=center><B>Resultado de la busqueda de Queja para la fecha: '".date("d/m/Y", strtotime($fechaq))."'</B</td>";
			}	
			if($seleccion == 'fechar'){
				echo "<td class='titulo2' colspan='12' align=center><B>Resultado de la busqueda de Reclamos para la fecha: '".date("d/m/Y", strtotime($fechar))."'</B</td>";
			}	
			if($seleccion == 'fechaf'){
				echo "<td class='titulo2' colspan='12' align=center><B>Resultado de la busqueda de Felicitaciones para la fecha: '".date("d/m/Y", strtotime($fechaf))."'</B</td>";
			}	
			if($seleccion == 'area'){
				echo "<td class='titulo2' colspan='12' align=center><B>Resultado de la busqueda por el área: '".$area1."'</B</td>";
			}	
			if($seleccion == 'alertante'){
				echo "<td class='titulo2' colspan='12' align=center><B>Resultado de la busqueda por Alertante: '".$alertante."'</B</td>";
			}	
			if($seleccion == 'direccion'){
				echo "<td class='titulo2' colspan='12' align=center><B>Resultado de la busqueda por Dirección: '".$direccion."'</B</td>";
			}	
			if($seleccion == 'telefono'){
				echo "<td class='titulo2' colspan='12' align=center><B>Resultado de la busqueda por Telefono: '".$telefono."'</B</td>";
			}	
			if($seleccion == 'involucrado'){
				echo "<td class='titulo2' colspan='12' align=center><B>Resultado de la busqueda por Persona Involucrada: '".$involucrado."'</B</td>";
			}	
			if($seleccion == 'tipo'){
				echo "<td class='titulo2' colspan='12' align=center><B>Resultado de la busqueda por Tipo de Incidente de Origen: '".$tipo."'</B</td>";
			}	
			if($seleccion == 'suceso'){
				echo "<td class='titulo2' colspan='12' align=center><B>Resultado de la busqueda por Suceso de Origen: '".$suceso."'</B</td>";
			}	
			echo "</tr>";
			echo "<tr>";
				echo "<td class='titulo2'>Origen</td>";
				echo "<td class='titulo2'>Fecha - Hora</td>";
				echo "<td class='titulo2'>Tipo</td>";
				echo "<td class='titulo2'>Suceso Origen</td>";
				echo "<td class='titulo2'>Telefono Origen</td>";
				echo "<td class='titulo2'>Tipo Origen</td>";
				echo "<td class='titulo2'>Destinada a</td>";
				echo "<td class='titulo2'>Concepto</td>";
				echo "<td class='titulo2'>Alertante</td>";
				echo "<td class='titulo2'>Domicilio</td>";
				echo "<td class='titulo2'>Estado</td>";
				echo "<td class='titulo2'>       </td>";
			echo "</tr>";
			$bandera=0;
			if($seleccion == 'fechaq'){
				$sentencia = "SELECT * FROM quejas WHERE fechareg = '".$fechaq."' AND tipo='Queja'";
				$consulta = mysqli_query($iden,$sentencia);
			}
			if($seleccion == 'fechar'){
				$sentencia = "SELECT * FROM quejas WHERE fechareg = '".$fechar."' AND tipo='Reclamo'";
				$consulta = mysqli_query($iden,$sentencia);
			}
			if($seleccion == 'fechaf'){
				$sentencia = "SELECT * FROM quejas WHERE fechareg = '".$fechaf."' AND tipo='Felicitación'";
				$consulta = mysqli_query($iden,$sentencia);
			}
			if($seleccion == 'area'){
				$sentencia = "SELECT * FROM quejas WHERE destino = '".$area."'";
				$consulta = mysqli_query($iden,$sentencia);
			}
			if($seleccion == 'alertante'){
				$sentencia = "SELECT * FROM quejas WHERE nombrea LIKE '%".$alertante."%'";
				$consulta = mysqli_query($iden,$sentencia);
			}
			if($seleccion == 'direccion'){
				$sentencia = "SELECT * FROM quejas WHERE domicilio LIKE '%".$direccion."%'";
				$consulta = mysqli_query($iden,$sentencia);
			}
			if($seleccion == 'telefono'){
				$sentencia = "SELECT * FROM quejas WHERE telefono LIKE '%".$telefono."%'";
				$consulta = mysqli_query($iden,$sentencia);
			}
			if($seleccion == 'involucrado'){
				$sentencia = "SELECT * FROM quejas WHERE personai LIKE '%".$involucrado."%'";
				$consulta = mysqli_query($iden,$sentencia);
			}
			if($seleccion == 'tipo'){
				$sentencia = "SELECT * FROM quejas WHERE iorigen LIKE '%".$tipo."%'";
				$consulta = mysqli_query($iden,$sentencia);
			}
			if($seleccion == 'suceso'){
				$sentencia = "SELECT * FROM quejas WHERE suceso LIKE '%".$suceso."%'";
				$consulta = mysqli_query($iden,$sentencia);
			}
			while($buscado = mysqli_fetch_assoc($consulta)) 
			{ 
				$idqrf = $buscado['Idqrf'];
				$nombreqrf = $buscado['nombreqrf'];
				$fechareg = $buscado['fechareg'];
				$horareg = $buscado['horareg'];
				$tipo = $buscado['tipo'];
				$telefono = $buscado['telefono'];
				$iorigen = $buscado['iorigen'];
				$destino = $buscado['destino'];
				$concepto = $buscado['concepto'];
				$nombrea = $buscado['nombrea'];
				$domicilio = $buscado['domicilio'];
				$estado = $buscado['estado'];
				$suceso = $buscado['suceso'];
				$canal = $buscado['canal'];
	
				$sentencia1 = 'SELECT * FROM sector WHERE Idsector = "' . $destino. '"';
				$consulta1 = mysqli_query($iden,$sentencia1);
				$buscada = mysqli_fetch_array($consulta1);
				$sectord = $buscada['nombresector'];
	
				echo "<tr>";
					echo "<td class='detalle'>". $canal."</td>";
					echo "<td class='detalle'>".date("d/m/Y", strtotime($fechareg))." - ".$horareg."</td>";
					echo "<td class='detalle'>". $tipo."</td>";
					echo "<td class='detalle'>". $suceso."</td>";
					echo "<td class='detalle'>". $telefono."</td>";
					echo "<td class='detalle'>". $iorigen."</td>";
					echo "<td class='detalle'>". $sectord."</td>";
					echo "<td class='detalle'>". $concepto."</td>";
					echo "<td class='detalle'>". $nombrea."</td>";
					echo "<td class='detalle'>". $domicilio."</td>";
					echo "<td class='detalle'>". $estado."</td>";
					echo "<td class='detalle'>";
						echo "<form action='verdetalle.php' method='post' target='principal'>";
						echo "<input type='hidden' value='".$idqrf."' name='idqrf' id:'idqrf' />";
						echo "<input type='submit' value='Ver Detalle' name='submit'/>";
						echo "</form>";	
					echo "</td>";
				echo "</tr>";
			$bandera=$bandera +1;
			}
		if($bandera == 0) 
		{
			echo "<tr>";
				echo "<td  class='titulo1'colspan='12'>Sin Registros para mostrar</Font></td>";
			echo "</tr>";
		}	
	echo "</tbody>";
echo "  </table>";
}
if($seleccion == 'fecha' )
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
if($seleccion == 'fecha' )
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