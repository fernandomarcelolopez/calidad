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

$sentencia = "SELECT * FROM personas WHERE Idpersonas = '".$idper."'";
$consulta = mysqli_query($iden,$sentencia);
$buscado = mysqli_fetch_assoc($consulta); 

$nombreper= $buscado['nombrepersonas'];
$idsector= $buscado['idsector'];
$clave= $buscado['clave'];
$idperfil= $buscado['perfil'];
$email= $buscado['email'];


$sentencia = "SELECT * FROM perfil WHERE Idperfil = '".$idperfil."'";
$consulta = mysqli_query($iden,$sentencia);
$buscado = mysqli_fetch_assoc($consulta); 

$perfil= $buscado['nombreperfil'];

$sentencia = "SELECT * FROM sector WHERE Idsector = '".$idsector."'";
$consulta = mysqli_query($iden,$sentencia);
$buscado = mysqli_fetch_assoc($consulta); 

$sector= $buscado['nombresector'];

$seleccion = $_POST['seleccion'];
$usuario = $_POST['usuario'];

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
    echo "<tr>";
        echo "<form action='cambiar.php' method='post' target='principal'>";
            echo "<td class='titulo2'>Nombre de Usuario</td>";
            echo "<td class='detalle'><input type='text' name='usuario' id='usuario' value='".$user."' required maxlength='50' size='30'></td>";
            echo "<td class='detalle'>";
                echo "<input type='submit' value='Cambiar' name='submit'/>";
            echo "</td>";
        echo "</form>";	
    echo "</tr>";
}
if($seleccion == 'nombre'){
    echo "<tr>";
        echo "<form action='cambiar.php' method='post' target='principal'>";
            echo "<td class='titulo2'>Nombre del Usuario</td>";
            echo "<td class='detalle'><input type='text' name='nombre' id='nombre' value='".$nombreper."' required maxlength='50' size='150'></td>";
            echo "<td class='detalle'>";
                echo "<input type='hidden' value='".$user."' name='usuario' id:'usuario' />";
                echo "<input type='submit' value='Cambiar' name='submit'/>";
            echo "</td>";
        echo "</form>";	
    echo "</tr>";
}
if($seleccion == 'email'){
        echo "<tr>";
            echo "<form action='cambiar.php' method='post' target='principal'>";
                echo "<td class='titulo2'>Email</td>";
                echo "<td class='detalle'><input type='email' name='nombre' id='nombre' value='".$email."' required maxlength='50' size='75'></td>";
                echo "<td class='detalle'>";
                    echo "<input type='hidden' value='".$user."' name='usuario' id:'usuario' />";
                    echo "<input type='submit' value='Cambiar' name='submit'/>";
                echo "</td>";
            echo "</form>";	
        echo "</tr>";
}
		echo "<tr>";
            echo "<td colspan='3' align='center'>";
                echo "<form action='usuario.php' method='post' target='principal'>";
                    echo "<input type='submit' value='Salir' name='submit'/>";
                echo "</form>";	
            echo "</td>";
        echo "</tr>";
    echo "</tbody>";
echo "  </table>";
?>
</html>