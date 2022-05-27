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
                echo "<td colspan=1 align=center>Busqueda de Sugerencias por fecha</td>";
                echo "<td colspan=1 align=center><input id='seleccion' name='seleccion' type='radio' value='fecha'/></td>";
                    echo "<td colspan=1 align=center><input type='date' name='fecha'></td>";
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
                echo "<td colspan=1 align=center>Busqueda por Informante</td>";
                echo "<td colspan=1 align=center><input id='seleccion' name='seleccion' type='radio' value='informante'/></td>";
                echo "<td colspan=1 align=center>";
                    echo "<select name='informante'>";
                        $sentencia = "SELECT * FROM personas WHERE estado ='1'";
                        $consulta = mysqli_query($iden,$sentencia);
                        while ($valores = mysqli_fetch_array($consulta)) 
						{
                            echo "<option value='".$valores['Idpersonas']."'>".$valores['nombrepersonas']."</option>";
                        }    
                    echo "</select>";
                echo "</td>";
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