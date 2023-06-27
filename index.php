<?php
require 'Includes/verifyLogin.php';
verifyLogged();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Iniciar sesión</title>
    <script src="Js\indexScript.js"></script>
<?php include "Includes/head.php"?>
</head>
<body onload=mostrarError();>
    <div class="login-box">
        <img src="img/icono.jpg" class="logo" alt="Logo">
        <h2>Iniciar sesión</h2>
        <form action="login.php" method="post">
            <div class="user-box">
                <input type="text" name="idEstudiante" required="">
                <label>ID Estudiante</label>
            </div>
            <div class="user-box">
                <input type="password" name="password" required="">
                <label>Contraseña</label>
            </div>
            <button type="submit">Iniciar sesión</button>
        </form>
    </div>
</body>
</html>

<script>
    
</script>