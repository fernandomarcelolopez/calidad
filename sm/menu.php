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
            echo "Mis Acciones<br>";
            echo "<form action='alta.php' method='get' target='principal'>";
                echo "<input type='submit' value='Crear Sugerencias' name='submit'/><br>";
            echo "</form>";
            echo "<form action='vermissuger.php' method='get' target='principal'>";
                echo "<input type='submit' value='Mis Sugerencias' name='submit'/><br>";
            echo "</form>";
        echo "</td>";
    echo "</tr>";
    IF($perfil == 2){
        echo "<tr>";
        echo "<td>";
            echo "Sugerencias<br>";
                echo "<form action='versuger.php' method='get' target='principal'>";
                    echo "<input type='submit' value='Sugerencias sin tratar' name='submit'/><br>";
                echo "</form>";
                echo "<form action='vertodas.php' method='get' target='principal'>";
                    echo "<input type='submit' value='Todos las Sugerencias' name='submit'/><br>";
                echo "</form>";
            echo "</td>";
        echo "</tr>";
        echo "<tr>";
            echo "<td>Tratamiento<br>";
                echo "<form action='planilla.php' method='get' target='principal'>";
                    echo "<input type='submit' value='Carga Planilla Conf.' name='submit'/><br>";
                echo "</form>";
                echo "<form action='tratar1.php' method='get' target='principal'>";
                    echo "<input type='submit' value='Carga Factibilidad' name='submit'/><br>";
                echo "</form>";
                echo "</form>";
                    echo "<form action='tratar.php' method='get' target='principal'>";
                    echo "<input type='submit' value='Carga Tratamiento' name='submit'/><br>";
                echo "</form>";
                    echo "<form action='efectividad.php' method='get' target='principal'>";
                    echo "<input type='submit' value='Verificar efectividad' name='submit'/><br>";
                echo "</form>";
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
            echo "<form action='../templates/constructor.php' method='get' target='principal'>";
                echo "<input type='submit' value='Estadisticas' name='submit'/><br>";
            echo "</form>";
            echo "<form action='datosreg.php' method='get' target='principal'>";
                echo "<input type='submit' value='Registradores' name='submit'/><br>";
            echo "</form>";
        echo "</td>";
    }else
    {
        echo "<tr>";
        echo "<td>";
            echo "Sugerencias<br>";
                echo "<form action='vermissuger.php' method='get' target='principal'>";
                    echo "<input type='submit' value='Sugerencias sin tratar' name='submit'/ disabled><br>";
                echo "</form>";
                echo "<form action='vertodas.php' method='get' target='principal'>";
                    echo "<input type='submit' value='Todos las Sugerencias' name='submit'/ disabled><br>";
                echo "</form>";
        echo "</td>";
        echo "</tr>";
        echo "<tr>";
            echo "<td>Tratamiento<br>";
                echo "<form action='planilla.php' method='get' target='principal'>";
                    echo "<input type='submit' value='Carga Planilla Conf.' name='submit'/ disabled><br>";
                echo "</form>";
                echo "<form action='tratar1.php' method='get' target='principal'>";
                    echo "<input type='submit' value='Carga Factibilidad' name='submit'/ disabled><br>";
                echo "</form>";
                echo "</form>";
                    echo "<form action='tratar.php' method='get' target='principal'>";
                    echo "<input type='submit' value='Carga Tratamiento' name='submit'/ disabled><br>";
                echo "</form>";
                    echo "<form action='efectividad.php' method='get' target='principal'>";
                    echo "<input type='submit' value='Verificar efectividad' name='submit'/ disabled><br>";
                echo "</form>";
                echo "<form action='cerrar.php' method='get' target='principal'>";
                    echo "<input type='submit' value='Cerrar' name='submit'/ disabled><br>";
                echo "</form>";
        echo "</td>";
    echo "</tr>";
    echo "<tr>";
        echo "<td>Consultas<br>";
            echo "<form action='buscar.php' method='get' target='principal'>";
                echo "<input type='submit' value='Buscar' name='submit'/ disabled><br>";
            echo "</form>";
            echo "<form action='../templates/constructor.php' method='get' target='principal'>";
                echo "<input type='submit' value='Estadisticas' name='submit'/ disabled><br>";
            echo "</form>";
            echo "<form action='datosreg.php' method='get' target='principal'>";
                echo "<input type='submit' value='Registradores' name='submit'/ disabled><br>";
            echo "</form>";
        echo "</td>";
    }    
        echo "</tr>";
echo "</table>";
?>
</html> 
