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

echo "<form action='buscardetalle.php' method='post'>";
    echo "<table border='1' align='center'>";
        echo "<colgroup>";
            echo "<col style='width: 40%'/>";
            echo "<col style='width: 10%'/>";
            echo "<col style='width: 50%'/>";
        echo "</colgroup>";
        echo "<tbody>";
            echo "<tr>";
                echo "<td colspan='3' class='titulo1'align=center><B>Busqueda de Tickets</B></td>";
            echo "</tr>";
            echo "<tr>";
                echo "<td colspan='1' class='titulo2'align=center>Nombre de la Busqueda</td>";
                echo "<td colspan='1' class='titulo2'align=center>Selector</td>";
                echo "<td colspan='1' class='titulo2'align=center>Dato de la busqueda</td>";
            echo "</tr>";
                echo "<tr>";
                    echo "<td colspan=1 align=center>Busqueda por número de ticket</td>";
                    echo "<td colspan=1 align=center><input id='seleccion' name='seleccion' type='radio' value='numero'/></td>";
                        echo "<td colspan=1 align=center><input type='text' name='numero'>/<input type='text' name='ano' size='5'></td>";
                echo "</tr>";
                echo "<tr>";
                    echo "<td colspan=1 align=center>Busqueda por nombre del Observador</td>";
                    echo "<td colspan=1 align=center><input id='seleccion' name='seleccion' type='radio' value='nombreo'/></td>";
                    echo "<td colspan=1 align=center>";
                        echo "<select name='nombreo'>";
                        $sentencia = "SELECT * FROM personas WHERE estado ='1'";
                        $consulta = mysqli_query($iden,$sentencia);
                        while ($valores = mysqli_fetch_array($consulta)) 
						{
                            echo "<option value='".$valores[Idpersonas]."'>".$valores['nombrepersonas']."</option>";
                        }    
                        echo "</select>";
                    echo "</td>";
                echo "</tr>";
                echo "<tr>";
                    echo "<td colspan=1 align=center>Busqueda por Área generadora</td>";
                    echo "<td colspan=1 align=center><input id='seleccion' name='seleccion' type='radio' value='areag'/></td>";
                    echo "<td colspan=1 align=center>";
                        echo "<select name='areag'>";
                        $sentencia = "SELECT * FROM sector WHERE estado ='1'";
                        $consulta = mysqli_query($iden,$sentencia);
                        while ($valores = mysqli_fetch_array($consulta)) 
						{
                            echo "<option value='".$valores['nombresector']."'>".$valores['nombresector']."</option>";
                        }    
                        echo "</select>";
                    echo "</td>";
                echo "</tr>";
                echo "<tr>";
                    echo "<td colspan=1 align=center>Busqueda por Área de destino</td>";
                    echo "<td colspan=1 align=center><input id='seleccion' name='seleccion' type='radio' value='aread'/></td>";
                    echo "<td colspan=1 align=center>";
                        echo "<select name='aread'>";
                        $sentencia = "SELECT * FROM sector WHERE estado ='1'";
                        $consulta = mysqli_query($iden,$sentencia);
                        while ($valores = mysqli_fetch_array($consulta)) 
						{
                            echo "<option value='".$valores['nombresector']."'>".$valores['nombresector']."</option>";
                        }    
                        echo "</select>";
                    echo "</td>";
                echo "</tr>";
                echo "<tr>";
                    echo "<td colspan=1 align=center>Busqueda por fecha del desvio</td>";
                    echo "<td colspan=1 align=center><input id='seleccion' name='seleccion' type='radio' value='fechad'/></td>";
                    echo "<td colspan=1 align=center><input type='date' name='fechad' id='fechad'></td>";
                echo "</tr>";
                echo "<tr>";
                    echo "<td colspan=1 align=center>Busqueda por fecha de la respuesta</td>";
                    echo "<td colspan=1 align=center><input id='seleccion' name='seleccion' type='radio' value='fechar'/></td>";
                    echo "<td colspan=1 align=center><input type='date' name='fechar' id='fechar'></td>";
                echo "</tr>";
                echo "<tr>";
                    echo "<td colspan=1 align=center>Busqueda por fecha de cierre</td>";
                    echo "<td colspan=1 align=center><input id='seleccion' name='seleccion' type='radio' value='fechac'/></td>";
                    echo "<td colspan=1 align=center><input type='date' name='fechac' id='fechac'></td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td colspan='3' align='center'>";
                    echo "<input type='submit' value='BUSCAR' name='submit'/>";
                echo "</td>";
            echo "</tr>";
        echo "</tbody>";
    echo "</table>";
echo "</form>";
?>
</html>