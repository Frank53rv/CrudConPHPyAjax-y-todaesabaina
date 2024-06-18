<?php

// Función para crear un nuevo usuario
function crear_usuario($conn, $nombre, $usuario,$contrasena,$correo )
{
  $sql="INSERT INTO usuarios (id, nombre, usuario, contrasena, correo, administrador)
  VALUES (NULL, '".$nombre."', '".$usuario."', '".$contrasena."', '".$correo."',0)";
  //echo $sql;
  $filas=$conn->query($sql);

  // Preparar la consulta
  $stmt = $conn->prepare($sql);
  // Vincular parámetros
  $stmt->bind_param("ssss", $nombre, $usuario, $contrasena, $correo);
  // Ejecutar la consulta
  $stmt->execute();
}
// Modificar usuario
function modificar_usuario($conn, $id, $nombre, $usuario, $correo)
{
    $sql = "UPDATE usuarios SET nombre=?, usuario=?, correo=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $nombre, $usuario, $correo, $id);
    $stmt->execute();
}

// Borrar usuario
function borrar_usuario($conn, $id)
{
    $sql = "DELETE FROM usuarios WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
}

// Cambiar contraseña
function cambiar_password($conn, $id, $nueva_contrasena)
{
    $sql = "UPDATE usuarios SET contrasena=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $hashed_password = password_hash($nueva_contrasena, PASSWORD_DEFAULT);
    $stmt->bind_param("si", $hashed_password, $id);
    $stmt->execute();
}

 ?>
