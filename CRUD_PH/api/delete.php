<?php
// Establece el tipo de contenido de la respuesta como JSON y el juego de caracteres como UTF-8
header("Content-Type: application/json; charset=UTF-8");

// Incluye el archivo de configuración para conectarse a la base de datos
include('../config/config.php');

// Decodifica el contenido JSON recibido en la solicitud y lo convierte en un array asociativo
$data = json_decode(file_get_contents("php://input"), true);

// Extrae el ID del registro a eliminar del array asociativo
$id = $data['id'];

// Prepara la consulta SQL para eliminar el registro con el ID especificado
$sql = "DELETE FROM personas WHERE id = $id";

// Ejecuta la consulta SQL y verifica si se ejecutó correctamente
if ($conn->query($sql) === TRUE) {
    // Si la consulta se ejecutó correctamente, prepara una respuesta con un mensaje de éxito y establece el código de respuesta HTTP a 200 (OK)
    $response = array("message" => "Registro borrado correctamente");
    http_response_code(200);
} else {
    // Si hubo un error al ejecutar la consulta, prepara una respuesta con un mensaje de error incluyendo detalles del error y establece el código de respuesta HTTP a 500 (Error interno del servidor)
    $response = array("message" => "Error borrando registro: " . $conn->error);
    http_response_code(500);
}

// Convierte el array de respuesta en formato JSON y lo envía al cliente
echo json_encode($response);

// Cierra la conexión a la base de datos
$conn->close();
?>

