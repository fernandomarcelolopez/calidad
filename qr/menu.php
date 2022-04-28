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
            echo "Mis QR-F<br>";
                echo "<form action='vermisquejas.php' method='get' target='principal'>";
                    echo "<input type='submit' value='Quejas de mi área sin tratar' name='submit'/><br>";
                echo "</form>";
                echo "<form action='vermisreclamos.php' method='get' target='principal'>";
                    echo "<input type='submit' value='Reclamos de mi área sin tratar' name='submit'/><br>";
                echo "</form>";
                echo "<form action='vermisfelicitaciones.php' method='get' target='principal'>";
                    echo "<input type='submit' value='Felicitaciones de mi área sin tratar' name='submit'/><br>";
                echo "</form>";
                echo "<form action='vertodas.php' method='get' target='principal'>";
                    echo "<input type='submit' value='Registros de mi área' name='submit'/><br>";
                echo "</form>";
        echo "</td>";
    echo "</tr>";
    echo "<tr>";
        echo "<td>";
            echo "Acciones<br>";
                echo "<form action='alta.php' method='get' target='principal'>";
                IF($perfil == 2){
                    echo "<input type='submit' value='Cargar Registro' name='submit'/><br>";
                }
                ELSE{
                    echo "<input type='submit' value='Cargar Registro' name='submit'/ disabled><br>";
                }
                echo "</form>";
                echo "<form action='responder.php' method='get' target='principal'>";
                IF($perfil == 2 OR $perfil == 3 ){
                    echo "<input type='submit' value='Registrar Acciones' name='submit'/><br>";
                }
                ELSE{
                    echo "<input type='submit' value='Registrar Acciones' name='submit'/disabled><br>";
                }
                echo "</form>";
                echo "<form action='veracciones.php' method='get' target='principal'>";
                IF($perfil == 2){
                    echo "<input type='submit' value='Verificar acciones' name='submit'/><br>";
                }
                ELSE{
                    echo "<input type='submit' value='Verificar acciones' name='submit'/ disabled><br>";
                }
                echo "</form>";
                echo "<form action='regdoc.php' method='get' target='principal'>";
//                echo "<form action='verefecti.php' method='get' target='principal'>";
                IF($perfil == 2 OR $perfil == 3 ){
                    echo "<input type='submit' value='Registrar Documento' name='submit'/><br>";
                }
                ELSE{
                    echo "<input type='submit' value='Registrar Documento' name='submit'/ disabled><br>";
                }
                echo "</form>";
                echo "<form action='vercierres.php' method='get' target='principal'>";
                IF($perfil == 2){
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
                echo "<input type='submit' value='Listar todos los Registros' name='submit'/><br>";
            echo "</form>";
            echo "<form action='listaractivas.php' method='get' target='principal'>";
                echo "<input type='submit' value='Listar Registros activos' name='submit'/><br>";
            echo "</form>";
            echo "<form action='constructor.php' method='get' target='principal'>";
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
