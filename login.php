<!DOCTYPE html> 
<html lang="es">
<head>
    <title>SGC911Salta</title>
    <link rel="shortcut icon" href="img/logo911.png"/>
    <link rel="stylesheet" href="css/estilos.css"/>
</head>
<body class="login">
    <header class="login">
        <img src="img/logo911.png" alt="Sistema de Emergencias 911 - Salta" width="200"/>
    </header>
    <form class="login" action='checklogin.php' method='post'>
        <table style='width: 40%' align='center'>
            <tr>
                <td align=center>
                    <h3>SISTEMA DE ADMINISTRACION DE DOCUMENTOS DEL SISTEMA DE GESTION DE CALIDAD</h3>
                </td>
                </tr>
                <tr>
                    <td align=center>Usuario</td>
                </tr>
                <tr>
                    <td align=center><input type='text' id='usuario' name='usuario' required minlength='3' maxlength='12' size='40'></td>
                </tr>
                <tr>
                    <td align=center>Contrase&ntilde;a</td>
                </tr>
                <tr>
                    <td align=center><input type='password' id='clave' name='clave' required minlength='3' maxlength='12' size='40'></td>
                </tr>
                <tr>
                    <td align='center'><input type='submit' value='Login' name='submit'/></td>
                </tr>
    <?php
                IF (isset($_GET['estado']))
                    {$estado=$_GET['estado'];}
                ELSE
                    {$estado=0;}
                IF ($estado == 1) {
                    echo "<tr>";
                        echo "<td align=center> <Font color=red> El usuario o la Contrase&ntilde;a no son correctos</Font></td>";
                    echo "</tr>";
                }
                IF ($estado == 2) {
                    echo "<tr>";
                        echo "<td align=center> <Font color=red> La sesi&oacuten ha caducado</Font></td>";
                    echo "</tr>";
                }
                IF ($estado == 3) {
                    echo "<tr>";
                        echo "<td align=center> <Font color=red> La Contrase&ntilde;a se ha cambiado correctamente</Font></td>";
                    echo "</tr>";
                }
                IF ($estado == 4) {
                    echo "<tr>";
                        echo "<td align=center> <Font color=red> Su Usuario se encuentra inhabilitado</Font></td>";
                    echo "</tr>";
                }
    ?>
                
            </table>
        </form>
    </body>
</html>