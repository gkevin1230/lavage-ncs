<?php include 'header.php'; ?>

    <div class="container">
        <h1>Recherche de conteneur</h1>
        <form action="search.php" method="post">
            <div class="form-group">
                <label for="num_serie">Code du conteneur:</label>
                <input type="text" class="form-control" id="num_serie" name="num_serie" placeholder="Entrez le code du conteneur" autocomplete="off">
                <div id="suggestions" class="list-group"></div>
            </div>
            <button type="submit" class="btn btn-primary">Rechercher</button>
        </form>
    </div>
    <script>
        $(document).ready(function() {
            $("#num_serie").on("input", function() {
                let query = $(this).val();
                if (query.length) {
                    $.ajax({
                        url: "autocomplete.php",
                        type: "GET",
                        data: {query: query},
                        success: function(data) {
                            $("#suggestions").html(data);
                        }
                    });
                } else {
                    $("#suggestions").html("");
                }
            });

            $(document).on("click", ".list-group-item", function() {
                $("#num_serie").val($(this).text());
                $("#suggestions").html("");
            });
        });
    </script>

<?php include 'footer.php'; ?>