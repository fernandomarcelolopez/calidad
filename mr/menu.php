<!DOCTYPE html > 
<html lang="es"> 
   <head> 
    <title>SGC911Salta</title>
    <link rel="shortcut icon" href="../img/logo911.png"/>
   </head> 
<?php
require('../templates/conexioncom.php');
require('../templates/sesioncom.php');

$perfil=$_SESSION['perfil'];
echo "<table>";
    echo "<tr>";
        echo "<td>";
            echo "Novedades<br>";
                echo "<form action='generales.php' method='get' target='principal'>";
                    echo "<input type='submit' value='A todos' name='submit'/><br>";
                echo "</form>";
                echo "<form action='sector.php' method='get' target='principal'>";
                    echo "<input type='submit' value='A mi Sector' name='submit'/><br>";
                echo "</form>";
                echo "<form action='personales.php' method='get' target='principal'>";
                    echo "<input type='submit' value='A mi' name='submit'/><br>";
                echo "</form>";
        echo "</td>";
    echo "</tr>";
    echo "<tr>";
        echo "<td>";
            echo "Acciones<br>";
                echo "<form action='alta.php' method='get' target='principal'>";
                    echo "<input type='submit' value='Cargar Novedad' name='submit'/><br>";
                echo "</form>";
                echo "<form action='responder.php' method='get' target='principal'>";
                    echo "<input type='submit' value='Registrar Acciones' name='submit'/><br>";
        echo "</td>";
    echo "</tr>";
    echo "<tr>";
        echo "<td>Consultas<br>";
            echo "<form action='buscar.php' method='get' target='principal'>";
                echo "<input type='submit' value='Buscar' name='submit'/><br>";
            echo "</form>";
            echo "<form action='listartodas.php' method='get' target='principal'>";
                echo "<input type='submit' value='Listar todos los Registros' name='submit'/><br>";
            echo "</form>";
            echo "<form action='../templates/constructor.php' method='get' target='principal'>";
            IF($perfil == 2){
                echo "<input type='submit' value='Estadisticas' name='submit'/><br>";
            }
            ELSE{
                echo "<input type='submit' value='Estadisticas' name='submit'/ disabled><br>";
            }
            echo "</form>";
        echo "</td>";
    echo "</tr>";
echo "</table>";
?>
</html> 
