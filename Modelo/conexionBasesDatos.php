<?php
require "Modelo/query.php";
// Establecer la conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bosco";

// Crear una nueva conexión
$conn = new mysqli($servername, $username, $password);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error al conectar a la base de datos: " . $conn->connect_error);
}


consultarSiBDExiste($conn, $dbname);

function consultarSiBDExiste($conn, $dbname){
    
// Consulta para verificar si la base de datos existe
$query = "SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = '$dbname'";
$result = $conn->query($query);

// Verificar si la base de datos existe
if ($result->num_rows == 0) {
    // La base de datos no existe, se crea
    crearBD();
} else {
    // La base de datos ya existe, se selecciona
    $conn->select_db($dbname);
}
}

function crearBD(){
    $createDBQuery = "CREATE DATABASE $dbname";
    if ($conn->query($createDBQuery) === TRUE) {
        echo "La base de datos ha sido creada exitosamente.";
        
        // Seleccionar la base de datos recién creada
        $conn->select_db($dbname);
        // Crear tabla de usuarios
        $createTableQuery = createQueries();
        echo $createTableQuery;
        if ($conn->multi_query($query) === TRUE) {
            echo "Las tablas se han creado correctamente.";
        } else {
            echo "Error al crear las tablas: " . $conn->error;
        }
    } else {
        echo "Error al crear la base de datos: " . $conn->error;
        exit();
    }
}
?>