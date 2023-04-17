<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lavage-ncs";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    throw new Exception("Connection failed: " . $conn->connect_error);
}
?>