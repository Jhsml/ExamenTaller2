<?php
$conn = new mysqli("localhost", "root", "", "trabajo_tesis");

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$conn->autocommit(FALSE);

?>