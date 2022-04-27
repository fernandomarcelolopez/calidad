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
            echo "Usuarios<br>";
                echo "<form action='verusuarios.php' method='get' target='principal'>";
                    echo "<input type='submit' value='Listar Usuarios' name='submit'/><br>";
                echo "</form>";
                echo "<form action='altausuario.php' method='get' target='principal'>";
                    echo "<input type='submit' value='Crear Usuario' name='submit'/><br>";
                    echo "</form>";
                    echo "<form action='iusuarios.php' method='get' target='principal'>";
                    echo "<input type='submit' value='Inhabilitar usuarios' name='submit'/><br>";
                echo "</form>";
        echo "</td>";
    echo "</tr>";
    echo "<tr>";
        echo "<td>";
            echo "Sectores<br>";
                echo "<form action='altasector.php' method='get' target='principal'>";
                    echo "<input type='submit' value='Crear Sector' name='submit'/><br>";
                echo "</form>";
                echo "<form action='versector.php' method='get' target='principal'>";
                    echo "<input type='submit' value='Modificar Sector' name='submit'/><br>";
                echo "</form>";
                echo "<form action='isector.php' method='get' target='principal'>";
                    echo "<input type='submit' value='Inhabilitar Sector' name='submit'/><br>";
                echo "</form>";
        echo "</td>";
    echo "</tr>";
    echo "<tr>";
        echo "<td>";
            echo "Perfiles<br>";
                echo "<form action='altaperfil.php' method='get' target='principal'>";
                    echo "<input type='submit' value='Crear Perfil' name='submit'/><br>";
                echo "</form>";
                echo "<form action='verperfil.php' method='get' target='principal'>";
                    echo "<input type='submit' value='Modificar Perfil' name='submit'/><br>";
                echo "</form>";
                echo "<form action='iperfil.php' method='get' target='principal'>";
                    echo "<input type='submit' value='Inhabilitar Perfil' name='submit'/><br>";
                echo "</form>";
        echo "</td>";
    echo "</tr>";
echo "</table>";
?>
</html> 
