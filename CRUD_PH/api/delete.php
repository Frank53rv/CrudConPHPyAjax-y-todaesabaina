<?php
header("Content-Type: application/json; charset=UTF-8");
include('../config/config.php');

$data = json_decode(file_get_contents("php://input"), true);

$id = $data['id'];

$sql = "DELETE FROM personas WHERE id = $id";

if ($conn->query($sql) === TRUE) {
    $response = array("message" => "Record deleted successfully");
    http_response_code(200);
} else {
    $response = array("message" => "Error deleting record: " . $conn->error);
    http_response_code(500);
}

echo json_encode($response);

$conn->close();
?>
