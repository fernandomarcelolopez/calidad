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

$fecha = date("Y"). "-".date("m"). "-".date("d"); 
$user=$_SESSION['usuario'];

$usuario=$_POST['usuario'];
$nombre=$_POST['nombre'];
$sector=$_POST['sector'];
$perfil=$_POST['perfil'];
$email=$_POST['email'];
echo "<form action='verusuarios.php' method='post'>";
echo "<table border='1' align='center'>";
echo "<colgroup>";
    echo "<col width='20%'/>";
    echo "<col width='70%'/>";
echo "</colgroup>";
echo "<tbody>";
    echo "<tr>";
        echo "<td class='titulo1' colspan='2' align=center><h2>CARGA DE NUEVO USUARIO</h2></td>";
    echo "</tr>";
$sentencia = "SELECT * FROM personas WHERE usuario = '".$usuario."'";
$consulta = mysqli_query($iden,$sentencia);
$ban=0;
while ($valores = mysqli_fetch_array($consulta))
    {$ban=$ban+1;}
if($ban == 0){
	$sentencia = "INSERT INTO personas (nombrepersonas, idsector, usuario, clave, perfil, estado, email) VALUES ('".$nombre."', '".$sector."', '".$usuario."', '".md5($usuario)."', '".$perfil."', '1', '".$email."')";
	$consulta = mysqli_query($iden,$sentencia);

    echo "<tr>";
        echo "<td class='titulo2'colspan='2' style='text-align:center'>El usuario se cargo con exito</td>";
    echo "</tr>";
    echo "<tr>";
        echo "<td class='titulo2'colspan='1' style='text-align:left'>Nombre de usuario</td>";
        echo "<td colspan=1 align=left>".$usuario."</td>";
    echo "</tr>";
    echo "<tr>";
        echo "<td class='titulo2'colspan='1' style='text-align:left'>Nombre y Apellido del usuario</td>";
        echo "<td colspan=1 align=left>".$nombre."</td>";
    echo "</tr>";
    echo "<tr>";
        echo "<td class='titulo2' colspan='1' style='text-align:left'>Sector asignado</td>";
                $sentencia = "SELECT * FROM sector WHERE Idsector = '".$sector."'";
                $consulta = mysqli_query($iden,$sentencia);
                $buscado = mysqli_fetch_assoc($consulta); 
            echo "<td colspan='1' align=left>".$buscado['nombresector']."</td>";
    echo "</tr>";
    echo "<tr>";
        echo "<td class='titulo2' colspan='1' style='text-align:left'>Perfil asignado</td>";
                $sentencia = "SELECT * FROM perfil WHERE Idperfil = '".$perfil."'";
                $consulta = mysqli_query($iden,$sentencia);
                $buscado = mysqli_fetch_assoc($consulta); 
            echo "<td colspan='1' align=left>".$buscado['nombreperfil']."</td>";
    echo "</tr>";
    echo "<tr>";
        echo "<td class='titulo2'colspan='1' style='text-align:left'>Correo Electronico</td>";
        echo "<td colspan=1 align=left>".$email."</td>";
    echo "</tr>";
    echo "<tr>";
        echo "<td class='titulo2'colspan='1' style='text-align:left'>Contraseña</td>";
        echo "<td colspan=1 align=left>Es el usuario y se le pedira cambiarla obligatoriamente al ingresar por primera vez</td>";
    echo "</tr>";
    echo "<tr>";
        echo "<td class='titulo2'colspan='1' style='text-align:left'>Estado</td>";
        echo "<td colspan=1 align=left>Activo</td>";
    echo "</tr>";
}
ELSE{
echo "<tr>";
echo "<td class='titulo2'colspan='2' style='text-align:center'>El usuario ya existe</td>";
echo "</tr>";
}
echo "<tr>";
echo "<td colspan='2' align='center'>";
    echo "<input type='submit' value='Volver' name='submit'/>";
echo "</td>";
echo "</tr>";
echo "</form>";
echo "</tbody>";
echo "</table>";
?>
</html>