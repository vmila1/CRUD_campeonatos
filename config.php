<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "torneios";

// Criação da conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificação da conexão
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
