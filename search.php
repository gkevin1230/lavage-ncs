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

        <div class="container mx-auto mt-10 px-5">
            <h1 class="text-4xl font-bold mb-6 text-center">Information du conteneur : <?php echo $num_serie; ?></h1>
            
            <div class="max-w-md mx-auto relative mb-6">
                <form action="search.php" method="post">

                    <?php include("search_form.php"); ?>
                    
                </form>
            </div>

            <div class="w-full sm:w-full md:w-full lg:w-1/2 mx-auto">
                <div class="bg-white rounded shadow-md">
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
                
                <div class="flex space-x-4 mt-6 text-center">
                    <div class="text-center w-1/2">
                        <a href="formulaire.php?num_serie=<?php echo $num_serie; ?>" class="w-full inline-flex justify-center items-center bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded block">
                        <svg width="24" height="24" class="mr-3" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M11 2H9C4 2 2 4 2 9V15C2 20 4 22 9 22H15C20 22 22 20 22 15V13" stroke="#fff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M16.04 3.02001L8.16 10.9C7.86 11.2 7.56 11.79 7.5 12.22L7.07 15.23C6.91 16.32 7.68 17.08 8.77 16.93L11.78 16.5C12.2 16.44 12.79 16.14 13.1 15.84L20.98 7.96001C22.34 6.60001 22.98 5.02001 20.98 3.02001C18.98 1.02001 17.4 1.66001 16.04 3.02001Z" stroke="#fff" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M14.91 4.1499C15.58 6.5399 17.45 8.4099 19.85 9.0899" stroke="#fff" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        Modifier</a>
                    </div>
                    <div class="text-center w-1/2">
                        <a href="extraire.php?num_serie=<?php echo $num_serie; ?>" class="w-full inline-flex justify-center items-center bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded block">
                        <svg width="24" height="24" class="mr-3" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9 11V17L11 15" stroke="#232738" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M9 17L7 15" stroke="#232738" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M22 10V15C22 20 20 22 15 22H9C4 22 2 20 2 15V9C2 4 4 2 9 2H14" stroke="#232738" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M22 10H18C15 10 14 9 14 6V2L22 10Z" stroke="#232738" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>  
                        Extraire les données</a>
                    </div>
                </div>    
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
