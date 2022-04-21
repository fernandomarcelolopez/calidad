<!DOCTYPE html > 
<html lang="es"> 
   <head> 
      <title>SGC911Salta</title>
      <link rel="shortcut icon" href="../img/logo911.png"/>
      <link rel="stylesheet" href="../css/estilos.css"/>
   </head> 
<?php
require('../templates/conexioncom.php');
require('../templates/sesioncom.php');

echo "<FRAMESET ROWS=10%,80%,10%>";
   echo "<FRAME SRC='encabezado.php' name='cabeza' frameborder=0 scrolling='no'>";
   echo "<FRAMESET COLS=15%,*>";
      echo "<FRAME SRC='menu.php'  name='menu' frameborder=0>";
      echo "<FRAME SRC='verusuarios.php' name='principal' frameborder=0>";
   echo "</FRAMESET>";
   echo "<FRAME SRC='pie.php' name='pie' frameborder=0 scrolling='no'>";
echo "</FRAMESET>";
?>
</html> 
