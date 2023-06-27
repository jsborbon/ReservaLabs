<?php
require 'Includes/verifyLogin.php';
$usuario = verifyLoginOrRedirect();
?>

<!DOCTYPE html>
<html>
<head>
  <title>BOSCO | Gestiona</title>
  <link rel="stylesheet" href="Css/styles-Dashboard.css">
</head>
<body>
  <div class="dashboard">
    <div class="sidebar">
      <h1>BOSCO</h1>
      <h6><a href="logout.php">Cerrar sesión</a></h6>
      <ul>
        <li><a href="#" onclick="reservar()">Reservar</a></li>
        <li><a href="#" onclick="verReservas()">Ver Reservas</a></li>
        <?php
        if ($usuario == "admin") {
          echo '<li><a href="#" onclick="modificarReservas()">Modificar Reservas</a></li>';
        }
        ?>
      </ul>
    </div>
    <div class="main-content">
      <div class="card" onclick="reservar()">
        <h2>Reservar</h2>
        <img src="img/reserveIcon.png" alt="Reservar" id="reserveIcon">
      </div>
      <div class="card" onclick="verReservas()">
        <h2>Ver Reservas</h2>
        <img src="img/reservasIcon.png" alt="Ver Reservas" id="reservesIcon">
      </div>
      
      <?php
      if ($usuario == "admin") {
        echo '<div class="card" onclick="modificarReservas()">';
        echo '<h2>Modificar Reservas</h2>';
        echo '<img src="img/reservasIcon.png" alt="Modificar Reservas" id="ModifyIcon">';
        echo '</div>';
      }
      ?>
    </div>
  </div>

  <script>
    function verReservas() {
      window.location.href = "verReservasUser.php";
      <?php
      if ($usuario == "admin") {
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
</body>
</html>
