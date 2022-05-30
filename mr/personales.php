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
			echo "<td align=left><img src='../img/muro0.png' width=100% ></td>";
		echo "</tr>";
		echo "<tbody>";
echo "</table>";

$sentencia = "SELECT * FROM muro";
$consulta = mysqli_query($iden,$sentencia);
while ($valores = mysqli_fetch_array($consulta)) 
	{
		$sentencia1 = "SELECT * FROM personas WHERE Idpersonas='".$valores['emisor']."'";
		$consulta1 = mysqli_query($iden,$sentencia1);
		$valores1 = mysqli_fetch_array($consulta1); 
		$de=$valores1[nombrepersonas];

		if($valores['tipodestinatario']==0){
			$para='Para todos';
		}
		if($valores['tipodestinatario']==1){
			$sentencia1 = "SELECT * FROM sector WHERE Idsector='".$valores['destinatario']."'";
			$consulta1 = mysqli_query($iden,$sentencia1);
			$valores1 = mysqli_fetch_array($consulta1); 
			$para="Sector: ".$valores1['nombresector'];
		}
		if($valores['tipodestinatario']==2){
			$sentencia1 = "SELECT * FROM personas WHERE Idpersonas='".$valores['destinatario']."'";
			$consulta1 = mysqli_query($iden,$sentencia1);
			$valores1 = mysqli_fetch_array($consulta1); 
			$para="Personal: ".$valores1['nombrepersonas'];
		}
		$texto=$valores['mensaje'];
		$fechap=$valores['fecha'];
		$fechav=null;

		$archi1=$valores['nombremuestra1'];
		$archi1link=$valores['nombrearchivo1'];
		$archi2=$valores['nombremuestra2'];
		$archi2link=$valores['nombrearchivo2'];
		$archi3=$valores['nombremuestra3'];
		$archi3link=$valores['nombrearchivo3'];

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
									echo "<td align=left colspan=3><B>Mensaje: </B><BR>".$texto."</td>";
							echo "</tr>";
							echo "<tr>";
									echo "<td align=left colspan=3><B>Adjuntos: </B><BR>";
									if($archi1link!=''){
										echo $archi1."<a target='_blank' href='./archivos/".$archi1link."'> <button type='button'>Ver</button></a>  ";
									}
									if($archi2link!=''){
										echo $archi2."<a target='_blank' href='./archivos/".$archi2link."'> <button type='button'>Ver</button></a>  ";
									}
									if($archi3link!=''){
										echo $archi3."<a target='_blank' href='./archivos/".$archi3link."'> <button type='button'>Ver</button></a>  ";
									}
									echo "</td>";
							echo "</tr>";
						echo "</table>";
		echo "</tr>";
	}	
mysqli_close($iden); 
?>
</html> 
