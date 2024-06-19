<?php
header("Content-Type: application/json; charset=UTF-8");
include('../config/config.php');

$id = isset($_GET['id']) ? intval($_GET['id']) : null;

if ($id) {
    $sql = "SELECT * FROM personas WHERE id = $id";
} else {
    $sql = "SELECT * FROM personas";
}

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $rows = array();
    while($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }
    echo json_encode($rows);
} else {
    echo json_encode(array("message" => "No records found"));
}

$conn->close(); 
?>
