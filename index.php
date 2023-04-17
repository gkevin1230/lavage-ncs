<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Recherche de conteneur</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
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
</body>
</html>
