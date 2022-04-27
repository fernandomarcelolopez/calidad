<!DOCTYPE html > 
<html lang="es"> 
   <head> 
		<title>SGC911Salta</title>
		<link rel="shortcut icon" href="../img/logo911.png"/>
		<link rel="stylesheet" href="../css/tablas.css"/>
   </head> 
<?php
require('../templates/conexioncom.php');
require('../templates/sesioncom.php');
$bandera = 0;
$user=$_SESSION['usuario'];

echo "<form action='verperfil.php' method='post' target='principal'>";
	echo "<table>";
	echo "<tbody>";
		echo "<tr>";
			echo "<td class='titulo1' colspan='9' align=center><h2>Lista de Perfiles Registrados </h2</td>";
		echo "</tr>";
		echo "<tr>";
			echo "<td class='titulo2'>N°</td>";
			echo "<td class='titulo2'>Nombre</td>";
			echo "<td class='titulo2'>Estado</td>";
			echo "<td class='titulo2'>Acción</td>";
		echo "</tr>";
		$numerador=1;
		$sentencia = "SELECT * FROM perfil";
		$consulta = mysqli_query($iden,$sentencia);
		while($buscado = mysqli_fetch_assoc($consulta)) 
		{ 
			$idperfil = $buscado['Idperfil'];
			$nombreperfil = $buscado['nombreperfil'];
			$estado = $buscado['estado'];

			echo "<tr>";
				echo "<td class='detalle'>". $numerador."</td>";
				echo "<td class='detalle'>".$nombreperfil."</td>";
				If($estado==1){echo "<td class='detalle'><img src='../img/ok.png' width=30px></td>";}
				If($estado==0){echo "<td class='detalle'><img src='../img/nok.png' width=30px></td>";}
				echo "<td class='detalle'>";
					echo "<form action='cambiaperfil.php' method='post' target='principal'>";
					echo "<input type='hidden' value='".$idperfil."' name='perfil' id:'perfil' />";
					echo "<input type='submit' value='Modificar nombre' name='submit'/>";
					echo "</form>";	
				echo "</td>";
			echo "</tr>";
			$numerador = $numerador +1;
		}
		if(($numerador - 1) == 0) 
		{
			echo "<tr>";
				echo "<td  class='titulo1'colspan='9'>Sin Perfiles para mostrar</Font></td>";
			echo "</tr>";
		}	
	echo "</tbody>";
echo "  </table>";
mysqli_close($iden); 
?>
</html> 
