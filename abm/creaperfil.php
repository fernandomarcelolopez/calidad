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

$perfil=$_POST['perfil'];

echo "<form action='verperfil.php' method='post'>";
echo "<table border='1' align='center'>";
echo "<colgroup>";
    echo "<col width='20%'/>";
    echo "<col width='70%'/>";
echo "</colgroup>";
echo "<tbody>";
    echo "<tr>";
        echo "<td class='titulo1' colspan='2' align=center><h2>CARGA DE NUEVO PERFIL</h2></td>";
    echo "</tr>";
$sentencia = "SELECT * FROM perfil WHERE nombreperfil = '".$perfil."'";
$consulta = mysqli_query($iden,$sentencia);
$ban=0;
while ($valores = mysqli_fetch_array($consulta))
    {$ban=$ban+1;}
if($ban == 0){
	$sentencia = "INSERT INTO perfil (nombreperfil, estado) VALUES ('".$perfil."', '1')";
	$consulta = mysqli_query($iden,$sentencia);

    echo "<tr>";
        echo "<td class='titulo2'colspan='2' style='text-align:center'>El Perfil se cargo con exito</td>";
    echo "</tr>";
    echo "<tr>";
        echo "<td class='titulo2'colspan='1' style='text-align:left'>Nombre de Perfil</td>";
        echo "<td colspan=1 align=left>".$perfil."</td>";
    echo "</tr>";
    echo "<tr>";
        echo "<td class='titulo2'colspan='1' style='text-align:left'>Estado</td>";
        echo "<td colspan=1 align=left>Activo</td>";
    echo "</tr>";
}
ELSE{
echo "<tr>";
echo "<td class='titulo2'colspan='2' style='text-align:center'>El Perfil ya existe</td>";
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