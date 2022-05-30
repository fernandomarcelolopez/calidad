<!DOCTYPE html > 
<html lang="es"> 
   <head> 
		<title>SGC911Salta</title>
		<link rel="shortcut icon"href="../img/logo911.png"/>
		<link rel="stylesheet"href="../css/tablas.css"/>
   </head> 
<?php
            $fechareg = date("Y"). "-".date("m"). "-".date("d");   
            $horareg=date("H")-3;
            $hora=$hora.":".date("i");
            $dia=substr($fechareg,0,4).substr($fechareg,5,2).substr($fechareg,8,4).substr($horareg,0,2).substr($horareg,3,2);
			$directorio = "archivos/";

			$archivo = "./".$directorio . $dia . basename($_FILES['archivo']['name']);
			echo "<div>";
			if (move_uploaded_file($_FILES['archivo']['tmp_name'], $archivo)) {
				} else {
					echo "La subida ha fallado";
				}
			$nombrearchivo = $dia.$_FILES['archivo']['name'];
			echo "<br>".$archivo;
			echo "</div>";

			$archivo1 = "./".$directorio . $dia . basename($_FILES['archivo1']['name']);
			echo "<div>";
			if (move_uploaded_file($_FILES['archivo1']['tmp_name'], $archivo1)) {
				} else {
				   echo "La subida ha fallado";
				}
				$nombrearchivo1 = $dia.$_FILES['archivo1']['name'];
				echo "<br>".$archivo1;
				echo "</div>";

			$archivo2 = "./".$directorio . $dia . basename($_FILES['archivo2']['name']);
			echo "<div>";
			if (move_uploaded_file($_FILES['archivo2']['tmp_name'], $archivo2)) {
				} else {
				   echo "La subida ha fallado";
				}
				$nombrearchivo2 = $dia.$_FILES['archivo2']['name'];
				echo "<br>".$archivo2;
				echo "</div>";

?>
</html>