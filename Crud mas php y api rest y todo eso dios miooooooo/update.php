<?php
// update.php
require_once 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "PUT") {
    $id = $_GET['id'];
    $doce_nombre = $_POST['doce_nombre'];
    $doce_apellido = $_POST['doce_apellido'];
    $per_cumple = $_POST['per_cumple'];
    $per_mail = $_POST['per_mail'];
    $doce_cel = $_POST['doce_cel'];

    $sql = "UPDATE personas SET doce_nombre = ?, doce_apellido = ?, per_cumple = ?, per_mail = ?, doce_cel = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssi", $doce_nombre, $doce_apellido, $per_cumple, $per_mail, $doce_cel, $id);
    $stmt->execute();

    echo "Persona actualizada con éxito";
} else {
    echo "Error al actualizar persona";
}
?>