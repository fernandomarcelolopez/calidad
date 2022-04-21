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
            echo "Mis Tickets<br>";
                echo "<form action='vermiassinres.php' method='get' target='principal'>";
                    echo "<input type='submit' value='Tickets de mi área sin repuesta' name='submit'/><br>";
                echo "</form>";
                echo "<form action='vermias.php' method='get' target='principal'>";
                    echo "<input type='submit' value='Tickets de mi área' name='submit'/><br>";
                echo "</form>";
                echo "<form action='vergeneradas.php' method='get' target='principal'>";
                    echo "<input type='submit' value='Tickets generados' name='submit'/><br>";
                echo "</form>";
        echo "</td>";
    echo "</tr>";
    echo "<tr>";
        echo "<td>";
            echo "Acciones<br>";
                echo "<form action='alta.php' method='get' target='principal'>";
                IF($perfil <> 5){
                    echo "<input type='submit' value='Generar Ticket' name='submit'/><br>";
                }
                ELSE{
                    echo "<input type='submit' value='Generar Ticket' name='submit'/ disabled><br>";
                }
                echo "</form>";
                echo "<form action='responder.php' method='get' target='principal'>";
                IF($perfil == 2 OR $perfil == 3 ){
                    echo "<input type='submit' value='Responder Ticket' name='submit'/><br>";
                }
                ELSE{
                    echo "<input type='submit' value='Responder Ticket' name='submit'/disabled><br>";
                }
                echo "</form>";
                echo "<form action='veracciones.php' method='get' target='principal'>";
                IF($perfil == 3){
                    echo "<input type='submit' value='Verificar acciones' name='submit'/><br>";
                }
                ELSE{
                    echo "<input type='submit' value='Verificar acciones' name='submit'/ disabled><br>";
                }
                echo "</form>";
                echo "<form action='verefecti.php' method='get' target='principal'>";
                IF($perfil == 3){
                    echo "<input type='submit' value='Verificar efectividad' name='submit'/><br>";
                }
                ELSE{
                    echo "<input type='submit' value='Verificar efectividad' name='submit'/ disabled><br>";
                }
                echo "</form>";
                echo "<form action='vercierres.php' method='get' target='principal'>";
                IF($perfil == 3){
                    echo "<input type='submit' value='Cerrar Ticket' name='submit'/><br>";
                }
                ELSE{
                    echo "<input type='submit' value='Cerrar Ticket' name='submit'/ disabled><br>";
                }
        echo "</form>";
        echo "</td>";
    echo "</tr>";
    echo "<tr>";
        echo "<td>Consultas<br>";
            echo "<form action='buscar.php' method='get' target='principal'>";
                echo "<input type='submit' value='Buscar' name='submit'/><br>";
            echo "</form>";
            echo "<form action='listartodas.php' method='get' target='principal'>";
                echo "<input type='submit' value='Listar todos los Tickets' name='submit'/><br>";
            echo "</form>";
            echo "<form action='listaractivas.php' method='get' target='principal'>";
                echo "<input type='submit' value='Listar Tickets activos' name='submit'/><br>";
            echo "</form>";
            echo "<form action='constructor.php' method='get' target='principal'>";
            IF($perfil == 3){
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
