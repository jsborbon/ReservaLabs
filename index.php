<?php
// Verificar si el usuario ha iniciado sesión
session_start(); // Iniciar la sesión
if (isset($_SESSION["id_usuario"])) {
    header("Location: dashboard.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Iniciar sesión</title>

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
    function mostrarError(){
        const queryString = window.location.search;
        const urlParams = new URLSearchParams(queryString)
        let idError =urlParams.get('error');
        if(idError == 1){
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: '¡No se pudo iniciar sesión!',
                footer: 'El usuario no se encuentra activo.'
              });
            }
        if(idError == 2){
            Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: '¡No se pudo iniciar sesión!',
            footer: 'Usuario o contraseña incorrectos.'
          });
        }
    }
</script>