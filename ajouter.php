<?php
require_once "config.php";
include("header.php");

function validateDate($date) {
    return preg_match('/^\d{4}-\d{2}-\d{2}$/', $date);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["num_serie"])) {
    $num_serie = $_POST["num_serie"];
    $num_client = $_POST["num_client"];
    $derniere_epreuve = $_POST["derniere_epreuve"];
    $marques = $_POST["marques"];
    $ref_client = $_POST["ref_client"];
    $constat_dechargement = $_POST["constat_dechargement"];
    $premiere_circulation = $_POST["1ere_circulation"];
    $poids = $_POST["poids"];
    $capacite = $_POST["capacite"];
    $ep = $_POST["ep"];

    // Validation des dates
    if (!validateDate($derniere_epreuve) || !validateDate($premiere_circulation)) {
        throw new Exception("Les dates fournies ne sont pas valides.");
    }

    $sql = "INSERT INTO conteneur (num_serie, num_client, derniere_epreuve, marques, ref_client, constat_dechargement, 1ere_circulation, poids, capacite, ep) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssssss", $num_serie, $num_client, $derniere_epreuve, $marques, $ref_client, $constat_dechargement, $premiere_circulation, $poids, $capacite, $ep);
    $stmt->execute();

    $feedback_class = "";
    $feedback_message = "";
    if ($stmt->affected_rows > 0) {
        $feedback_class = "alert-success";
        $feedback_message = "Le conteneur a été ajouté avec succès.";
    } else {
        $feedback_class = "alert-danger";
        $feedback_message = "Erreur: " . $stmt->error;
    }
    $stmt->close();
}
$conn->close();
?>

<div class="container mx-auto mt-10">
    <div class="w-full sm:w-3/4 md:w-1/2 mx-auto">
        <div class="bg-<?php echo $feedback_class === 'alert-success' ? 'green' : 'red'; ?>-100 border border-<?php echo $feedback_class === 'alert-success' ? 'green' : 'red'; ?>-400 text-<?php echo $feedback_class === 'alert-success' ? 'green' : 'red'; ?>-700 px-4 py-3 rounded relative mb-6" role="alert">
            <span class="block sm:inline"><?php echo $feedback_message; ?></span>
        </div>
    </div>
</div>   

<?php include 'footer.php'; ?>