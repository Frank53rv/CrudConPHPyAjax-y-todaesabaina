<?php
require_once("libs/conex.php");

function usuariovalidar($usuario, $contrasena, $conn) {
    session_start(); // Iniciar la sesión
    $sql = 'SELECT * FROM usuarios WHERE usuario = ? AND contrasena = ?';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ss', $usuario, $contrasena);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows == 1) {
        $d = $result->fetch_assoc();
        $_SESSION['id'] = $d['id'];
        $_SESSION['usuario'] = $d['usuario'];
        $_SESSION['correo'] = $d['correo'];
        $_SESSION['nombre'] = $d['nombre'];
        $_SESSION['administrador'] = $d['administrador'];
    } else {
        // Manejo de error
    }
    
    $stmt->close();
}

function usuariosalir() {
    session_start(); // Iniciar la sesión si no está iniciada
    session_destroy();
}
?>
