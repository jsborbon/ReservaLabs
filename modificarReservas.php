<DOCTYPE html>
<link rel="stylesheet" href="Css/styles-tables.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<html>
<?php
require "Modelo/conexionBasesDatos.php";
require "Includes/verifyLogin.php";
// Verificar si el usuario ha iniciado sesión
$usuario = verifyLoginOrRedirect();

// Mostrar el contenido de las tablas
    $table = "laboratorio_computo";
    echo "<h2>Seleccione la sala a modificar</h2>";


    // Obtener los datos de la tabla
    $query = "SELECT * FROM $table";
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

<script>
let cells = document.getElementsByTagName('tr');
console.log(cells);
for(let i = 0; i<cells.length; i++){
    cells[i].addEventListener('click', function(){
        confirmar(cells[i].firstChild.innerHTML);
    });
}
function confirmar(id){  
      window.location.href = 'modificarSalas.php?id_laboratorio='+id;
}
</script>