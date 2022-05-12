<!DOCTYPE html > 
<html lang="es"> 
   <head> 
		<title>SGC911Salta</title>
		<link rel="shortcut icon" href="../img/logo911.png"/>
		<link rel="stylesheet" href="../css/muro.css"/>
   </head> 
<?php
require('../templates/conexioncom.php');
require('../templates/sesioncom.php');

echo "<table class='fuera'>";
	echo "<tbody>";
		echo "<tr>";
			echo "<td align=left><img src='../img/muro.png' width=70% ></td>";
		echo "</tr>";
		echo "<tbody>";
echo "</table>";

		$de='Persona Emisora';
		$para='Persona/Grupo Destino';
		$texto='Había una vez un niño llamado Raúl. Raúl era un chico que vivía en Saturno en el año 4.000 y en esa época ya había vida en todos los planetas. Su hobby, era pasear por Saturno y ver sus noches que según él eran preciosas.';
		$fechap='2022-4-21';
		$fechav=null;
		echo "<tr>";
		echo "<table class='dentro'>";
			echo "<colgroup>";
				echo "<col width='30%'/>";
				echo "<col width='30%'/>";
				echo "<col width='20%'/>";
			echo "</colgroup>";
			echo "<tr>";
				echo "<td align=left><B>Publicado el: </B>".$fechap."</td>";
				echo "<td align=left><B>Visto el: </B>".$fechav."</td>";
				echo "<td align=right rowspan=2 class='dentro'><img src='../img/nok.png' width=50px></td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td align=left><B>De: </B>".$de."</td>";
				echo "<td align=left><B>Para: </B>".$para."</td>";
			echo "</tr>";
			echo "<tr>";
					echo "<td align=left colspan=3><B>Mensaje</B></td>";
			echo "</tr>";
			echo "<tr>";
					echo "<td align=left colspan=3><p>".$texto."</p></td>";
			echo "</tr>";
			echo "<tr>";
					echo "<td align=left colspan=3><B>Adjuntos</B></td>";
			echo "</tr>";
			echo "<tr>";
					echo "<td align=left colspan=3>Archivo.pdf</td>";
			echo "</tr>";
		echo "</table>";
		echo "</tr>";

mysqli_close($iden); 
?>
</html> 
