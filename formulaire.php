<?php include("header.php"); ?>

    <div class="container">
        <h1>Ajouter un conteneur</h1>
        <form action="ajouter.php" method="post">
            <div class="form-group">
                <label for="num_serie">Numéro de série:</label>
                <input type="text" class="form-control" id="num_serie" name="num_serie" required>
            </div>
            <div class="form-group">
                <label for="num_client">Numéro client:</label>
                <input type="text" class="form-control" id="num_client" name="num_client">
            </div>
            <div class="form-group">
                <label for="derniere_epreuve">Dernière épreuve:</label>
                <input type="date" class="form-control" id="derniere_epreuve" name="derniere_epreuve">
            </div>
            <div class="form-group">
                <label for="marques">Marques:</label>
                <input type="text" class="form-control" id="marques" name="marques">
            </div>
            <div class="form-group">
                <label for="ref_client">Référence client:</label>
                <input type="text" class="form-control" id="ref_client" name="ref_client">
            </div>
            <div class="form-group">
                <label for="constat_dechargement">Constat de déchargement:</label>
                <textarea class="form-control" id="constat_dechargement" name="constat_dechargement" rows="4"></textarea>
            </div>
            <div class="form-group">
                <label for="1ere_circulation">1ère circulation:</label>
                <input type="date" class="form-control" id="1ere_circulation" name="1ere_circulation">
            </div>
            <div class="form-group">
                <label for="poids">Poids:</label>
                <input type="number" step="0.01" class="form-control" id="poids" name="poids">
            </div>
            <div class="form-group">
                <label for="capacite">Capacité:</label>
                <input type="number" step="0.01" class="form-control" id="capacite" name="capacite">
            </div>
            <div class="form-group">
                <label for="ep">Épaisseur:</label>
                <input type="number" step="0.01" class="form-control" id="ep" name="ep">
            </div>
            <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>
    </div>

<?php include 'footer.php'; ?>