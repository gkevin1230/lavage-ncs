$(document).ready(function() {
    $("#num_serie").on("input", function() {
        let query = $(this).val();
        if (query.length) {
            $.ajax({
                url: "autocomplete.php",
                type: "GET",
                data: {query: query},
                success: function(data) {
                    $("#suggestions").html(data).removeClass("hidden");
                }
            });
        } else {
            $("#suggestions").html("").addClass("hidden");
        }
    });

    $(document).on("click", ".list-group-item", function() {
        $("#num_serie").val($(this).text());
        $("#suggestions").html("").addClass("hidden");
    });
});