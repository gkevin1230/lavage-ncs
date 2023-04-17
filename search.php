<?php
require_once "config.php";
include("header.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["num_serie"])) {
    $num_serie = $_POST["num_serie"];

    $sql = "SELECT * FROM conteneur WHERE num_serie = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $num_serie);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        ?>

        <div class="container">
            <h1>Information du conteneur : <?php echo $num_serie; ?> </h1>
            <table class="table table-striped">
                <tbody>
                <?php    
                foreach ($row as $key => $value) {
                    if ($key === '1ere_circulation' || $key === 'derniere_epreuve') {
                        $date = DateTime::createFromFormat('Y-m-d', $value);
                        $formatted_date = $date->format('d/m/Y');
                        echo '<tr><th>' . htmlspecialchars($key) . '</th><td>' . htmlspecialchars($formatted_date) . '</td></tr>';
                    } else {
                        echo '<tr><th>' . htmlspecialchars($key) . '</th><td>' . htmlspecialchars($value) . '</td></tr>';
                    }
                }
                ?>
                </tbody>
            </table>
        </div>
    <?php     
    } else {
        header("Location: formulaire.php");
    }
    $stmt->close();
}
$conn->close();
?>
