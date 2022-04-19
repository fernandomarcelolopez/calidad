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

<table>
    <tr>
        <td>
            Mis Tickets<br>
            <form action='vermiassinres.php' method='get' target='principal'>
                <input type='submit' value='Tickets de mi área sin repuesta' name='submit'/><br>
            </form>
            <form action='vermias.php' method='get' target='principal'>
                <input type='submit' value='Tickets de mi área' name='submit'/><br>
            </form>
            <form action='vergeneradas.php' method='get' target='principal'>
                <input type='submit' value='Tickets generados' name='submit'/><br>
            </form>
        </td>
    </tr>
    <tr>
        <td>
            Acciones<br>
            <form action='alta.php' method='get' target='principal'>
                <input type='submit' value='Generar Ticket' name='submit'/><br>
            </form>
            <form action='veracciones.php' method='get' target='principal'>
                <input type='submit' value='Verificar acciones' name='submit'/><br>
            </form>
            <form action='verefecti.php' method='get' target='principal'>
                <input type='submit' value='Verificar efectividad' name='submit'/><br>
            </form>
            <form action='vercierres.php' method='get' target='principal'>
                <input type='submit' value='Cerrar Ticket' name='submit'/><br>
            </form>
        </td>
    </tr>
    <tr>
        <td>Consultas<br>
            <form action='buscar.php' method='get' target='principal'>
                <input type='submit' value='Buscar' name='submit'/><br>
            </form>
            <form action='listartodas.php' method='get' target='principal'>
                <input type='submit' value='Listar todos los Tickets' name='submit'/><br>
            </form>
            <form action='listaractivas.php' method='get' target='principal'>
                <input type='submit' value='Listar Tickets activos' name='submit'/><br>
            </form>
            <form action='constructor.php' method='get' target='principal'>
                <input type='submit' value='Consultas varias' name='submit'/><br>
            </form>
        </td>
    </tr>
</table>

</html> 
