<DOCTYPE html>
<link rel="stylesheet" href="Css/styles-tables.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<html>
<?php
// Establecer la conexión a la base de datos
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

// Mostrar el contenido de las tablas
    $table = "reserva_laboratorio";
    echo "<h2>Tabla: $table</h2>";

    // Obtener los datos de la tabla
    $query = "SELECT id_reserva, fecha_reserva, estado_reserva FROM $table WHERE id_estudiante = $usuario";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<thead>";
        echo "<tr>";
        while ($fieldinfo = $result->fetch_field()) {
            echo "<th>{$fieldinfo->name}</th>";
        }
        echo "</tr>";
        echo "</thead>";

        echo "<tbody>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            foreach ($row as $value) {
                echo "<td>$value</td>";
            }
            echo "</tr>";
        }
        echo "</tbody>";

        echo "</table>";
    } else {
        echo "La tabla está vacía.";
    }

    echo "<br>";

    echo "<a href=dashboard.php>Volver al dashboard</a>";

// Cerrar la conexión
$conn->close();
?>
