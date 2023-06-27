<?php

function verifyLoginOrRedirect(){
 
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
return $usuario; 
}

function verifyLogged(){
    // Verificar si el usuario ha iniciado sesión
session_start(); // Iniciar la sesión
if (isset($_SESSION["id_usuario"])) {
    header("Location: dashboard.php");
    exit();
}
}
?>