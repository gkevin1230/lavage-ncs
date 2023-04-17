<?php
require_once "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["num_serie"])) {
    $num_serie = $_POST["num_serie"];

    $sql = "SELECT * FROM conteneur WHERE num_serie = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $num_serie);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo "constat_dechargement du conteneur : " . $row["constat_dechargement"];
    } else {
        header("Location: formulaire.php");
    }
    $stmt->close();
}
$conn->close();
?>