<?php include("header.php"); ?>

<div class="container mx-auto mt-10">
    <div class="w-full sm:w-3/4 md:w-1/2 mx-auto">
        <h1 class="text-4xl font-bold mb-6 text-center">Ajouter un conteneur</h1>
        <form action="ajouter.php" method="post">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="num_serie" class="block text-sm font-medium text-gray-700">Numéro de série:</label>
                    <input type="text" class="mt-1 block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" id="num_serie" name="num_serie" required>
                </div>
                <div>
                    <label for="num_client" class="block text-sm font-medium text-gray-700">Numéro client:</label>
                    <input type="text" class="mt-1 block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" id="num_client" name="num_client">
                </div>
                <div>
                    <label for="derniere_epreuve" class="block text-sm font-medium text-gray-700">Dernière épreuve:</label>
                    <input type="date" class="mt-1 block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" id="derniere_epreuve" name="derniere_epreuve">
                </div>
                <div>
                    <label for="1ere_circulation" class="block text-sm font-medium text-gray-700">1ère circulation:</label>
                    <input type="date" class="mt-1 block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" id="1ere_circulation" name="1ere_circulation">
                </div>
                <div class="md:col-span-2">
                    <label for="marques" class="block text-sm font-medium text-gray-700">Marques:</label>
                    <input type="text" class="mt-1 block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" id="marques" name="marques">
                </div>
                <div class="md:col-span-2">
                    <label for="ref_client" class="block text-sm font-medium text-gray-700">Référence client:</label>
                    <input type="text" class="mt-1 block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" id="ref_client" name="ref_client">
                </div>
                <div class="md:col-span-2">
                    <label for="constat_dechargement" class="block text-sm font-medium text-gray-700">Constat de déchargement:</label>
                    <textarea class="mt-1 block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" id="constat_dechargement" name="constat_dechargement" rows="4"></textarea>
                </div>
                <div class="md:col-span-2">
                    <div class="grid grid-cols-3 gap-6">
                        <div>
                            <label for="poids" class="block text-sm font-medium text-gray-700">Poids:</label>
                            <input type="number" step="0.01" class="mt-1 block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" id="poids" name="poids">
                        </div>
                        <div>
                            <label for="capacite" class="block text-sm font-medium text-gray-700">Capacité:</label>
                            <input type="number" step="0.01" class="mt-1 block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" id="capacite" name="capacite">
                        </div>
                        <div>
                            <label for="ep" class="block text-sm font-medium text-gray-700">Épaisseur:</label>
                            <input type="number" step="0.01" class="mt-1 block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" id="ep" name="ep">
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-6">
                <button type="submit" class="w-full bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                    Ajouter
                </button>
            </div>
        </form>   
    </div>
</div>

<?php include 'footer.php'; ?>