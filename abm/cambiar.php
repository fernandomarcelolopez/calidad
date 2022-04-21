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
$idper=$_POST['persona'];

$sentencia = "SELECT * FROM personas WHERE Idpersonas = '".$idper."'";
$consulta = mysqli_query($iden,$sentencia);
$buscado = mysqli_fetch_assoc($consulta); 

$nombreper= $buscado['nombrepersonas'];
$usuario= $buscado['usuario'];
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
        echo "<form action='cambiardatos.php' method='post' target='principal'>";
            echo "<td class='titulo2'>Nombre de Usuario</td>";
            echo "<td class='detalle'><input type='text' name='usuario' id='usuario' value='".$usuario."' required maxlength='50' size='30'></td>";
            echo "<td class='detalle'>";
            echo "<input type='hidden' value='".$seleccion."' name='seleccion' id:'seleccion' />";
            echo "<input type='hidden' value='".$idper."' name='persona' id:'persona' />";
            echo "<input type='submit' value='Cambiar' name='submit'/>";
            echo "</td>";
        echo "</form>";	
    echo "</tr>";
}
if($seleccion == 'nombre'){
    echo "<tr>";
        echo "<form action='cambiardatos.php' method='post' target='principal'>";
            echo "<td class='titulo2'>Nombre del Usuario</td>";
            echo "<td class='detalle'><input type='text' name='nombre' id='nombre' value='".$nombreper."' required maxlength='150' size='50'></td>";
            echo "<td class='detalle'>";
            echo "<input type='hidden' value='".$seleccion."' name='seleccion' id:'seleccion' />";
            echo "<input type='hidden' value='".$idper."' name='persona' id:'persona' />";
                echo "<input type='submit' value='Cambiar' name='submit'/>";
            echo "</td>";
        echo "</form>";	
    echo "</tr>";
}
if($seleccion == 'email'){
        echo "<tr>";
            echo "<form action='cambiardatos.php' method='post' target='principal'>";
                echo "<td class='titulo2'>Email</td>";
                echo "<td class='detalle'><input type='email' name='email' id='email' value='".$email."' required maxlength='50' size='75'></td>";
                echo "<td class='detalle'>";
                echo "<input type='hidden' value='".$seleccion."' name='seleccion' id:'seleccion' />";
                echo "<input type='hidden' value='".$idper."' name='persona' id:'persona' />";
                echo "<input type='submit' value='Cambiar' name='submit'/>";
                echo "</td>";
            echo "</form>";	
        echo "</tr>";
}
if($seleccion == 'contra'){
        echo "<form action='cambiardatos.php' method='post' target='principal'>";
            echo "<tr>";
                echo "<td class='titulo2' colspan='2'>Confirma regeneración de Contraseña (contraseña = nombre del usuario, la que debera cambiar al ingresar)</td>";
                echo "<td class='detalle' colspan='1'>";
                    echo "<input type='hidden' name='clave0' id='clave0' value='".$usuario."'>";
                    echo "<input type='hidden' value='".$seleccion."' name='seleccion' id:'seleccion' />";
                    echo "<input type='hidden' value='".$idper."' name='persona' id:'persona' />";
                    echo "<input type='submit' value='Cambiar' name='submit'/>";
                echo "</td>";
            echo "</tr>";
            echo "</form>";	
}
if($seleccion == 'perfil'){
    echo "<tr>";
        echo "<form action='cambiardatos.php' method='post' target='principal'>";
            echo "<td class='titulo2'>Perfil</td>";
            echo "<td class='detalle'>";
                echo "<select name='perfil'>";
                    $sentencia1 = "SELECT * FROM perfil WHERE estado = 1";
                    $consulta1 = mysqli_query($iden,$sentencia1);
                    while($buscado1 = mysqli_fetch_assoc($consulta1)) 
                    { 
                        echo "<option value='".$buscado1['Idperfil']."'>".$buscado1['nombreperfil']."</option>";
                    }
                echo "</select>";
            echo "</td>";
            echo "<td class='detalle'>";
            echo "<input type='hidden' value='".$seleccion."' name='seleccion' id:'seleccion' />";
            echo "<input type='hidden' value='".$idper."' name='persona' id:'persona' />";
            echo "<input type='submit' value='Cambiar' name='submit'/>";
            echo "</td>";
        echo "</form>";	
    echo "</tr>";
}
if($seleccion == 'sector'){
    echo "<tr>";
        echo "<form action='cambiardatos.php' method='post' target='principal'>";
            echo "<td class='titulo2'>Sector</td>";
            echo "<td class='detalle'>";
                echo "<select name='sector'>";
                    $sentencia1 = "SELECT * FROM sector WHERE estado = 1";
                    $consulta1 = mysqli_query($iden,$sentencia1);
                    while($buscado1 = mysqli_fetch_assoc($consulta1)) 
                    { 
                        echo "<option value='".$buscado1['Idsector']."'>".$buscado1['nombresector']."</option>";
                    }
                echo "</select>";
            echo "</td>";
            echo "<td class='detalle'>";
            echo "<input type='hidden' value='".$seleccion."' name='seleccion' id:'seleccion' />";
            echo "<input type='hidden' value='".$idper."' name='persona' id:'persona' />";
            echo "<input type='submit' value='Cambiar' name='submit'/>";
            echo "</td>";
        echo "</form>";	
    echo "</tr>";
}
        echo "<tr>";
            echo "<td colspan='3' align='center'>";
                echo "<form action='verusuarios.php' method='post' target='principal'>";
                    echo "<input type='submit' value='Salir' name='submit'/>";
                echo "</form>";	
            echo "</td>";
        echo "</tr>";
    echo "</tbody>";
echo "  </table>";
?>
</html>