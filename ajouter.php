<?php
require_once "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["num_serie"]) && isset($_POST["constat_dechargement"])) {
    $num_serie = $_POST["num_serie"];
    $constat_dechargement = $_POST["constat_dechargement"];

    $sql = "INSERT INTO conteneur (num_serie, constat_dechargement) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $num_serie, $constat_dechargement);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "Le conteneur a été ajouté avec succès.";
    } else {
        echo "Erreur: " . $stmt->error;
    }
    $stmt->close();
}
$conn->close();
?>