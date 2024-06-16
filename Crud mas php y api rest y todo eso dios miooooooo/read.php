<?php
// read.php
require_once 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "SELECT * FROM personas WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $persona = $result->fetch_assoc();
        echo json_encode($persona);
    } else {
        $sql = "SELECT * FROM personas";
        $result = $conn->query($sql);
        $personas = array();
        while ($row = $result->fetch_assoc()) {
            $personas[] = $row;
        }
        echo json_encode($personas);
    }
} else {
    echo "Error al leer personas";
}
?>