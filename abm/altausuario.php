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

echo "<form action='creausuario.php' method='post'>";
	echo "<table border='1' align='center'>";
		echo "<colgroup>";
			echo "<col width='20%'/>";
			echo "<col width='70%'/>";
		echo "</colgroup>";
		echo "<tbody>";
			echo "<tr>";
				echo "<td class='titulo1' colspan='2' align=center><h2>CARGA DE NUEVO USUARIO</h2></td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td class='titulo2'colspan='1' style='text-align:left'>Nombre de usuario</td>";
				echo "<td colspan=1 align=left>";
					echo "<input type='text' id='usuario' name='usuario' required maxlength='30' size='90'>";
				echo "</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td class='titulo2'colspan='1' style='text-align:left'>Nombre y Apellido del usuario</td>";
				echo "<td colspan=1 align=left>";
					echo "<input type='text' id='nombre' name='nombre' required maxlength='150' size='90'>";
				echo "</td>";
			echo "</tr>";
            echo "<tr>";
				echo "<td class='titulo2' colspan='1' style='text-align:left'>Sector asignado</td>";
				echo "<td colspan='1' align=left>";
                    echo "<select name='sector'>";
                        $sentencia = "SELECT * FROM sector WHERE estado = '1'";
                        $consulta = mysqli_query($iden,$sentencia);
                        while($buscado = mysqli_fetch_assoc($consulta)) 
                        { 
                            echo "<option value='".$buscado['Idsector']."'>".$buscado['nombresector']."</option>";
                        }
                    echo "</select>";
				echo "</td>";
			echo "</tr>";
            echo "<tr>";
				echo "<td class='titulo2' colspan='1' style='text-align:left'>Perfil asignado</td>";
				echo "<td colspan='1' align=left>";
                    echo "<select name='perfil'>";
                        $sentencia = "SELECT * FROM perfil WHERE estado = '1'";
                        $consulta = mysqli_query($iden,$sentencia);
                        while($buscado = mysqli_fetch_assoc($consulta)) 
                        { 
                            echo "<option value='".$buscado['Idperfil']."'>".$buscado['nombreperfil']."</option>";
                        }
                    echo "</select>";
				echo "</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td class='titulo2'colspan='1' style='text-align:left'>Correo Electronico</td>";
				echo "<td colspan=1 align=left>";
					echo "<input type='email' id='email' name='email' required maxlength='75' size='90'>";
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