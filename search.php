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

        <div class="container mx-auto mt-10">
            <h1 class="text-4xl font-bold mb-6 text-center">Information du conteneur : <?php echo $num_serie; ?></h1>
            
            <div class="max-w-md mx-auto relative mb-6">
                <form action="search.php" method="post">

                    <?php include("search_form.php"); ?>
                    
                </form>
            </div>

            <div class="bg-white rounded shadow-md w-full sm:w-3/4 md:w-1/2 mx-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <tbody class="bg-white divide-y divide-gray-200">
                    <?php    
                    foreach ($row as $key => $value) {
                        if ($key === '1ere_circulation' || $key === 'derniere_epreuve') {
                            $date = DateTime::createFromFormat('Y-m-d', $value);
                            $formatted_date = $date->format('d/m/Y');
                            echo '<tr><th class="px-6 py-4 text-left font-semibold text-gray-700">' . htmlspecialchars($key) . '</th><td class="px-6 py-4 text-left text-gray-600">' . htmlspecialchars($formatted_date) . '</td></tr>';
                        } else {
                            echo '<tr><th class="px-6 py-4 text-left font-semibold text-gray-700">' . htmlspecialchars($key) . '</th><td class="px-6 py-4 text-left text-gray-600">' . htmlspecialchars($value) . '</td></tr>';
                        }
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    <?php     
    } else {
        header("Location: formulaire.php");
    }
    $stmt->close();
}
$conn->close();
?>

<?php include 'footer.php'; ?>
