<?php

$servidor = "localhost";
$user = "root";
$contraseña = "";
$db = "mega";

$tabla = "personas";

$conexion = new mysqli($servidor, $user, $contraseña, $db);

if (!$conexion) {
    die("Error en la conexion");
}
