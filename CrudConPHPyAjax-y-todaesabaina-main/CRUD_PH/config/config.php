<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "crud_paraprofes";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error); echo conexionexito;

}
?>
