<?php
require "Modelo/conexionBasesDatos.php";

// Verificar si el usuario ha iniciado sesión
session_start(); // Iniciar la sesión
if (isset($_SESSION["id_usuario"])) {
    // El usuario ha iniciado sesión, puedes acceder a sus datos de sesión
    $usuario = $_SESSION["id_usuario"];
} else {
    // El usuario no ha iniciado sesión, redirigir a la página de inicio de sesión
    header("Location: index.php");
    exit();
}

//Obtener id de la reserva
$id_laboratorio = $_GET['id'];

// Cambiar el valor de la columna reservado a 1
$query = "UPDATE laboratorio_computo SET estado = 'P' WHERE id_laboratorio = $id_laboratorio";

$query2= "SELECT * FROM laboratorio_computo WHERE id_laboratorio = $id_laboratorio";
$result = $conn->query($query2);

if ($result->num_rows > 0) {
    $fila = $result->fetch_assoc();

    // Obtener los datos necesarios para el INSERT INTO
    $id_estudiante = $_SESSION["id_usuario"]; // ID del estudiante que realiza la reserva
    $fecha_reserva = date("Y-m-d H:i:s"); // Fecha y hora actual
    $hora_reserva = date("H:i:s"); // Hora de la reserva
    $estado_reserva = "P"; // Estado de la reserva

    // Crear el INSERT INTO en la tabla reserva_laboratorio
    $query3 = "INSERT INTO reserva_laboratorio (id_estudiante, fecha_reserva, hora_reserva, estado_reserva)
                   VALUES ('$id_estudiante', '$fecha_reserva', '$hora_reserva', '$estado_reserva')";

    
if ($conn->query($query) === TRUE && $conn->query($query3) === TRUE) {
    echo "Reserva realizada con éxito.";
    header("Location: dashboard.php");
} else {
    echo "Error al realizar la reserva: " . $conn->error;
    header("Location: reservar.php");

}
} 

$conn->close();
?>