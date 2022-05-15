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
            echo "QR-F a mi área<br>";
                echo "<form action='vermissuger.php' method='get' target='principal'>";
                    echo "<input type='submit' value='Sugerencias sin tratar' name='submit'/><br>";
                echo "</form>";
                echo "<form action='vertodas.php' method='get' target='principal'>";
                    echo "<input type='submit' value='Todos las Sugerencias' name='submit'/><br>";
                echo "</form>";
        echo "</td>";
    echo "</tr>";
    echo "<tr>";
        echo "<td>";
            echo "Acciones<br>";
                echo "<form action='alta.php' method='get' target='principal'>";
                    echo "<input type='submit' value='Cargar Sugerencias' name='submit'/><br>";
                echo "</form>";
                echo "<form action='tratar.php' method='get' target='principal'>";
                    echo "<input type='submit' value='Carga Tratamiento' name='submit'/><br>";
                echo "</form>";
                echo "<form action='efectividad.php' method='get' target='principal'>";
                    echo "<input type='submit' value='Verificar efectividad' name='submit'/><br>";
                echo "<form action='cerrar.php' method='get' target='principal'>";
                    echo "<input type='submit' value='Cerrar' name='submit'/><br>";
        echo "</form>";
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
            echo "<form action='listaractivas.php' method='get' target='principal'>";
                echo "<input type='submit' value='Listar Registros activos' name='submit'/><br>";
            echo "</form>";
            echo "<form action='../templates/constructor.php' method='get' target='principal'>";
            IF($perfil == 2){
                echo "<input type='submit' value='Estadisticas' name='submit'/><br>";
            }
            ELSE{
                echo "<input type='submit' value='Estadisticas' name='submit'/ disabled><br>";
            }
            echo "</form>";
            echo "<form action='datosreg.php' method='get' target='principal'>";
            IF($perfil == 2){
                echo "<input type='submit' value='Registradores' name='submit'/><br>";
            }
            ELSE{
                echo "<input type='submit' value='Registradores' name='submit'/ disabled><br>";
            }
            echo "</form>";
        echo "</td>";
    echo "</tr>";
echo "</table>";
?>
</html> 
