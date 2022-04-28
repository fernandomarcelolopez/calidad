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

$sentencia1 = 'SELECT * FROM personas WHERE usuario = "' . $user. '"';
$consulta1 = mysqli_query($iden,$sentencia1);
$personabuscada = mysqli_fetch_array($consulta1);
$usuario = $personabuscada['Idpersonas'];

$origen = $_POST['origen'];
$nombrepersona = $_POST['nombrepersona'];
$sectorpersona = $_POST['sectorpersona'];
$descripcion = $_POST['descripcion'];
$sectorarea = $_POST['sectorarea'];
$fecha = $_POST['fecha'];
$centro = $_POST['centro'];
$involucrados = $_POST['involucrados'];
$afecta = $_POST['afecta'];
$usuafecta = $_POST['usuafecta'];
$accion = $_POST['accion'];
$detalleaccion = $_POST['detalleaccion'];
 
	
$sentencia = 'SELECT * FROM personas WHERE Idpersonas = "' . $nombrepersona. '"';
$consulta = mysqli_query($iden,$sentencia);
$personabuscada = mysqli_fetch_array($consulta);
$observador = $personabuscada['nombrepersonas'];
$idensector1 = $personabuscada['idsector'];

$sentencia = 'SELECT * FROM sector WHERE Idsector = "' . $idensector1. '"';
$consulta = mysqli_query($iden,$sentencia);
$sectorbuscado = mysqli_fetch_array($consulta);
$sector1 = $sectorbuscado['nombresector'];

$sentencia = 'SELECT * FROM sector WHERE Idsector = "' . $sectorarea. '"';
$consulta = mysqli_query($iden,$sentencia);
$sectorbuscado = mysqli_fetch_array($consulta);
$sector2 = $sectorbuscado['nombresector'];

$sentencia = 'SELECT * FROM control';
$consulta = mysqli_query($iden,$sentencia);
$sncbuscado = mysqli_fetch_array($consulta);
$numerosnc = $sncbuscado['sncnumero'];
$anosnc = $sncbuscado['anosnc'];
  
$fechacontrol = date("y");  
if ($fechacontrol !== $anosnc)
{
	$sentencia = "UPDATE control SET sncnumero= '2', anosnc ='".$fechacontrol."'  WHERE id=1";
	$consulta = mysqli_query($iden,$sentencia);
	$numerosnc = 1;
	$anosnc = $fechacontrol;
}

$nombretk= $numerosnc . "/". $anosnc;

if ($accion == "SI")
{
	$sentencia = "INSERT INTO ticket (nombretk, origen, idpersona, sectorpersona, descripcion, sectorarea, fecha, centro, involucrados, afecta, usuafecta, accion, detalleaccion, estado) VALUES ('".$nombretk."', '".$origen."', '".$nombrepersona."', '".$sector1."', '".$descripcion."', '".$sector2."', '".$fecha."', '".$centro."', '".$involucrados."', '".$afecta."', '".$usuafecta."', '".$accion."', '".$detalleaccion."', 'Sin Respuesta')";
	$consulta = mysqli_query($iden,$sentencia);
}
ELSE
{
	$sentencia = "INSERT INTO ticket (nombretk, origen, idpersona, sectorpersona, descripcion, sectorarea, fecha, centro, involucrados, afecta, usuafecta, accion, estado) VALUES ('".$nombretk."', '".$origen."', '".$nombrepersona."', '".$sector1."', '".$descripcion."', '".$sector2."', '".$fecha."', '".$centro."', '".$involucrados."', '".$afecta."', '".$usuafecta."', '".$accion."', 'Sin Respuesta')";
	$consulta = mysqli_query($iden,$sentencia);
}

$nuevonumero = $numerosnc +1;
$sentencia = "UPDATE control SET sncnumero='".$nuevonumero ."' WHERE id=1";
$consulta = mysqli_query($iden,$sentencia);

echo "<table border='1' style='width: 80%' align='center'>";
    echo "<colgroup>";
        echo "<col style='width: 20%'/>";
        echo "<col style='width: 70%'/>";
    echo "</colgroup>";
    echo "<tbody>";
        echo "<tr>";
            echo "<td class='titulo1' colspan='2'><h2>SU TICKET ES EL N°: ". $nombretk ."</h2></td>";
        echo "</tr>";
        echo "<tr>";
            echo "<td class='titulo2' colspan='1' style='text-align:left'>Origen del Ticket : </td>";
            echo "<td colspan='1' align=left>". $origen . "</td>";
        echo "</tr>";
        echo "<tr>";
            echo "<td class='titulo2' colspan='1' style='text-align:left'>Desvio observado por: </td>";
            echo "<td colspan='1'>". $observador . " del Sector ". $sector1. "</td>";
        echo "<tr>";
        echo "<tr>";
            echo "<td class='titulo2' colspan='1' style='text-align:left'>Descripción de lo observado:</td>";
            echo "<td colspan='1' align=left>". $descripcion ."</td>";
        echo "</tr>";
        echo "<tr>";
            echo "<td class='titulo2' colspan='1' style='text-align:left'>Dirigida al sector:</td>";
            echo "<td colspan='1'>". $sector2. "</td>";
        echo "</tr>";
        echo "<tr>";
            echo "<td class='titulo2' colspan='1' style='text-align:left'>Fecha del desvio:</td>";
            echo "<td colspan='1' align=left>".date("d/m/Y", strtotime($fecha))."</td>";
        echo "</tr>";
        echo "<tr>";
            echo "<td class='titulo2' colspan='1' style='text-align:left'>Centro/Área/Agencia involucrada:</td>";
            echo "<td colspan='2'>". $centro . "</td>";;
        echo "</tr>";
        echo "<tr>";
        echo "<td class='titulo2' colspan='1' style='text-align:left'>A quien/es involucro</td>";
        echo "<td colspan='2'>". $involucrados . "</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td class='titulo2' colspan='1' style='text-align:left'>Afecta al servicio que brindamos - ¿Comó?</td>";
        echo "<td colspan='2'>". $afecta . "</td>";;
        echo "</tr>";
        echo "<tr>";
        echo "<td class='titulo2' colspan='1' style='text-align:left'>A que usuario afecta</td>";
        echo "<td colspan='2'>". $usuafecta . "</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td class='titulo2' colspan='1' style='text-align:left'>Se realizo acción inmediata</td>";
        echo "<td colspan='1' align=left>". $accion ."</td>";
        echo "</tr>";
        if ($accion == "SI")
            {
            echo "<tr>";
                echo "<td colspan='2'>";
                    echo "La Acción realizada fue: ".$detalleaccion;
                echo "</td>";
            echo "</tr>";
            }
//        echo "<form action='send.php?mail=".$mail."' method='post'>";
        echo "<tr>";
            echo "<td colspan='4' align='center'>";
                echo "<input type='submit' value='Continuar' name='submit'/>";
            echo "</td>";
        echo "</tr>";
//        echo "</form>";
    echo "</tbody>";
echo "</table>";
mysqli_close($iden); 
?>
</body> 
</html>