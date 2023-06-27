<link rel="stylesheet" href="Css/styles-tables.css">
<?php
// Establecer la conexión a la base de datos
require "Modelo/conexionBasesDatos.php";
require "Includes/verifyLogin.php";

// Verificar si el usuario ha iniciado sesión
$usuario = verifyLoginOrRedirect();

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
