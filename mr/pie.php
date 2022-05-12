<!DOCTYPE html > 
<html lang="es"> 
 	<head> 
    	<title>SGC911Salta</title>
   	 	<link rel="shortcut icon" href="../img/logo911.png"/>
   </head> 
<?php
require('../templates/conexioncom.php');
require('../templates/sesioncom.php');
?>
	<header>
   		<table width=100%>
			<colgroup>
				<col style="width: 10%"/>
				<col style="width: 40%"/>
				<col style="width: 40%"/>
				<col style="width: 10%"/>
			</colgroup>
			<tr>
				<td align=left>
					<img src="../img/iso.png" width=150px>
				</td>
				<td align=right>
					<h5><?php echo "Usuario: ".$_SESSION['nombre'] ?></h5>
				</td>
				<td align=left>
				<a class="varios"href="../abm/verusuario1.php" target="principal"><img src="../img/user.png" width=60px></a>
				</td>
				<td align=left>
				<a class="varios"href="../portal.php" target="_top"><img src="../img/home.png" width=60px></a>
				<a class="varios"href="../logout.php" target="_top"><img src="../img/salir.png" width=60px></a>
				</td>
			</tr>
   		</table>
  	</header>
</html> 
