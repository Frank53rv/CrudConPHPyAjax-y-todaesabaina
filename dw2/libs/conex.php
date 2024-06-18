<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$database="dw2";
// Create connection
//$conn = new mysqli($servername, $username, $password,$database);
$conn =  mysqli_connect($servername, $username, $password,$database);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

else {
    echo "Connected successfully";
}
?>
