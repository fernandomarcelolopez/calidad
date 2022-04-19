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
$numerotk=$_POST['numero'];
$generado=$_POST['generado'];

$sentencia = "SELECT * FROM ticket WHERE nombretk = '".$numerotk."'"; 
$resultado = mysqli_query($iden,$sentencia); 
$tkbuscado = mysqli_fetch_assoc($resultado); 

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
$persona = $personabuscada['nombrepersonas'];
 
echo "<table border='1' align='center'>";
	echo "<colgroup>";
		echo "<col width='20%'/>";
		echo "<col width='70%'/>";
	echo "</colgroup>";
	echo "<thead>";
	echo "</thead>";
	echo "<tbody>";
		echo "<tr>";
			echo "<td class='titulo1'colspan=2 align=center><h2>DETALLE DEL TICKET</h2></td>";
		echo "</tr>";
		echo "<tr>";
			echo "<td class='titulo2' colspan=1 style='text-align:left'><Font size='6'> Ticket N° ". $numerotk ."</Font></td>";
			echo "<td class='titulo2' colspan=1 style='text-align:right'><font size='6'>Estado: ". $estado ."</font></td>";
		echo "</tr>";
		echo "<tr>";
		echo "<td class='titulo2' colspan='1' style='text-align:left'>Origen del Desvio</td>";
		echo "<td colspan='1' align=left>". $origen. "</td>";
		echo "</tr>";
		echo "<tr>";
			echo "<td class='titulo2' colspan=2 align=center><B>DATOS DEL OBSERVADOR</B></td>";
		echo "</tr>";
		echo "<tr>";
			echo "<td  class='titulo2' colspan='1' style='text-align:left'>Desvio observado por </td>";
			echo "<td colspan='1' align=left>".$persona." del Sector ".$sectorpersona."</td>";
		echo "</tr>";
		echo "<tr>";
			echo "<td  class='titulo2' colspan='1' style='text-align:left'>Dirigido al Sector </td>";
			echo "<td colspan='1' align=left>".$sectorarea."</td>";
		echo "</tr>";
		echo "<tr>";
			echo "<td class='titulo2' colspan='1' style='text-align:left'>Fecha del desvio</td>";
			echo "<td colspan='1' align=left>".date("d/m/Y", strtotime($fecha))."</td>";
		echo "</tr>";
		echo "<tr>";
			echo "<td class='titulo2' colspan=2 align=center><B>DESCRIPCION DEL DESVIO</B></td>";
		echo "</tr>";
		echo "<tr>";
			echo "<td colspan='2' align=left>". $descripcion . "</td>";
		echo "</tr>";
		echo "<tr>";
			echo "<td class='titulo2' colspan=2 align=center><B>DETALLE DEL DEVIO</B></td>";
		echo "</tr>";
		echo "<tr>";
			echo "<td class='titulo2' colspan='1' style='text-align:left'>Centro/Área/Agencia Involucrada</td>";
			echo "<td colspan='1' align=left>".$centro."</td>";
		echo "</tr>";
		echo "<tr>";
			echo "<td class='titulo2' colspan='1' style='text-align:left'>A Quien/es Involucro</td>";
			echo "<td colspan='1' align=left>".$involucrados."</td>";
		echo "</tr>";
		echo "<tr>";
			echo "<td class='titulo2' colspan='1' style='text-align:left'>Afecta al Servicio que Brindamos - ¿Comó?</td>";
			echo "<td colspan='1' align=left>".$afecta."</td>";
		echo "</tr>";
		echo "<tr>";
			echo "<td class='titulo2' colspan='1' style='text-align:left'>A que Uusario Afecta</td>";
			echo "<td colspan='1' align=left>".$usuafecta."</td>";
		echo "</tr>";
		echo "<tr>";
			echo "<td class='titulo2'colspan=2 align=center><B>RESPUESTA INMEDIATA AL DESVIO</B></td>";
		echo "</tr>";
		echo "<tr>";
			echo "<td class='titulo2' colspan='1' style='text-align:left'>Acción inmediata</td>";
			echo "<td colspan='1' align=left>";
				if ($accion == "SI")
					{
					echo "". $detalleaccion . "</td>";
					}
				if ($accion == "NO")
					{
					echo "No fue nesesario/posible</td>";
					}
		echo "</tr>";


//mostrar si ya esta respondida
IF ($estado == 'Respondida' OR $estado == 'P/Controlar' OR $estado == 'P/Verificar' OR$estado == 'P/Cierre' OR $estado == 'Cerrado' OR $estado == 'Prorrogado')
{
	$sentencia = "SELECT * FROM respuesta WHERE nombretk ='".$numerotk."'"; 
	$resultado = mysqli_query($iden,$sentencia); 
  	$tkbuscado = mysqli_fetch_assoc($resultado); 

	$fecharespuesta = $tkbuscado['fecharespuesta'];
	$personarespuesta = $tkbuscado['personarespuesta'];
	$ac1 = $tkbuscado['ac1'];
	$ac2 = $tkbuscado['ac2'];
	$ac3 = $tkbuscado['ac3'];
	$ac4 = $tkbuscado['ac4'];
	$ac5 = $tkbuscado['ac5'];
	$conclusion = $tkbuscado['conclusion'];
	$elemento = $tkbuscado['elemento'];
	$impactoproceso = $tkbuscado['impactoproceso'];
	$impactopuntonorma = $tkbuscado['impactopuntonorma'];
	$ap1 = $tkbuscado['ap1'];
	$ap2 = $tkbuscado['ap2'];
	$ap3 = $tkbuscado['ap3'];
	$ap4 = $tkbuscado['ap4'];
	$plazo = $tkbuscado['plazo'];
	$responsable = $tkbuscado['responsable'];
  
	echo "<table border='1' align='center'>";
		echo "<colgroup>";
			echo "<col style='width: 20%'/>";
			echo "<col style='width: 70%'/>";
		echo "</colgroup>";
		echo "<tbody>";
			echo "<tr>";
				echo "<td class='titulo2' colspan=2><B>RESPUESTA</B></td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td colspan=1 class='titulo2' style='text-align:left'>Fecha de respuesta </td>";
				echo "<td colspan=1 align=left>".date("d/m/Y", strtotime($fecharespuesta))."</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td colspan=1 class='titulo2' style='text-align:left'>Autor de la respuesta </td>";
				echo "<td colspan=1 align=left>".$personarespuesta."</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td colspan=2 class='titulo2' align=left><B>ANALISIS DE LAS CAUSAS POR MEDIO DE LA HERRAMIENTA 5W (5 PORQUES)</B></td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td colspan=1 class='titulo2' style='text-align:left'>1.- ¿Por qué? </td>";
				echo "<td colspan=1 align=left>".$ac1."</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td colspan=1 class='titulo2' style='text-align:left'>2.- ¿Por qué? </td>";
				echo "<td colspan=1 align=left>".$ac2."</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td colspan=1 class='titulo2' style='text-align:left'>3.- ¿Por qué? </td>";
				echo "<td colspan=1 align=left>".$ac3."</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td colspan=1 class='titulo2' style='text-align:left'>4.- ¿Por qué? </td>";
				echo "<td colspan=1 align=left>".$ac4."</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td colspan=1 class='titulo2' style='text-align:left'>5.- ¿Por qué? </td>";
				echo "<td colspan=1 align=left>".$ac5."</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td colspan=2 class='titulo2'><B>CONCLUSIONES</B></td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td colspan=1 class='titulo2' style='text-align:left'>Conclusión de la causa que origino el desvio</td>";
				echo "<td colspan=1 align=left>".$conclusion."</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td colspan=1 class='titulo2' style='text-align:left'>Elemento que provoco el desvio</td>";
				echo "<td colspan=1 align=left>".$elemento."</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td colspan=1 class='titulo2' style='text-align:left'>Proceso/s en el que impacto</td>";
				echo "<td colspan=1 align=left>".$impactoproceso."</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td colspan=1 class='titulo2' style='text-align:left'>Punto/s de la Norma en los que impacto</td>";
				echo "<td colspan=1 align=left>".$impactopuntonorma."</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td colspan=2 class='titulo2'><B>ACCIONES A TOMAR</B></td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td colspan=1 class='titulo2' style='text-align:left'>Acción 1.-</td>";
				echo "<td colspan=1 align=left>".$ap1."</td>";
			echo "</tr>";
			If($ap2<>''){
				echo "<tr>";
					echo "<td colspan=1 class='titulo2' style='text-align:left'>Acción 2.-</td>";
					echo "<td colspan=1 align=left>".$ap2."</td>";
				echo "</tr>";
			}
			If($ap3<>''){
				echo "<tr>";
					echo "<td colspan=1 class='titulo2' style='text-align:left'>Acción 3.-</td>";
					echo "<td colspan=1 align=left>".$ap3."</td>";
				echo "</tr>";
			}
			If($ap4<>''){
				echo "<tr>";
					echo "<td colspan=1 class='titulo2' style='text-align:left'>Acción 4.-</td>";
					echo "<td colspan=1 align=left>".$ap4."</td>";
				echo "</tr>";
			}
			echo "<tr>";
				echo "<td colspan=1 class='titulo2' style='text-align:left'>Resposable/s de la/s acción/es</td>";
				echo "<td colspan=1 align=left>Nombre y Apellido : ".$responsable."</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td colspan=1 class='titulo2' style='text-align:left'>Plazo de ejecución</td>";
				echo "<td colspan=1> El plazo es de ".$plazo." días</td>";
			echo "</tr>";
}

IF ($estado == 'P/Controlar' OR $estado == 'P/Verificar' OR $estado == 'P/Cierre' OR $estado == 'Cerrado')
{
			echo "<tr>";
				echo "<td class='titulo2' colspan=2><B>REGISTRO DE CONTROL DE ACCIONES</B></td>";
			echo "</tr>";
			$sentencia3 = "SELECT * FROM acciones WHERE nombretk ='".$numerotk."'"; 
			$resultado3 = mysqli_query($iden,$sentencia3); 
			while($tkbuscado3 = mysqli_fetch_assoc($resultado3)) 
			{ 
				$fechaaccion1 = $tkbuscado3['fechaaccion'];
				$verificador = $tkbuscado3['verificador'];
				$numeroaccion = $tkbuscado3['numeroaccion'];
				$vaccion = $tkbuscado3['vaccion'];
				$accion = $tkbuscado3['accion'];
				if($numeroaccion < 4){
					echo "<tr>";
						echo "<td colspan=1 class='titulo2' style='text-align:left'>Control de acciones N° ".$numeroaccion." </td>";
						echo "<td colspan=1 align=left>Realizada el día ".$fechaaccion1." por ".$verificador.", con este resultado: ".$accion."</td>";
					echo "</tr>";
				}
				if($numeroaccion == 4){
					echo "<tr>";
						echo "<td colspan=1 class='titulo2' style='text-align:left'>Control Final de acciones</td>";
						echo "<td colspan=1 align=left>Realizada el día ".$fechaaccion1." por ".$verificador.", las acciones se cumplieron: ".$vaccion." debido a: ".$accion."</td>";
					echo "</tr>";
				}
			}
}

If ($estado == 'P/Cierre' OR $estado == 'Cerrado')
{
			echo "<tr>";
			echo "<tr>";
				echo "<td class='titulo2' colspan=2><B>REGISTRO DE VERIFICACION DE EFECTIVIDAD</B></h2></td>";
			echo "</tr>";
			$sentencia = "SELECT * FROM verificaciones WHERE nombretk ='".$numerotk."'"; 
			$consulta = mysqli_query($iden,$sentencia); 
			while ($valores = mysqli_fetch_array($consulta)) 
			{
				$justificacion10 = $valores['justificacion'];
				$verificador10 = $valores['verificador'];
				$fecha10 = $valores['fecha'];
				$vaccion10 = $valores['vaccion'];
				echo "<tr>";
					echo "<td colspan=1 class='titulo2' style='text-align:left'>Control Efectividad de las Acciones</td>";
					echo "<td colspan='1' align=left> Las acciones fueron eficaces? ".$vaccion10;
					echo "</td>";
				echo "</tr>";
				echo "<tr>";
					echo "<td colspan=1 class='titulo2' style='text-align:left'>Verificación realizada por</td>";
					echo "<td colspan=1 align=left>".$verificador10." el día ".$fecha10."</td>";
				echo "</tr>";
				echo "<tr>";
					echo "<td colspan=1 class='titulo2' style='text-align:left'>Justificación</td>";
					echo "<td colspan=2 align=left>".$justificacion10."</td>";
				echo "</tr>";
			}
}

If ($estado == 'Cerrado')
{
		$sentencia = "SELECT * FROM cierre WHERE nombretk ='".$numerotk."'"; 
		$consulta = mysqli_query($iden,$sentencia); 
		$tkbuscado = mysqli_fetch_assoc($consulta); 

		$cerrador = $tkbuscado['cerrador'];
		$fechacierre = $tkbuscado['fecha'];
		$vaccion11 = $tkbuscado['vaccion'];
		$acciones = $tkbuscado['acciones'];
		$observacioncierre = $tkbuscado['observacioncierre'];

				echo "<tr>";
					echo "<td class='titulo2' colspan=2><b>REGISTRO DE CIERRE</b></td>";
				echo "</tr>";
				echo "<tr>";
				echo "<td colspan=1 class='titulo2' style='text-align:left'>Cierre realizado por</td>";
				echo "<td colspan='1' align=left>".$cerrador." el día ".date("d/m/Y", strtotime($fechacierre));
				echo "</tr>";
				echo "<tr>";
					echo "<td colspan=1 class='titulo2' style='text-align:left'>Control Cierre del Ticket</td>";
					echo "<td colspan='1' align=left>Se requiere de otras acciones? ".$vaccion11 ;
					echo "</td>";
				echo "</tr>";
				echo "<tr>";
					echo "<td colspan=1 class='titulo2' style='text-align:left'>Que acciones corresponden</td>";
					echo "<td colspan='1' align=left>".$acciones;
					echo "</td>";
				echo "</tr>";
				echo "<tr>";
					echo "<td colspan=1 class='titulo2' style='text-align:left'>Comentarios u Observaciones</td>";
					echo "<td colspan=1 align=left>".$observacioncierre."</td>";
				echo "</tr>";
}
	echo "</tbody>";
echo "</table>";
echo "<table border='0' align='center'>";
	echo "<colgroup>";
		echo "<col width='50%'/>";
		echo "<col width='50%'/>";
	echo "</colgroup>";
	echo "<tbody>";
		echo "<tr>";
			echo "<td colspan='1' align='right'>";
			IF ($estado == 'Sin Respuesta' AND $generado=='0')
			{
				echo "<form action='respuesta.php' method='post' target='principal'>";
					echo "<input type='hidden' value='".$numerotk."' name='numero' id:'numero' />";
					echo "<input type='submit' value='Responder' name='submit'/>";
				echo "</form>";	
			}
			echo "</td>";
			echo "<td colspan='1' align='Left'>";
				echo "<form action='vermiassinres.php' method='post' target='principal'>";
					echo "<input type='submit' value='Salir' name='submit'/>";
				echo "</form>";	
			echo "</td>";
		echo "</tr>";
	echo "</tbody>";
echo "</table>";

mysqli_close($iden); 

?>
</html> 
