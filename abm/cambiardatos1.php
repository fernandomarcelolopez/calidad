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

$seleccion=$_POST['seleccion'];
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

if($seleccion == 'usuario'){
    $usuario = $_POST['usuario'];
    $sentencia = "SELECT * FROM personas WHERE usuario = '".$usuario."'";
    $consulta = mysqli_query($iden,$sentencia);
    $ban=0;
    while ($valores = mysqli_fetch_array($consulta))
        {$ban=$ban+1;}
    IF($ban == 0){
        $sentencia = "UPDATE personas SET usuario='".$usuario."' WHERE Idpersonas ='".$idper."'";
        $consulta = mysqli_query($iden,$sentencia);
        echo "<form action='../logout.php' method='post' target='_top'>";
            echo "<tr>";
                echo "<td class='detalle' colspan='3'>El cambio se realizo con Exito - Debe ingresar nuevamente para que el cambio tenga efecto</td>";
            echo "</tr>";
            echo "<tr>";
                echo "<td class='detalle' colspan='3'>";
                echo "<input type='submit' value='Relogin' name='submit'/>";
                echo "</td>";
            echo "</tr>";
        echo "</form>";	
    }
    else{
        echo "<form action='verusuario1.php' method='post' target='principal'>";
            echo "<tr>";
                echo "<td class='detalle' colspan='3'>El nombre de usuario ya se encuentra en uso o no es un nombre habilitado</td>";
            echo "</tr>";
            echo "<tr>";
                echo "<td class='detalle' colspan='3'>";
                echo "<input type='submit' value='volver' name='submit'/>";
                echo "</td>";
            echo "</tr>";
        echo "</form>";	
    }
}
if($seleccion == 'nombre'){
        $nombre = $_POST['nombre'];
        $sentencia = "UPDATE personas SET nombrepersonas='".$nombre."' WHERE Idpersonas ='".$idper."'";
        $consulta = mysqli_query($iden,$sentencia);
        echo "<form action='verusuario1.php' method='post' target='principal'>";
                echo "<tr>";
                    echo "<td class='detalle' colspan='3'>El cambio se realizo con Exito</td>";
                echo "</tr>";
                echo "<tr>";
                    echo "<td class='detalle' colspan='3'>";
                    echo "<input type='submit' value='Volver' name='submit'/>";
                    echo "</td>";
                echo "</tr>";
            echo "</form>";	
}
if($seleccion == 'email'){
    $email = $_POST['email'];
    $sentencia = "UPDATE personas SET email='".$email."' WHERE Idpersonas ='".$idper."'";
    $consulta = mysqli_query($iden,$sentencia);
    echo "<form action='verusuario1.php' method='post' target='principal'>";
            echo "<tr>";
                echo "<td class='detalle' colspan='3'>El cambio se realizo con Exito</td>";
            echo "</tr>";
            echo "<tr>";
                echo "<td class='detalle' colspan='3'>";
                echo "<input type='submit' value='Volver' name='submit'/>";
                echo "</td>";
            echo "</tr>";
        echo "</form>";	
}
if($seleccion == 'contra'){
    $clave0 = $_POST['clave0'];
    $clave1 = $_POST['clave1'];
    $clave2 = $_POST['clave2'];
            $sentencia = "SELECT * FROM personas WHERE Idpersonas ='".$idper."'";
            $consulta = mysqli_query($iden,$sentencia);
            $ban=0;
            $valores = mysqli_fetch_array($consulta);
            IF($valores['clave'] == md5($clave0) AND $clave1==$clave2){
                $sentencia = "UPDATE personas SET clave='".md5($clave1)."', estado='1' WHERE Idpersonas ='".$idper."'";
                $consulta = mysqli_query($iden,$sentencia);
                echo "<form action='../logout.php' method='post' target='_top'>";
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
                echo "<form action='usuario.php' method='post' target='principal'>";
                    echo "<tr>";
                        echo "<td class='detalle' colspan='3'>La Contraseña actual no es correcta o las contraseñas nuevas no coinciden".$ban."</td>";
                    echo "</tr>";
                    echo "<tr>";
                        echo "<td class='detalle' colspan='3'>";
                        echo "<input type='submit' value='volver' name='submit'/>";
                        echo "</td>";
                    echo "</tr>";
                echo "</form>";	
            }
        }
    echo "</tbody>";
echo "  </table>";
?>
</html>