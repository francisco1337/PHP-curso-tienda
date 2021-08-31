<?php

//* Configuración de la conexion a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tienda";


//* Crear Conexion
$conn = new mysqli($servername, $username, $password, $dbname);

//* Validar Conexión exitosa
if( $conn->connect_error ){
    die('Conexion Fallida: '. $conn->connect_error);
}