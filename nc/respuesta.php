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
$nombreper=$_SESSION['nombre'];

$sentencia1 = 'SELECT * FROM personas WHERE usuario = "' . $user. '"';
$consulta1 = mysqli_query($iden,$sentencia1);
$personabuscada = mysqli_fetch_array($consulta1);
$usuario = $personabuscada['Idpersonas'];


$numerotk=$_POST['numero'];

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
//		echo "<tr>";
//			echo "<td class='titulo1'colspan=2 align=center><h2>DETALLE DEL TICKET</h2></td>";
//		echo "</tr>";
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
			echo "<td class='titulo2' colspan='1' style='text-align:left'>Fecha del desvio</td>";
			echo "<td colspan='1' align=left>".date("d/m/Y", strtotime($fecha))."</td>";
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
    echo "</tbody>";
echo "</table>";

echo "<br>";
        $fechadehoy = date("Y"). "-" .date("m"). "-" .date("d");  

echo "<form action='crearespuesta.php' method='post'>";
    echo "<table border='1' align='center'>";
        echo "<colgroup>";
            echo "<col style='width: 20%'/>";
            echo "<col style='width: 70%'/>";
        echo "</colgroup>";
        echo "<tbody>";
            echo "<tr>";
                echo "<td class='titulo1' colspan=2><h2>REGISTRO DE RESPUESTA</h2></td>";
                echo "<input type='hidden' id='fecharespuesta' name='fecharespuesta' value='".$fechadehoy."'readonly/>  ";
            echo "</tr>";
            echo "<tr>";
                echo "<td colspan=2 class='titulo2' align=left><B>ANALISIS DE LAS CAUSAS POR MEDIO DE LA HERRAMIENTA 5W (5 PORQUES)</B></td>";
            echo "</tr>";
            echo "<tr>";
                echo "<td colspan=2 align=left>Responder siguiendo el orden de los porqués. El primer porque debe ser completado con los datos del problema observado; los siguientes, siempre con la respuesta del anterior.</td>";
            echo "</tr>";
            echo "<tr>";
                echo "<td colspan=1 class='titulo2' style='text-align:left'>1.- ¿Por qué? </td>";
                echo "<td colspan=1 align=left><textarea name='ac1' rows='2' cols='130' required maxlength='260' placeholder='Escribe aqui el problema observado'></textarea></td>";
            echo "</tr>";
            echo "<tr>";
                echo "<td colspan=1 class='titulo2' style='text-align:left'>2.- ¿Por qué? </td>";
                echo "<td colspan=1 align=left><textarea name='ac2' rows='2' cols='130' required  maxlength='260' placeholder='Escribe aqui la respuesta a la pregunta anterior'></textarea></td>";
            echo "</tr>";
            echo "<tr>";
                echo "<td colspan=1 class='titulo2' style='text-align:left'>3.- ¿Por qué? </td>";
                echo "<td colspan=1 align=left><textarea name='ac3' rows='2' cols='130' required  maxlength='260' placeholder='Escribe aqui la respuesta a la pregunta anterior'></textarea></td>";
            echo "</tr>";
            echo "<tr>";
                echo "<td colspan=1 class='titulo2' style='text-align:left'>4.- ¿Por qué? </td>";
                echo "<td colspan=1 align=left><textarea name='ac4' rows='2' cols='130' required  maxlength='260' placeholder='Escribe aqui la respuesta a la pregunta anterior'></textarea></td>";
            echo "</tr>";
            echo "<tr>";
                echo "<td colspan=1 class='titulo2' style='text-align:left'>5.- ¿Por qué? </td>";
                echo "<td colspan=1 align=left><textarea name='ac5' rows='2' cols='130' required  maxlength='260' placeholder='Escribe aqui la respuesta a la pregunta anterior'></textarea></td>";
            echo "</tr>";
            echo "<tr>";
                echo "<td colspan=2 class='titulo2'><B>CONCLUSIONES</B></td>";
            echo "</tr>";
            echo "<tr>";
                echo "<td colspan=1 class='titulo2' style='text-align:left'>Conclusión de la causa que origino el desvio</td>";
                echo "<td colspan=1 align=left><textarea name='conclusion' rows='4' cols='130' maxlength='500' placeholder='Escribe aqui la conclusión sobre la causa que origino el desvio observado'></textarea></td>";
            echo "</tr>";
            echo "<tr>";
                    echo "<td colspan=1 class='titulo2' style='text-align:left'>Elemento que provoco el desvio</td>";
                    echo "<td colspan=1> ";
                    echo "<select name='elemento'>";
                        echo "<option value='Persona'>Se ejecuto mal el proceso/procedimiento</option>";
                        echo "<option value='Metodo'>El proceso/procedimiento se encuentra equivocado o requiere cambios</option>";
                        echo "<option value='Maquina'>Los equipamiento/herramienta impidieron llevar adelante el proceso/procedimiento correctamente</option>";
                        echo "<option value='Entorno'>El Entorno/Medio Ambiente/Edilicio impidió llevar adelante el proceso/procedimiento correctamente</option>";
                    echo "</select>";
                echo "</td>";
            echo "</tr>";
            echo "<tr>";
                echo "<td colspan=1 class='titulo2' style='text-align:left'>Proceso/s en el que impacto</td>";
                echo "<td colspan=1 align=left><input type='text' id='impactoproceso' name='impactoproceso' required maxlength='110' size='130' placeholder='Describe aqui el o los procesos a los que afecto el desvio'></td>";
            echo "</tr>";
            echo "<tr>";
                echo "<td colspan=1 class='titulo2' style='text-align:left'>Punto/s de la Norma en los que impacto</td>";
                echo "<td colspan=1 align=left><input type='text' id='impactopuntonorma' name='impactopuntonorma' required maxlength='110' size='130' placeholder='Describe aqui el o los puntos de la norma ISO 9001 a los que afecto el desvio'></td>";
            echo "</tr>";
            echo "<tr>";
                echo "<td colspan=2 class='titulo2'><B>ACCIONES A TOMAR</B></td>";
            echo "</tr>";
            echo "<tr>";
                echo "<td colspan=1 class='titulo2' style='text-align:left'>Acción 1.-</td>";
                echo "<td colspan=1 align=left><textarea name='ap1' rows='2' cols='130' required maxlength='260' placeholder='Escribe aqui la acción que realizara para evitar que este desvio vuelva a suceder'></textarea></td>";
            echo "</tr>";
            echo "<tr>";
                echo "<td colspan=1 class='titulo2' style='text-align:left'>Acción 2.-</td>";
                echo "<td colspan=1 align=left><textarea name='ap2' rows='2' cols='130' maxlength='260' placeholder='Escribe aqui la acción que realizara para evitar que este desvio vuelva a suceder'></textarea></td>";
            echo "</tr>";
            echo "<tr>";
                echo "<td colspan=1 class='titulo2' style='text-align:left'>Acción 3.-</td>";
                echo "<td colspan=1 align=left><textarea name='ap3' rows='2' cols='130' maxlength='260' placeholder='Escribe aqui la acción que realizara para evitar que este desvio vuelva a suceder'></textarea></td>";
            echo "</tr>";
            echo "<tr>";
                echo "<td colspan=1 class='titulo2' style='text-align:left'>Acción 4.-</td>";
                echo "<td colspan=1 align=left><textarea name='ap4' rows='2' cols='130' maxlength='260' placeholder='Escribe aqui la acción que realizara para evitar que este desvio vuelva a suceder'></textarea></td>";
            echo "</tr>";
            echo "<tr>";
                echo "<td colspan=1 class='titulo2' style='text-align:left'>Resposable/s de la/s acción/es</td>";
                echo "<td colspan=1 align=left>Nombre y Apellido : <input type='text' id='responsable' name='responsable' required maxlength='50' size='110' placeholder='Detalla la o las personas responsables de llevar adelante las aciones'></td>";
            echo "</tr>";
            echo "<tr>";
                echo "<td colspan=1 class='titulo2' style='text-align:left'>Plazo de ejecución</td>";
                echo "<td colspan=1> El plazo es de ";
                    echo "<select name='plazo'>";
                        echo "<option value='10'>10 dias</option>";
                        echo "<option value='15'>15 dias</option>";
                        echo "<option value='20'>20 dias</option>";
                        echo "<option value='25'>25 dias</option>";
                        echo "<option value='30'>30 dias</option>";
                        echo "<option value='35'>35 dias</option>";
                        echo "<option value='40'>40 dias</option>";
                        echo "<option value='45'>45 dias</option>";
                        echo "<option value='50'>50 dias</option>";
                        echo "<option value='55'>55 dias</option>";
                        echo "<option value='60'>60 dias</option>";
                    echo "</select>";
                echo "</td>";
            echo "</tr>";
                echo "<input type='hidden' value='".$numerotk."' name='numero' id:'numero' />";
            echo "<tr>";
                echo "<td colspan='2' align='center'>";
                    echo "<input type='submit' value='CARGAR RESPUESTAS' name='submit'/>";
                echo "</td>";
            echo "</tr>";
        echo "</tbody>";
    echo " </table>";
echo "</form>";
mysqli_close($iden); 
?>
</body> 
</html>