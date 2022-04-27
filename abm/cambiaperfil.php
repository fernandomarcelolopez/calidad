<!DOCTYPE html> 
<html lang="es"> 
   <head> 
		<title>SGC911Salta</title>
		<link rel="shortcut icon"href="../img/logo911.png"/>
		<link rel="stylesheet"href="../css/tablas.css"/>
   </head> 
<body>
<?php
require('../templates/conexioncom.php');
require('../templates/sesioncom.php');

$user=$_SESSION['usuario'];
$perfil=$_POST['perfil'];

$sentencia = "SELECT * FROM perfil WHERE Idperfil = '".$perfil."'";
$consulta = mysqli_query($iden,$sentencia);
$buscado = mysqli_fetch_assoc($consulta); 
$nombreperfil = $buscado['nombreperfil'];

echo "<form action='grabaperfil.php' method='post'>";
	echo "<table border='1' align='center'>";
		echo "<colgroup>";
			echo "<col width='20%'/>";
			echo "<col width='70%'/>";
		echo "</colgroup>";
		echo "<tbody>";
			echo "<tr>";
				echo "<td class='titulo1' colspan='2' align=center><h2>MODIFICA NOMBRE DEL PERFIL</h2></td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td class='titulo2'colspan='1' style='text-align:left'>Nombre del Perfil a modificar</td>";
				echo "<td colspan=1 align=left>";
				echo "<input type='hidden' id='idperfil' name='idperfil' value='".$perfil."'>";
				echo "<input type='text' id='perfil' name='perfil' required maxlength='30' size='90' value='".$nombreperfil."'>";
				echo "</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td colspan='2' align='center'>";
					echo "<input type='submit' value='Enviar Datos' name='submit'/>";
				echo "</td>";
			echo "</tr>";
		echo "</tbody>";
	echo "</table>";
echo "</form>";
mysqli_close($iden); 
?>
</body> 
</html>