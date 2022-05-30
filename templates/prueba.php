<!DOCTYPE html > 
<html lang="es"> 
   <head> 
		<title>SGC911Salta</title>
		<link rel="shortcut icon"href="../img/logo911.png"/>
		<link rel="stylesheet"href="../css/tablas.css"/>
   </head> 
<?php
echo "<table>";
	echo "<form enctype='multipart/form-data' action='prueba a.php' method='post'>";
		echo "<tr>";
			echo "<td>"; 
				echo "<input name='archivo' type='file' accept='.pdf'/>";
			echo "</td>"; 
		echo "</tr>";
		echo "<tr>";
			echo "<td>"; 
				echo "<input name='archivo1' type='file' accept='.pdf'/>";
			echo "</td>"; 
		echo "</tr>";
		echo "<tr>";
			echo "<td>"; 
				echo "<input name='archivo2' type='file' accept='.pdf'/>";
			echo "</td>"; 
		echo "</tr>";
		echo "<tr>";
			echo "<td>"; 
				echo "<input type='submit' value='Subir archivo' /></div>";
			echo "</td>"; 
		echo "</tr>";
	echo "</form>";
echo "</table>";
?>
</html>