<!DOCTYPE html > 
<html lang="es"> 
   <head> 
		<title>SGC911Salta</title>
		<link rel="shortcut icon"href="img/logo911.png"/>
		<link rel="stylesheet"href="css/tablas.css"/>
   </head> 
<?php
require('templates/conexioncom.php');
require('templates/sesioncom.php');

echo "  <table border='1' align='center'>";
    echo "<colgroup>";
        echo "<col width='20%'/>";
        echo "<col width='50%'/>";
        echo "<col width='20%'/>";
    echo "</colgroup>";
    echo "<tbody>";
		echo "<tr>";
			echo "<td class='titulo1' colspan='3' align=center><h2>Modificar datos del Usuario</h2</td>";
		echo "</tr>";
    echo "<form action='cambiardatos.php' method='post' target='_top'>";
            echo "<tr>";
                echo "<td class='titulo2'>Contraseña actual</td>";
                echo "<td class='detalle'><input type='password' name='clave0' id='clave0' required maxlength='50' size='50'></td>";
                echo "<td class='detalle' rowspan='3'>";
                    echo "<input type='submit' value='Cambiar' name='submit'/>";
                echo "</td>";
            echo "</tr>";
                echo "<tr>";
                    echo "<td class='titulo2'>Contraseña nueva</td>";
                    echo "<td class='detalle'><input type='password' name='clave1' id='clave1' required maxlength='50' size='50'></td>";
                echo "</tr>";
                echo "<tr>";
                    echo "<td class='titulo2'>Repita Contraseña</td>";
                    echo "<td class='detalle'><input type='password' name='clave2' id='clave2' required maxlength='50' size='50'></td>";
                echo "</tr>";
        echo "</form>";	
    echo "</tbody>";
echo "  </table>";
?>
</html>