<?php
// delete.php
require_once 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "DELETE") {
    $id = $_GET['id'];
    $sql = "DELETE FROM personas WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();

    echo "Persona eliminada con éxito";
} else {
    echo "Error al eliminar persona";
}
?>