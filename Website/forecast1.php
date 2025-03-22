<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Property Forecast Questionnaire</title>

    <!-- Load jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            text-align: center;
        } 
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            background-color: #333;
            color: white;
        }
        .navbar ul {
            list-style: none;
            padding: 0;
            display: flex;
        }
        .navbar ul li {
            margin: 0 15px;
        }
        .navbar ul li a {
            color: white;
            text-decoration: none;
        }
        .container {
            background: white;
            max-width: 700px;
            margin: 50px auto;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            text-align: left;
        }
        label {
            font-weight: bold;
            display: block;
            margin-top: 15px;
        }
        input, select {
            width: 100%;
            padding: 12px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            background: white;
        }
        button {
            background: #007bff;
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
            margin-top: 20px;
        }
        button:hover {
            background: #0056b3;
        }
        .search-container {
            position: relative;
            display: inline-block;
            width: 100%;
        }
        .suggestions {
            position: absolute;
            background: white;
            border: 1px solid #ccc;
            width: 100%;
            max-height: 200px;
            overflow-y: auto;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
            display: none;
            text-align: left;
            padding-left: 10px;
        }
        .suggestions div {
            padding: 10px;
            cursor: pointer;
        }
        .suggestions div:hover {
            background: #f0f0f0;
        }
        .info {
            font-size: 14px;
            color: gray;
            margin-bottom: 10px;
        }

        /* Make Year and Month side by side */
        .row {
            display: flex;
            justify-content: space-between;
            gap: 10px;
        }
        .row select {
            width: 48%;
        }
    </style>
</head>
<body>
    <header>
        <div class="navbar">
            <div class="logo">Home Price Forecast</div>
            <nav>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="forecast.php">Forecast</a></li>
                    <li><a href="about.php">About</a></li>
                </ul>
            </nav>
        </div>
    </header>

<div class="container">
    <h2>Property Forecast Questionnaire</h2>
    <p class="info">Fill in the details to get a forecast for your desired property.</p>

    <form class="form-container" action="forecast2.php" method="POST">
        
        <label for="suburbSearch">Which suburb are you interested in?</label>
        <div class="search-container">
            <input type="text" id="suburbSearch" name="postcode" placeholder="Search for a suburb" autocomplete="off" required>
            <div class="suggestions" id="suggestions"></div>
        </div>

        <label>When do you plan to buy the house?</label>
        <div class="row">
            <select name="year" required>
                <option value="" disabled selected>Select Year</option>
                <?php for ($year = date('Y'); $year <= date('Y') + 10; $year++) { echo "<option value='$year'>$year</option>"; } ?>
            </select>

            <select name="month" required>
                <option value="" disabled selected>Select Month</option>
                <?php 
                $months = [
                    "January", "February", "March", "April", "May", "June",
                    "July", "August", "September", "October", "November", "December"
                ];
                foreach ($months as $month) { echo "<option value='$month'>$month</option>"; }
                ?>
            </select>
        </div>

        <label for="rooms">How many rooms do you need?</label>
        <select name="rooms" required>
            <option value="" disabled selected>Choose a number</option>
            <?php for ($i = 1; $i <= 10; $i++) { echo "<option value='$i'>$i</option>"; } ?>
        </select>

        <label for="bathroom">How many bathrooms do you need?</label>
        <select name="bathroom" required>
            <option value="" disabled selected>Choose a number</option>
            <?php for ($i = 1; $i <= 10; $i++) { echo "<option value='$i'>$i</option>"; } ?>
        </select>

        <label for="car">How many car spaces do you need?</label>
        <select name="car" required>
            <option value="" disabled selected>Choose a number</option>
            <?php for ($i = 1; $i <= 10; $i++) { echo "<option value='$i'>$i</option>"; } ?>
        </select>

        <label for="landsize">How much land size do you prefer? (in sqm)</label>
        <select name="landsize" required>
            <option value="" disabled selected>Choose a number</option>
            <?php for ($i = 1; $i <= 10; $i++) { echo "<option value='$i'>$i</option>"; } ?>
        </select>

        <label for="buildingarea">How big should the building area be? (in sqm)</label>
        <select name="buildingarea" required>
            <option value="" disabled selected>Choose a number</option>
            <?php for ($i = 1; $i <= 10; $i++) { echo "<option value='$i'>$i</option>"; } ?>
        </select>

        <label for="distance">How far from CBD do you prefer? (km)</label>
        <select name="distance" required>
            <option value="" disabled selected>Choose a number</option>
            <?php for ($i = 1; $i <= 10; $i++) { echo "<option value='$i'>$i km</option>"; } ?>
        </select>

        <button type="submit">Get Forecast</button>
    </form>
</div>

<script>
    $(document).ready(function() {
        var suburbList = {
            "Abbotsford": 3067, "Airport West": 3042, "Albert Park": 3206, "Alphington": 3078, 
            "Altona": 3018, "Altona North": 3025, "Armadale": 3143, "Ascot Vale": 3032,
            "Carlton": 3053, "Docklands": 3008, "Fitzroy": 3065, "Melbourne CBD": 3000,
            "Richmond": 3121, "South Yarra": 3141, "St Kilda": 3182, "Toorak": 3142
        };

        $('#suburbSearch').on("input", function() {
            var query = $(this).val().toLowerCase();
            var suggestions = $("#suggestions");
            suggestions.empty();

            if (query.length > 1) {
                $.each(suburbList, function(suburb, postcode) {
                    if (suburb.toLowerCase().includes(query)) {
                        suggestions.append("<div data-postcode='" + postcode + "'>" + suburb + "</div>");
                    }
                });

                suggestions.show();
            } else {
                suggestions.hide();
            }
        });

        $(document).on("click", ".suggestions div", function() {
            $("#suburbSearch").val($(this).text());
            $("#suggestions").hide();
        });

        $(document).click(function(e) {
            if (!$(e.target).closest("#suburbSearch, #suggestions").length) {
                $("#suggestions").hide();
            }
        });
    });
</script>

</body>
</html>
