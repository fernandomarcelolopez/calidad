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

$bandera = 0;
 
$user=$_SESSION['usuario'];
$idper=$_SESSION['idper'];
$numerotk=$_POST['numero'];
$justificacion=$_POST['justificacion'];
$fechaaccion10=$_POST['fechaaccion'];
$persona10=$_POST['persona'];
$vaccion10=$_POST['vaccion'];

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
			echo "<td class='titulo2' colspan=1 style='text-align:left'><Font size='6'> Ticket N° ". $numerotk ."</Font></td>";
			echo "<td class='titulo2' colspan=1 style='text-align:right'><font size='6'>Estado: ".$estado."</font></td>";
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

            $sentencia = "SELECT * FROM respuesta WHERE nombretk = '".$numerotk."'"; 
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
                echo "<td colspan=2 class='titulo2'><B>CONCLUSIONES</B></td>";
            echo "</tr>";
            echo "<tr>";
                echo "<td colspan=1 class='titulo2' style='text-align:left'>Conclusión de la causa que origino el desvio</td>";
                echo "<td colspan=1 align=left>".$conclusion."</td>";
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
                $accion = $tkbuscado3['accion'];
                $vaccion = $tkbuscado3['vaccion'];
                if($numeroaccion == 4){
                    echo "<tr>";
                        echo "<td colspan=1 class='titulo2' style='text-align:left'>Control Final de acciones</td>";
                        echo "<td colspan=1 align=left>Realizada el día ".$fechaaccion1." por ".$verificador.", las acciones se cumplieron: ".$vaccion." debido a: ".$accion."</td>";
                    echo "</tr>";
                }
            }

            $sentencia = "INSERT INTO verificaciones (nombretk, justificacion, verificador, fecha, vaccion) VALUES ('".$numerotk."', '".$justificacion."', '".$persona10."', '".$fechaaccion10."', '".$vaccion10."')";
            $consulta = mysqli_query($iden,$sentencia);
        
            $sentencia = "UPDATE ticket SET estado='P/Cierre' WHERE nombretk LIKE '".$numerotk."'";
            $consulta = mysqli_query($iden,$sentencia);

            echo "<tr>";
            echo "<tr>";
                echo "<td class='titulo2' colspan=2><B>REGISTRO DE VERIFICACION DE EFECTIVIDAD</B></h2></td>";
            echo "</tr>";
			echo "<tr>";
				echo "<td colspan=1 class='titulo2' style='text-align:left'>Control Efectividad de las Acciones</td>";
				echo "<td colspan='1' align=left> Las acciones fueron eficaces? ".$vaccion10;
				echo "</td>";
			echo "</tr>";
			echo "<tr>";
                echo "<td colspan=1 class='titulo2' style='text-align:left'>Verificación realizada por</td>";
                echo "<td colspan=1 align=left>".$persona10." el día ".$fechaaccion10."</td>";
			echo "</tr>";
			echo "<tr>";
                echo "<td colspan=1 class='titulo2' style='text-align:left'>Justificación</td>";
                echo "<td colspan=2 align=left>".$justificacion."</td>";
			echo "</tr>";
        echo "<form action='vermiassinres.php' method='post'>";
            echo "<tr>";
                echo "<td colspan='2' align='center'>";
                    echo "<input type='submit' value='VOLVER' name='submit'/>";
                echo "</td>";
            echo "</tr>";
         echo "</form>";
    echo "</tbody>";
echo " </table>";
mysqli_close($iden); 
?>
</body> 
</html>