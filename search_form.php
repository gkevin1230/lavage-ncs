<div class="max-w-md mx-auto relative">
    <div class="flex items-center w-full px-1 h-12 rounded-lg focus-within:shadow-lg bg-white overflow-hidden">
        <div class="grid place-items-center h-full w-12 text-gray-300">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
        </div>
        <input
            type="text"
            class="peer h-full w-full outline-none text-sm text-gray-700 pr-2"
            id="num_serie"
            name="num_serie"
            placeholder="Entrez le code du conteneur"
            autocomplete="off"
        />
        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
            Rechercher
        </button>
    </div>
    <div id="suggestions" class="w-full p-2 list-group absolute left-0 mt-1 bg-white border border-gray-200 rounded-lg shadow z-10"></div>
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
</script>
