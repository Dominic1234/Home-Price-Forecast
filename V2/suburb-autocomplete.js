$(document).ready(function () {
    const suburbList = {
        "Abbotsford": 3067, "Airport West": 3042, "Albert Park": 3206, "Alphington": 3078,
        "Altona": 3018, "Altona North": 3025, "Armadale": 3143, "Ascot Vale": 3032,
        "Carlton": 3053, "Docklands": 3008, "Fitzroy": 3065, "Melbourne CBD": 3000,
        "Richmond": 3121, "South Yarra": 3141, "St Kilda": 3182, "Toorak": 3142
    };

    $('#suburbSearch').on("input", function () {
        const query = $(this).val().toLowerCase();
        const suggestions = $("#suggestions");
        suggestions.empty();

        if (query.length > 1) {
            for (const suburb in suburbList) {
                if (suburb.toLowerCase().includes(query)) {
                    suggestions.append(`<div data-suburb="${suburb}" data-postcode="${suburbList[suburb]}">${suburb}</div>`);
                }
            }
            suggestions.show();
        } else {
            suggestions.hide();
        }
    });

    $(document).on("click", "#suggestions div", function () {
        const suburb = $(this).data("suburb");
        const postcode = $(this).data("postcode");
        $("#suburbSearch").val(suburb);
        $("#postcode").val(postcode); // Set hidden field value
        $("#suggestions").hide();
    });

    $(document).on("click", function (e) {
        if (!$(e.target).closest("#suburbSearch, #suggestions").length) {
            $("#suggestions").hide();
        }
    });
});
