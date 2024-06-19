<?php
header("Content-Type: application/json; charset=UTF-8");
include('../config/config.php');

$data = json_decode(file_get_contents("php://input"), true);

$nombre = $data['doce_nombre'];
$apellido = $data['doce_apellido'];
$cumple = $data['per_cumple'];
$mail = $data['per_mail'];
$cel = $data['doce_cel'];

$sql = "INSERT INTO personas (doce_nombre, doce_apellido, per_cumple, per_mail, doce_cel) 
        VALUES ('$nombre', '$apellido', '$cumple', '$mail', '$cel')";

if ($conn->query($sql) === TRUE) {
    $response = array("message" => "Record created successfully");
    http_response_code(201);
} else {
    $response = array("message" => "Error: " . $sql . "<br>" . $conn->error);
    http_response_code(500);
}

echo json_encode($response);

$conn->close();
?>
