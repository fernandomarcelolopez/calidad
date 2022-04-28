<!DOCTYPE html > 
<html lang="es"> 
   <head> 
		<title>SGC911Salta</title>
		<link rel="shortcut icon" href="../img/logo911.png"/>
		<link rel="stylesheet" href="../css/tablas.css"/>
   </head> 
<?php
require('../templates/conexioncom.php');
require('../templates/sesioncom.php');

$bandera = 0;
$user=$_SESSION['usuario'];

$sentencia1 = 'SELECT * FROM personas WHERE usuario = "'. $user.'"';
$consulta1 = mysqli_query($iden,$sentencia1);
$personabuscada = mysqli_fetch_array($consulta1);
$usuario = $personabuscada['Idpersonas'];
$idsector = $personabuscada['idsector'];
 
$sentencia = 'SELECT * FROM sector WHERE Idsector = "'. $idsector.'"';
$consulta = mysqli_query($iden,$sentencia);
$sectorbuscada = mysqli_fetch_array($consulta);

$sectora = $sectorbuscada['nombresector'];

echo "<table border='1' align='center'>";
    echo "<tbody>";
        echo "<tr>";
            echo "<td colspan='7' class='titulo1'><h2>Listado de tickets habilitados para Respuesta</h2></td>";
        echo "</tr>";
        echo "<tr>";
            echo "<td class='titulo2'>Ticket N°</td>";
            echo "<td class='titulo2'>Fecha Desvio</td>";
            echo "<td class='titulo2'>Detectado por</td>";
            echo "<td class='titulo2'>Para</td>";
            echo "<td class='titulo2'>Accion Inm.</td>";
//            echo "<td class='titulo2'>Fecha Respuesta</td>";
//            echo "<td class='titulo2'>Respondida por</td>";
//            echo "<td class='titulo2'>Plazo</td>";
            echo "<td class='titulo2'>Estado</td>";
            echo "<td class='titulo2'></td>";
        echo "</tr>";
        $sentencia = "SELECT * FROM ticket WHERE estado = 'Sin Respuesta' AND sectorarea = '".$sectora."'";
        $consulta = mysqli_query($iden,$sentencia);
        while($tkbuscado = mysqli_fetch_assoc($consulta)) 
        { 
            $nombretk = $tkbuscado['nombretk'];
            $fechadesvio = $tkbuscado['fecha'];
            $nombre1 = $tkbuscado['idpersona'];
            $sentencia1 = 'SELECT * FROM personas WHERE Idpersonas = "' . $nombre1. '"';
                $consulta1 = mysqli_query($iden,$sentencia1);
                $personabuscada = mysqli_fetch_array($consulta1);
                $observador = $personabuscada['nombrepersonas'];
                $sectorpersona = $tkbuscado['sectorpersona'];
                $sectorarea = $tkbuscado['sectorarea'];
                $accion = $tkbuscado['accion'];
                $estado = $tkbuscado['estado'];

            echo "<tr>";
                echo "<td class='detalle'>". $nombretk."</td>";
                echo "<td class='detalle'>". date("d/m/Y", strtotime($fechadesvio))."</td>";
                echo "<td class='detalle'>". $observador."/". $sectorpersona."</td>";
                echo "<td class='detalle'>". $sectorarea."</td>";
                echo "<td class='detalle'>". $accion."</td>";
//                echo "<td class='detalle'>". date("d/m/Y", strtotime($fechares))."</td>";
//                echo "<td class='detalle'>". $personarespuesta."</td>";
//                echo "<td class='detalle'>". $plazo." días</td>";
                echo "<td class='detalle'>".$estado."</td>";
                echo "<td class='detalle'>";
                    echo "<form action='respuesta.php' method='post' target='principal'>";
                        echo "<input type='hidden' value='".$nombretk."' name='numero' id:'numero' />";
                        echo "<input type='submit' value='Responder' name='submit'/>";
                    echo "</form>";	
                echo"</td>";
            echo "</tr>";
            $bandera = $bandera +1;
        }
        if($bandera == 0) 
        {
            echo "<tr>";
                echo "<td colspan='10'>Sin Tickets habilitados para Responder de su área</Font></td>";
            echo "</tr>";
        }	

    echo "</tbody>";
echo "</table>";
mysqli_close($iden); 
?>
</html> 