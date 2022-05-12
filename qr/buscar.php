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
                echo "<td colspan='3' class='titulo1'align=center><B>Busqueda de Registros</B></td>";
            echo "</tr>";
            echo "<tr>";
                echo "<td colspan='1' class='titulo2'align=center>Nombre de la Busqueda</td>";
                echo "<td colspan='1' class='titulo2'align=center>Selector</td>";
                echo "<td colspan='1' class='titulo2'align=center>Dato de la busqueda</td>";
            echo "</tr>";
            echo "<tr>";
                echo "<td colspan=1 align=center>Busqueda de Quejas por fecha</td>";
                echo "<td colspan=1 align=center><input id='seleccion' name='seleccion' type='radio' value='fechaq'/></td>";
                    echo "<td colspan=1 align=center><input type='date' name='fechaq'></td>";
            echo "</tr>";
            echo "<tr>";
                echo "<td colspan=1 align=center>Busqueda de Reclamos por fecha</td>";
                echo "<td colspan=1 align=center><input id='seleccion' name='seleccion' type='radio' value='fechar'/></td>";
                    echo "<td colspan=1 align=center><input type='date' name='fechar'></td>";
            echo "</tr>";
            echo "<tr>";
                echo "<td colspan=1 align=center>Busqueda de Felicitaciones por fecha</td>";
                echo "<td colspan=1 align=center><input id='seleccion' name='seleccion' type='radio' value='fechaf'/></td>";
                    echo "<td colspan=1 align=center><input type='date' name='fechaf'></td>";
            echo "</tr>";
            echo "<tr>";
                echo "<td colspan=1 align=center>Busqueda por Área</td>";
                echo "<td colspan=1 align=center><input id='seleccion' name='seleccion' type='radio' value='area'/></td>";
                echo "<td colspan=1 align=center>";
                    echo "<select name='area'>";
                        $sentencia = "SELECT * FROM sector WHERE estado ='1'";
                        $consulta = mysqli_query($iden,$sentencia);
                        while ($valores = mysqli_fetch_array($consulta)) 
						{
                            echo "<option value='".$valores['Idsector']."'>".$valores['nombresector']."</option>";
                        }    
                    echo "</select>";
                echo "</td>";
            echo "</tr>";
            echo "<tr>";
                echo "<td colspan=1 align=center>Busqueda por Alertante</td>";
                echo "<td colspan=1 align=center><input id='seleccion' name='seleccion' type='radio' value='alertante'/></td>";
                echo "<td colspan=1 align=center><input type='text' name='alertante' id='alertante'></td>";
            echo "</tr>";
            echo "<tr>";
                echo "<td colspan=1 align=center>Busqueda por Dirección</td>";
                echo "<td colspan=1 align=center><input id='seleccion' name='seleccion' type='radio' value='direccion'/></td>";
                echo "<td colspan=1 align=center><input type='text' name='direccion' id='direccion'></td>";
            echo "</tr>";
            echo "<tr>";
                echo "<td colspan=1 align=center>Busqueda por Telefono</td>";
                echo "<td colspan=1 align=center><input id='seleccion' name='seleccion' type='radio' value='telefono'/></td>";
                echo "<td colspan=1 align=center><input type='text' name='telefono' id='telefono'></td>";
            echo "</tr>";
            echo "<tr>";
                echo "<td colspan=1 align=center>Busqueda por Involucrado</td>";
                echo "<td colspan=1 align=center><input id='seleccion' name='seleccion' type='radio' value='involucrado'/></td>";
                echo "<td colspan=1 align=center><input type='text' name='involucrado' id='involucrado'></td>";
            echo "</tr>";
            echo "<tr>";
                echo "<td colspan=1 align=center>Busqueda por Tipo de Incidente de Origen</td>";
                echo "<td colspan=1 align=center><input id='seleccion' name='seleccion' type='radio' value='tipo'/></td>";
                echo "<td colspan=1 align=center><input type='text' name='tipo' id='tipo'></td>";
            echo "</tr>";
            echo "<tr>";
                echo "<td colspan=1 align=center>Busqueda por Suceso de Origen</td>";
                echo "<td colspan=1 align=center><input id='seleccion' name='seleccion' type='radio' value='suceso'/></td>";
                echo "<td colspan=1 align=center><input type='text' name='suceso' id='suceso'></td>";
            echo "</tr>";
            echo "<input type='hidden' name='parte' id='parte' value='1'>";
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