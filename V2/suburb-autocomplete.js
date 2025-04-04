$(document).ready(function () {
    const suburbList = {
        "Abbotsford": 3067,
        "Airport West": 3042,
        "Albert Park": 3206,
        "Alphington": 3078,
        "Altona": 3018,
        "Altona North": 3025,
        "Armadale": 3143,
        "Ascot Vale": 3032,
        "Carlton": 3053,
        "Docklands": 3008,
        "Fitzroy": 3065,
        "Melbourne CBD": 3000,
        "Richmond": 3121,
        "South Yarra": 3141,
        "St Kilda": 3182,
        "Toorak": 3142
    };

    let selectedIndex = -1;

    $('#suburbSearch').on("input", function () {
        const query = $(this).val().toLowerCase().trim();
        const suggestions = $("#suggestions");
        suggestions.empty();
        $("#selectedSuburb").val("");
        $("#postcode").val("");
        selectedIndex = -1;

        if (query.length >= 1) {
            const sorted = Object.keys(suburbList).sort();
            let found = false;

            sorted.forEach(suburb => {
                const postcode = suburbList[suburb];
                const display = `${suburb}, ${postcode}`;
                if (
                    suburb.toLowerCase().includes(query) ||
                    postcode.toString().includes(query)
                ) {
                    suggestions.append(
                        `<div class="suggestion-item" data-suburb="${suburb}" data-postcode="${postcode}" data-display="${display}" style="padding:10px;cursor:pointer;">${display}</div>`
                    );
                    found = true;
                }
            });

            if (!found) {
                suggestions.append(`<div class="no-match" style="padding: 10px; color: red;">No matching suburb found.</div>`);
            }

            suggestions.show();
        } else {
            suggestions.hide();
        }
    });

    // Keyboard navigation: ↓ ↑ Enter
    $('#suburbSearch').on("keydown", function (e) {
        const suggestions = $("#suggestions .suggestion-item");
        const count = suggestions.length;
        if (count === 0) return;

        if (e.key === "ArrowDown") {
            e.preventDefault();
            selectedIndex = (selectedIndex + 1) % count;
            suggestions.removeClass("highlight");
            const selectedItem = suggestions.eq(selectedIndex);
            selectedItem.addClass("highlight")[0].scrollIntoView({ block: "nearest", behavior: "smooth" });
        }

        else if (e.key === "ArrowUp") {
            e.preventDefault();
            selectedIndex = (selectedIndex - 1 + count) % count;
            suggestions.removeClass("highlight");
            const selectedItem = suggestions.eq(selectedIndex);
            selectedItem.addClass("highlight")[0].scrollIntoView({ block: "nearest", behavior: "smooth" });
        }

        else if (e.key === "Enter") {
            e.preventDefault();
        
            const suggestions = $("#suggestions .suggestion-item");
        
            // If nothing is selected, choose the first one
            let $targetItem;
            if (selectedIndex === -1 && suggestions.length > 0) {
                $targetItem = suggestions.first();
            } else {
                $targetItem = suggestions.eq(selectedIndex);
            }
        
            if ($targetItem.length === 1) {
                $targetItem.trigger("click");
                selectedIndex = -1;
            }
        }
    });

    // Click a suggestion to select
    $(document).on("click", "#suggestions .suggestion-item", function () {
        const suburb = $(this).data("suburb");
        const postcode = $(this).data("postcode");
        const display = $(this).data("display");

        $("#suburbSearch").val(display);
        $("#selectedSuburb").val(suburb);
        $("#postcode").val(postcode);
        $("#suburbSearch").removeClass("input-error");
        $("#suggestions").hide();
    });

    // Hide suggestions when clicking outside
    $(document).on("click", function (e) {
        if (!$(e.target).closest("#suburbSearch, #suggestions").length) {
            $("#suggestions").hide();
        }
    });

    // Blur validation for suburb
    $('#suburbSearch').on("blur", function () {
        const selected = $("#selectedSuburb").val();
        const typed = $(this).val()?.trim();

        const isMatch = Object.keys(suburbList).some(suburb => {
            const code = suburbList[suburb];
            const combined = `${suburb}, ${code}`;
            return typed === suburb || typed === combined;
        });

        if (!selected && !isMatch) {
            $(this).addClass("input-error");
        } else {
            $(this).removeClass("input-error");
        }

        setTimeout(() => {
            $("#suggestions").hide();
        }, 200);
    });

    // Generic blur validation for all required fields
    $(document).on("blur", "input:required, select:required, textarea:required", function () {
        const val = $(this).val()?.trim();
        if (!val || val === "Choose a number" || val === "Select Year" || val === "Select Month") {
            $(this).addClass("input-error");
        } else {
            $(this).removeClass("input-error");
        }
    });

    // Remove red border while fixing input
    $(document).on("input change", "input, select, textarea", function () {
        if ($(this).val()?.trim()) {
            $(this).removeClass("input-error");
        }
    });

    // Final form validation before submit
    $("#forecastForm").on("submit", function (e) {
        let isValid = true;

        $(this).find("input:required, select:required, textarea:required").each(function () {
            const val = $(this).val()?.trim();
            if (!val || val === "Choose a number" || val === "Select Year" || val === "Select Month") {
                $(this).addClass("input-error");
                isValid = false;
            } else {
                $(this).removeClass("input-error");
            }
        });

        const suburb = $("#selectedSuburb").val();
        const postcode = $("#postcode").val();
        if (!suburb || !postcode) {
            $("#suburbSearch").addClass("input-error");
            isValid = false;
        } else {
            $("#suburbSearch").removeClass("input-error");
        }

        if (!isValid) {
            alert("Please complete all required fields.");
            e.preventDefault();
        }
    });
});
