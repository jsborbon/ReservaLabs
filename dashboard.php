<?php

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
?>
<DOCTYPE html>
<head>
<link rel="stylesheet" href="Css/styles-dashboard.css">
  <title>BOSCO | Gestiona</title>
</head>
  <body>
  <div class="dashboard">
  <div><h1>Bienvenido...</h1>
  <h6><a href="logout.php">Cerrar sesión</a></h6>
</div>    
    <div class="card" onclick="reservar()">
      <h2>Reservar</h2>
      <img src="img/reserveIcon.png" alt="Reservar" id="reserveIcon">
    </div>
    <div class="card" onclick="verReservas()">
      <h2>Ver Reservas</h2>
      <img src="img/reservasIcon.png" alt="Ver Reservas" id="reservesIcon">
    </div>
    <?php
    if($usuario == "admin"){
      echo '<div class="card" onclick="modificarReservas()">';
      echo "<h2>Modificar Reservas</h2>";
      echo '<img src="img/reservasIcon.png" alt="Modificar Reservas" id="ModifyIcon">';
      echo "</div>";
    }
    ?>
  </div>
</body>
 <script>
    function verReservas() {
      window.location.href = "verReservasUser.php";
      <?php
      if($usuario == "admin"){
        echo 'window.location.href = "verReservas.php";';
      }
    ?>
      }
    function modificarReservas() {
      window.location.href = "modificarReservas.php";
    }
    function reservar() {
      window.location.href = "reservar.php";
    }
  </script>
</html>
