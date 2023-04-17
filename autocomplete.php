<?php
require_once "config.php";

if (isset($_GET["query"])) {
    $query = $_GET["query"];
    $sql = "SELECT num_serie FROM conteneur WHERE num_serie LIKE ? LIMIT 5";
    $stmt = $conn->prepare($sql);
    $param_query = "%{$query}%";
    $stmt->bind_param("s", $param_query);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<a href="#" class="list-group-item list-group-item-action">' . $row["num_serie"] . '</a>';
        }
    } else {
        echo '<p class="list-group-item">Aucun résultat</p>';
    }
    $stmt->close();
}
$conn->close();
?>