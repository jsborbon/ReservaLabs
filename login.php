<?php
if (isset($_POST["idEstudiante"]) && isset($_POST["password"]) && !empty($_POST["idEstudiante"]) && !empty($_POST["password"])) {

require "Modelo/conexionBasesDatos.php";
session_start(); // Iniciar la sesión

// Obtener las credenciales ingresadas por el usuario
$idEstudiante = $_POST['idEstudiante'];
$pass = $_POST['password'];

// Verificar si la base de datos existe
/*if ($result->num_rows == 0) {
    // La base de datos no existe, se crea
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
     }
} else {
    // La base de datos ya existe, se selecciona
    $conn->select_db($dbname);
  */
    // Consulta para verificar las credenciales del usuario
    $query = "SELECT * FROM estudiante WHERE es_id_estudiante = '$idEstudiante' AND es_password = '$pass'";
    // Verificar si el usuario está activo
    $query2 = $query. " AND es_estado = 'V'";
    // Ejecutar la consulta
    $result = $conn->query($query);
    
    // Verificar si se encontró un resultado
    if ($result->num_rows == 1) {
        
        $result = $conn->query($query2);
        if ($result->num_rows == 1) {
        $_SESSION["id_usuario"] = $idEstudiante;
        header("Location: dashboard.php");
        exit();
        }else{
            echo "El usuario no está activo.";
            header("Location: index.php?error=1");    
        }
    } else {
            echo "Usuario o contraseña incorrectos.";
            header("Location: index.php?error=2"); 
    }


// Cerrar la conexión
$conn->close();
} else {
    header("Location: index.php");
    exit();
}
?>
