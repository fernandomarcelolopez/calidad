<?php
$enlace = mysqli_connect("172.20.1.223", "calidad", "calidad", "snc");
if (!$enlace) {
    echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
    echo "errno de depuracion: " . mysqli_connect_errno() . PHP_EOL;
    echo "error de depuracion: " . mysqli_connect_error() . PHP_EOL;
    exit;
}
echo "Exito: Se realizo una conexion apropiada a MySQL! La base de datos mi_bd es genial." . PHP_EOL;
echo "Informacion del host: " . mysqli_get_host_info($enlace) . PHP_EOL;
mysqli_close($enlace);
// con esto solucione el problema de coneccion al servidor
//setsebool -P httpd_can_network_connect 1
?>


