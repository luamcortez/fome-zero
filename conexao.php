<?php
$servername = "127.0.0.1";
$database = "fz";
$username = "root";
$password = "";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$conn) {
    die("Falha ao conectar: " . mysqli_connect_error());
}
echo "Conectado com sucesso";
mysqli_close($conn);
?>