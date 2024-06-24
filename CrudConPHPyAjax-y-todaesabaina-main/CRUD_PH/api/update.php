<?php
header("Content-Type: application/json; charset=UTF-8");
include('../config/config.php');

$data = json_decode(file_get_contents("php://input"), true);

$id = $data['id'];
$nombre = $data['doce_nombre'];
$apellido = $data['doce_apellido'];
$cumple = $data['per_cumple'];
$mail = $data['per_mail'];
$cel = $data['doce_cel'];

$sql = "UPDATE personas SET 
        doce_nombre = '$nombre',
        doce_apellido = '$apellido',
        per_cumple = '$cumple',
        per_mail = '$mail',
        doce_cel = '$cel'
        WHERE id = $id";

if ($conn->query($sql) === TRUE) {
    $response = array("message" => "Record updated successfully");
    http_response_code(200);
} else {
    $response = array("message" => "Error updating record: " . $conn->error);
    http_response_code(500);
}

echo json_encode($response);

$conn->close();
?>
