<?php
// Establece el tipo de contenido de la respuesta como JSON y el juego de caracteres como UTF-8
header("Content-Type: application/json; charset=UTF-8");

// Incluye el archivo de configuración para conectarse a la base de datos
include('../config/config.php');

// Verifica si el parámetro 'id' está presente en la URL, si es así, lo convierte a un valor entero, de lo contrario lo establece como null
$id = isset($_GET['id']) ? intval($_GET['id']) : null;

// Prepara la consulta SQL dependiendo de si se proporcionó un ID o no
if ($id) {
    $sql = "SELECT * FROM personas WHERE id = $id";
} else {
    $sql = "SELECT * FROM personas";
}

// Ejecuta la consulta SQL
$result = $conn->query($sql);

// Verifica si la consulta devolvió alguna fila
if ($result->num_rows > 0) {
    // Crea un array para almacenar los resultados
    $rows = array();
    // Recorre cada fila devuelta por la consulta y la agrega al array
    while($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }
    // Convierte el array de resultados en formato JSON y lo envía al cliente
    echo json_encode($rows);
} else {
    // Si no se encontraron registros, envía un mensaje en formato JSON indicando esto
    echo json_encode(array("message" => "No se encontraron registros"));
}

// Cierra la conexión a la base de datos
$conn->close(); 
?>
