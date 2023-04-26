<?php 

require_once "config.php";
include("header.php");

$is_modification = false;
$conteneur = array();
if (isset($_GET['num_serie'])) {
    $is_modification = true;
    $num_serie = $_GET['num_serie'];
    
    // Récupérez les informations du conteneur à modifier depuis la base de données
    $sql = "SELECT * FROM conteneur WHERE num_serie = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $num_serie);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $conteneur = $result->fetch_assoc();
    }
    $stmt->close();
}

?>

<div class="container mx-auto mt-10 px-5">
    <div class="w-full sm:w-full md:w-full lg:w-1/2 mx-auto">
        <h1 class="text-4xl font-bold mb-6 text-center"><?php echo $is_modification ? 'Modifier' : 'Ajouter'; ?> un conteneur</h1>
        <form action="ajouter_modifier.php" method="post">
            <input type="hidden" name="action" value="<?php echo $is_modification ? 'edit' : 'add'; ?>">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="num_serie" class="block text-sm font-medium text-gray-700">Numéro de série:</label>
                    <input type="text" class="mt-1 block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm <?php echo $is_modification ? 'bg-gray-200' : ''; ?>" id="num_serie" name="num_serie" required <?php echo $is_modification ? 'readonly' : ''; ?> value="<?php echo $is_modification ? $conteneur['num_serie'] : ''; ?>">
                </div>
                <div>
                    <label for="num_client" class="block text-sm font-medium text-gray-700">Numéro client:</label>
                    <input type="text" class="mt-1 block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" id="num_client" name="num_client" value="<?php echo $is_modification ? htmlspecialchars($conteneur['num_client']) : ''; ?>">
                </div>
                <div>
                    <label for="derniere_epreuve" class="block text-sm font-medium text-gray-700">Dernière épreuve:</label>
                    <input type="date" class="mt-1 block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" id="derniere_epreuve" name="derniere_epreuve" value="<?php echo $is_modification ? htmlspecialchars($conteneur['derniere_epreuve']) : ''; ?>">
                </div>
                <div>
                    <label for="1ere_circulation" class="block text-sm font-medium text-gray-700">1ère circulation:</label>
                    <input type="date" class="mt-1 block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" id="1ere_circulation" name="1ere_circulation" value="<?php echo $is_modification ? htmlspecialchars($conteneur['1ere_circulation']) : ''; ?>">
                </div>
                <div class="md:col-span-2">
                    <label for="marques" class="block text-sm font-medium text-gray-700">Marques:</label>
                    <input type="text" class="mt-1 block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" id="marques" name="marques" value="<?php echo $is_modification ? htmlspecialchars($conteneur['marques']) : ''; ?>">
                </div>
                <div class="md:col-span-2">
                    <label for="ref_client" class="block text-sm font-medium text-gray-700">Référence client:</label>
                    <input type="text" class="mt-1 block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" id="ref_client" name="ref_client" value="<?php echo $is_modification ? htmlspecialchars($conteneur['ref_client']) : ''; ?>">
                </div>
                <div class="md:col-span-2">
                    <label for="constat_dechargement" class="block text-sm font-medium text-gray-700">Constat de déchargement:</label>
                    <textarea class="mt-1 block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" id="constat_dechargement" name="constat_dechargement" rows="4"><?php echo $is_modification ? htmlspecialchars($conteneur['constat_dechargement']) : ''; ?></textarea>
                </div>
                <div class="md:col-span-2">
                    <div class="grid grid-cols-3 gap-6">
                        <div>
                            <label for="poids" class="block text-sm font-medium text-gray-700">Poids:</label>
                            <input type="number" step="0.01" class="mt-1 block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" id="poids" name="poids" value="<?php echo $is_modification ? htmlspecialchars($conteneur['poids']) : ''; ?>">
                        </div>
                        <div>
                            <label for="capacite" class="block text-sm font-medium text-gray-700">Capacité:</label>
                            <input type="number" step="0.01" class="mt-1 block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" id="capacite" name="capacite" value="<?php echo $is_modification ? htmlspecialchars($conteneur['capacite']) : ''; ?>">
                        </div>
                        <div>
                            <label for="ep" class="block text-sm font-medium text-gray-700">Épaisseur:</label>
                            <input type="number" step="0.01" class="mt-1 block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" id="ep" name="ep" value="<?php echo $is_modification ? htmlspecialchars($conteneur['ep']) : ''; ?>">
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-6">
                <button type="submit" class="w-full inline-flex justify-center items-center bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">

                <?php echo $is_modification ? '<svg width="24" height="24" class="mr-3" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M11 2H9C4 2 2 4 2 9V15C2 20 4 22 9 22H15C20 22 22 20 22 15V13" stroke="#fff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M16.04 3.02001L8.16 10.9C7.86 11.2 7.56 11.79 7.5 12.22L7.07 15.23C6.91 16.32 7.68 17.08 8.77 16.93L11.78 16.5C12.2 16.44 12.79 16.14 13.1 15.84L20.98 7.96001C22.34 6.60001 22.98 5.02001 20.98 3.02001C18.98 1.02001 17.4 1.66001 16.04 3.02001Z" stroke="#fff" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M14.91 4.1499C15.58 6.5399 17.45 8.4099 19.85 9.0899" stroke="#fff" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>' : '<svg width="24" height="24" class="mr-3" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8 12H16" stroke="#fff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M12 16V8" stroke="#fff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M9 22H15C20 22 22 20 22 15V9C22 4 20 2 15 2H9C4 2 2 4 2 9V15C2 20 4 22 9 22Z" stroke="#fff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>'; ?>

                    <?php echo $is_modification ? 'Modifier' : 'Ajouter'; ?>
                </button>
            </div>
        </form>
    </div>

</div>

<?php include 'footer.php'; ?>