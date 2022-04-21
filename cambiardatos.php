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

$user=$_SESSION['usuario'];
$idper=$_SESSION['idper'];

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
    $clave0 = $_POST['clave0'];
    $clave1 = $_POST['clave1'];
    $clave2 = $_POST['clave2'];
            $sentencia = "SELECT * FROM personas WHERE clave = '".md5($clave0)."'";
            $consulta = mysqli_query($iden,$sentencia);
            $ban=0;
            while ($valores = mysqli_fetch_array($consulta))
                {$ban=$ban+1;}
            IF($ban == 1 AND $clave1==$clave2){
                $sentencia = "UPDATE personas SET clave='".md5($clave1)."', estado='1' WHERE Idpersonas ='".$idper."'";
                $consulta = mysqli_query($iden,$sentencia);
                echo "<form action='logout.php' method='post' target='_top'>";
                        echo "<tr>";
                        echo "<td class='detalle' colspan='3'>La contraseña se modifco con exito - Debe ingresar nuevamente para que el cambio tenga efecto</td>";
                    echo "</tr>";
                    echo "<tr>";
                        echo "<td class='detalle' colspan='3'>";
                        echo "<input type='submit' value='Relogin' name='submit'/>";
                        echo "</td>";
                    echo "</tr>";
                echo "</form>";	
            }
            else{
                echo "<form action='cambia.php' method='post' target='principal'>";
                    echo "<tr>";
                        echo "<td class='detalle' colspan='3'>La Contraseña actual no es correcta o las contraseñas nuevas no coinciden</td>";
                    echo "</tr>";
                    echo "<tr>";
                        echo "<td class='detalle' colspan='3'>";
                        echo "<input type='submit' value='volver' name='submit'/>";
                        echo "</td>";
                    echo "</tr>";
                echo "</form>";	
            }
    echo "</tbody>";
echo "  </table>";
?>
</html>