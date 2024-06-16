<?php
// create.php
require_once 'config.php';

header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $doce_nombre = $_POST['nombre'];
    $doce_apellido = $_POST['apellido'];
    $per_cumple = $_POST['cumple'];
    $per_mail = $_POST['mail'];
    $doce_cel = $_POST['cel'];

    $sql = "INSERT INTO personas (doce_nombre, doce_apellido, per_cumple, per_mail, doce_cel) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        echo json_encode(["error" => "Error al preparar la declaración"]);
        exit;
    }

    $stmt->bind_param("sssss", $doce_nombre, $doce_apellido, $per_cumple, $per_mail, $doce_cel);

    if ($stmt->execute()) {
        $response = [
            "id" => $stmt->insert_id,
            "nombre" => $doce_nombre,
            "apellido" => $doce_apellido,
            "cumple" => $per_cumple,
            "mail" => $per_mail,
            "cel" => $doce_cel
        ];
        echo json_encode($response);
    } else {
        echo json_encode(["error" => "Error al ejecutar la declaración"]);
    }

    $stmt->close();
} else {
    http_response_code(405);
    echo json_encode(["error" => "Método no permitido"]);
}
?>
