<?php
session_start();
IF (isset($_SESSION['logeado']) && $_SESSION['logeado'] == true)
{
}
ELSE
{
	header('Location:../login.php');
	exit;
}
$ahora=time();
IF ($ahora > $_SESSION['tiempo'])
{
	SESSION_DESTROY();
	echo "<table width=40% height=500px border='0' align='center'>";
	echo "  <tr><td valign='middle' align='center'>";
	echo "	<table border=1 bgcolor=lightblue>";
	echo "  <tr><td>";
	echo "  <table border=0>";
	echo "	<tbody>";
	echo "	<tr>";
	echo "  <td align=center><font size=4 color=white>La sesi&oacute;n ha caducado</font></td>";
	echo "	</tr>";
	echo "	<tr>";
	echo "  <td align=center><font size=4 color=white><a href='../login.php?estado=2' target='_parent'><input type='submit' value='Volver a ingresar' name='submit'/></a></font></td>";
	echo "	</tr>";
	echo "	</tbody>";
	echo "  </table>";
	echo "  </td></tr>";
	echo "	</table>";
	echo "  </td></tr>";
	echo "</table>";
	exit;
}
ELSE
{
	$_SESSION['tiempo'] = $ahora + $_SESSION['demora'];
}
?>