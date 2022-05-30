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
$nombreper=$_SESSION['nombre'];

$fecha=$_POST['fecha'];
$hora=$_POST['hora'];
$idpersona=$_POST['idper'];
$seleccion=$_POST['seleccion'];
$sector=$_POST['sector'];
$personal=$_POST['personal'];
$mensaje=$_POST['mensaje'];

echo "<form action='personales.php' method='post'>";
	echo "<table border='1' align='center'>";
		echo "<colgroup>";
			echo "<col width='20%'/>";
			echo "<col width='10%'/>";
			echo "<col width='60%'/>";
		echo "</colgroup>";
		echo "<tbody>";
			echo "<tr>";
				echo "<td class='titulo1' colspan='3' align=center><h2>CARGA DE NOVEDAD</h2></td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td class='titulo2'colspan='1' style='text-align:left'>Fecha del Publicación</td>";
				echo "<td colspan=2 align=left>".date("d/m/Y", strtotime($fecha))." - ".$hora."</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td class='titulo2'colspan='1' style='text-align:left'>Emisor</td>";
				echo "<td colspan=2 align=left>".$nombreper."</td>";
			echo "</tr>";
			if($seleccion=='general'){
			echo "<tr>";
				echo "<td class='titulo2'colspan='1' style='text-align:left'>Destino</td>";
				echo "<td colspan=1 align=left>General</td>";
				echo "<td colspan=1 align=left>Para todos</td>";
				$tipodestinatario=0;
			echo "</tr>";
			}	
			if($seleccion=='sector'){
				echo "<tr>";
				echo "<td class='titulo2'colspan='1' style='text-align:left'>Destino</td>";
				echo "<td colspan=1 align=left>Sector</td>";
				$sentencia = "SELECT * FROM sector WHERE Idsector='".$sector."'";
				$consulta = mysqli_query($iden,$sentencia);
				$valores = mysqli_fetch_array($consulta); 
				echo "<td colspan=1 align=left>".$valores[nombresector]."</td>";
				$tipodestinatario=1;
			echo "</tr>";
			}
			if($seleccion=='personal'){
				echo "<tr>";
				echo "<td class='titulo2'colspan='1' style='text-align:left'>Destino</td>";
				echo "<td colspan=1 align=left>Personal</td>";
				echo "<td colspan=1 align=left>";
					$sentencia = "SELECT * FROM personas WHERE Idpersonas='".$idpersona."'";
					$consulta = mysqli_query($iden,$sentencia);
					$valores = mysqli_fetch_array($consulta); 
					echo $valores[nombrepersonas];
				echo "</td>";
				$tipodestinatario=2;
			echo "</tr>";
			}
			echo "<tr>";
				echo "<td class='titulo2' colspan='1' style='text-align:left'>Mensaje</td>";
				echo "<td colspan='2' align=left>".$mensaje."</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td class='titulo2' colspan='1'style='text-align:left'>Adjuntar Archivo</td>";

				$fechareg = date("Y"). "-".date("m"). "-".date("d");   
				$horareg=date("H")-3;
				$hora=$hora.":".date("i");
				$dia=substr($fechareg,0,4).substr($fechareg,5,2).substr($fechareg,8,4).substr($horareg,0,2).substr($horareg,3,2);
				$directorio = "archivos/";

				$a1=0;
				$a2=0;
				$a3=0;
				$archivo = "./".$directorio . $dia . basename($_FILES['archivo']['name']);
				$archivoa = basename($_FILES['archivo']['name']);
				if (move_uploaded_file($_FILES['archivo']['tmp_name'], $archivo)) {
					} else { $a1=1;
					}
				$nombrea = $dia.$_FILES['archivo']['name'];

				$archivo1 = "./".$directorio . $dia . basename($_FILES['archivo1']['name']);
				$archivoa1 = basename($_FILES['archivo1']['name']);
				if (move_uploaded_file($_FILES['archivo1']['tmp_name'], $archivo1)) {
					} else { $a2=1;
					}
				$nombrea1 = $dia.$_FILES['archivo1']['name'];
	
				$archivo2 = "./".$directorio . $dia . basename($_FILES['archivo2']['name']);
				$archivoa2 = basename($_FILES['archivo2']['name']);
				echo "<div>";
				if (move_uploaded_file($_FILES['archivo2']['tmp_name'], $archivo2)) {
					} else { $a3=1;
					}
				$nombrea2 = $dia.$_FILES['archivo2']['name'];

				echo "<td colspan='2' align=left>";
				if($a1==0){					
					echo $archivoa." - ";
				}	
				if($a2==0){					
					echo $archivoa1." - ";
				}	
				if($a3==0){					
					echo $archivoa2;
				}	
			echo "</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td colspan='3' align='center'>";
					echo "<input type='submit' value='Salir' name='submit'/>";
				echo "</td>";
			echo "</tr>";
		echo "</tbody>";
	echo "</table>";
echo "</form>";

if($a1==0){
	$nombrearchivo1=$nombrea;
	$nombremuestra1=$archivoa;
}
if($a2==0){
	$nombrearchivo2=$nombrea1;
	$nombremuestra2=$archivoa1;
}
if($a3==0){
	$nombrearchivo3=$nombrea2;
	$nombremuestra3=$archivoa2;
}
if($seleccion=="general"){
	$tipodestinatario=0;
	$destinatario=null;
}
if($seleccion=="sector"){
	$tipodestinatario=1;
	$destinatario=$sector;
}
if($seleccion=="personal"){
	$tipodestinatario=2;
	$destinatario=$personal;
}

$sentencia = "INSERT INTO muro (fecha, emisor, tipodestinatario, destinatario, mensaje, nombrearchivo1, nombremuestra1, nombrearchivo2, nombremuestra2, nombrearchivo3, nombremuestra3) VALUES ('".$fecha."', '".$idpersona."', '".$tipodestinatario."', '".$destinatario."', '".$mensaje."', '".$nombrearchivo1."', '".$nombremuestra1."', '".$nombrearchivo2."', '".$nombremuestra2."', '".$nombrearchivo3."', '".$nombremuestra3."')";
$consulta = mysqli_query($iden,$sentencia);


mysqli_free_result($consulta);
mysqli_close($iden); 
?>
</body> 
</html>