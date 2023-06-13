<?php
require "Modelo/conexionBasesDatos.php";

// Verificar si el usuario ha iniciado sesión
session_start(); // Iniciar la sesión
if (!isset($_SESSION["id_usuario"])) {
    // El usuario no ha iniciado sesión, redirigir a la página de inicio de sesión
    header("Location: index.php");
    exit();
}

// Verificar si se ha enviado el formulario de edición
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $id_laboratorio = $_POST["id_laboratorio"];
    $nombre_laboratorio = $_POST["nombre_laboratorio"];
    $total_pc = $_POST["total_pc"];
    $disponible_pc = $_POST["disponible_pc"];
    $estado = $_POST["estado"];

    // Actualizar el registro en la base de datos
    $sql = "UPDATE laboratorio_computo SET nombre_laboratorio = '$nombre_laboratorio', total_pc = $total_pc, disponible_pc = $disponible_pc, estado = '$estado' WHERE id_laboratorio = $id_laboratorio";

    if ($conn->query($sql) === TRUE) {
        echo "Registro actualizado correctamente.";
        header("Location: dashboard.php");
    } else {
        echo "Error al actualizar el registro: " . $conn->error;
    }
}

// Obtener el ID del registro a editar (puede ser pasado por URL o como un parámetro POST)
$id_laboratorio = $_GET["id_laboratorio"];

// Consultar los datos del registro actual en la base de datos
$sql = "SELECT * FROM laboratorio_computo WHERE id_laboratorio = $id_laboratorio";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    $fila = $result->fetch_assoc();

    // Obtener los valores de la fila
    $nombre_laboratorio = $fila["nombre_laboratorio"];
    $total_pc = $fila["total_pc"];
    $disponible_pc = $fila["disponible_pc"];
    $estado = $fila["estado"];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Editar Laboratorio</title>
    <link rel="stylesheet" href="Css/styleModificar.css">
</head>
<body>
    <h2>Editar Laboratorio</h2>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <input type="hidden" name="id_laboratorio" value="<?php echo $id_laboratorio; ?>">
        <label for="nombre_laboratorio">Nombre del Laboratorio:</label>
        <input type="text" name="nombre_laboratorio" value="<?php echo $nombre_laboratorio; ?>"><br>

        <label for="total_pc">Total de PCs:</label>
        <input type="number" id="total_pc" name="total_pc" onclick="calcularMaximo();" value="<?php echo $total_pc; ?>"min="1"><br>

        <label for="disponible_pc">PCs Disponibles:</label>
        <input type="number" id="disponible_pc" name="disponible_pc" onclick="calcularMaximo();" value="<?php echo $disponible_pc; ?>" min="0"><br>

        <label for="estado">Estado:</label>
        <select id="estado" name="estado">
            <option value="D">Disponible</option>
            <option value="O">Ocupada</option>
            <option value="P">Pendiente</option>
        </select><br>
        <input type="submit" value="Guardar Cambios">
    </form>

    

    <a href=dashboard.php>Volver al dashboard</a>

</body>
</html>


<?php
} else {
    echo "No se encontró ningún registro con el ID especificado.";
}

// Cerrar la conexión
$conn->close();
?>
<script>
    document.getElementById("estado").value = "<?php echo $estado; ?>";
    function calcularMaximo(){
        let total = document.getElementById("total_pc").value;
        let disponible = document.getElementById("disponible_pc").value;
        document.getElementById("disponible_pc").max = total;
        if(total<disponible){
            document.getElementById("disponible_pc").value = total;
        }
    }
</script>