<?php
// Establece el tipo de contenido de la respuesta como JSON y el juego de caracteres como UTF-8
header("Content-Type: application/json; charset=UTF-8");

// Incluye el archivo de configuración para conectarse a la base de datos
include('../config/config.php');

// Decodifica el contenido JSON recibido en la solicitud y lo convierte en un array asociativo
$data = json_decode(file_get_contents("php://input"), true);

// Extrae los datos del array asociativo
$nombre = $data['doce_nombre'];
$apellido = $data['doce_apellido'];
$cumple = $data['per_cumple'];
$mail = $data['per_mail'];
$cel = $data['doce_cel'];

// Prepara la consulta SQL para insertar los datos en la tabla 'personas'
$sql = "INSERT INTO personas (doce_nombre, doce_apellido, per_cumple, per_mail, doce_cel) 
        VALUES ('$nombre', '$apellido', '$cumple', '$mail', '$cel')";

// Ejecuta la consulta SQL y verifica si se ejecutó correctamente
if ($conn->query($sql) === TRUE) {
    // Si la consulta se ejecutó correctamente, prepara una respuesta con un mensaje de éxito y establece el código de respuesta HTTP a 201 (Creado)
    $response = array("message" => "Registro creado correctamente");
    http_response_code(201);
} else {
    // Si hubo un error al ejecutar la consulta, prepara una respuesta con un mensaje de error incluyendo detalles del error y establece el código de respuesta HTTP a 500 (Error interno del servidor)
    $response = array("message" => "Error: " . $sql . "<br>" . $conn->error);
    http_response_code(500);
}

// Convierte el array de respuesta en formato JSON y lo envía al cliente
echo json_encode($response);

// Cierra la conexión a la base de datos
$conn->close();
?>
