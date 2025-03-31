<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Property Forecast Questionnaire</title>
    <link rel="stylesheet" href="styles.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
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

        .search-wrapper {
            position: relative;
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
        }

        #searchInput {
            background-color: white;
            color: black;
            border: none;
            border-radius: 24px;
            padding: 12px 24px;
            font-size: 16px;
            width: 100%;
            outline: none;
            box-shadow: 0 1px 6px rgb(0, 0, 0);
        }

        #resultsContainer {
            display: none;
            position: absolute;
            top: 100%;
            left: 50%;
            transform: translateX(-50%);
            background-color: white;
            border-radius: 10px;
            margin-top: 8px;
            max-width: 600px;
            width: 100%;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.4);
            z-index: 1000;
            padding: 8px 0;
        }

        .result {
            padding: 12px 24px;
            color: black;
            cursor: pointer;
            font-size: 15px;
        }

        .result:hover {
            background-color: rgb(235, 235, 235);
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

        input,
        select {
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

        .info {
            font-size: 14px;
            color: gray;
            margin-bottom: 10px;
            text-align: center;
        }

        .row {
            display: flex;
            justify-content: space-between;
            gap: 10px;
        }

        .row select {
            width: 48%;
        }

        .result-box {
            margin-top: 30px;
            padding: 20px;
            background: #e6ffe6;
            border-left: 4px solid green;
            display: none;
        }

        .suggestions {
            position: absolute;
            background-color: white;
            border: 1px solid #ccc;
            width: 100%;
            max-height: 200px;
            overflow-y: auto;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
            z-index: 999;
            display: none;
        }

        .suggestions div {
            padding: 10px;
            cursor: pointer;
            font-size: 14px;
        }

        .suggestions div:hover {
            background-color: #f0f0f0;
        }
    </style>
</head>

<body>
    <header>
        <div class="navbar">
            <div class="logo">Home Price Forecast</div>
            <div class="search-wrapper">
                <input type="text" id="searchInput" placeholder="Search..." autocomplete="off">
                <div id="resultsContainer"></div>
            </div>
            <nav>
                <ul>
                    <li><a href="index1.php">Home</a></li>
                    <li><a href="forecast2.php">Forecast</a></li>
                    <li><a href="about1.php">About</a></li>
                    <li><a href="trobleshoot3.php">Troubleshoot</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <div class="container">
        <h2>Property Forecast Questionnaire</h2>
        <p class="info">Fill in the details to get a forecast for your desired property.</p>

        <form id="forecastForm" action="predict.php" method="POST">
            <label for="suburbSearch">Suburb</label>
            <div style="position: relative;">
                <input type="text" id="suburbSearch" placeholder="Search for a suburb" autocomplete="off" required>
                <input type="hidden" name="Postcode" id="postcode">
                <div class="suggestions" id="suggestions"></div>
            </div>

            <label>Forecast date</label>
            <div class="row">
                <select name="Year" required>
                    <option value="" disabled selected>Select Year</option>
                    <script>
                        const year = new Date().getFullYear();
                        for (let i = year; i <= year + 10; i++) {
                            document.write(`<option value="${i}">${i}</option>`);
                        }
                    </script>
                </select>

                <select name="month" required>
                    <option value="" disabled selected>Select Month</option>
                    <script>
                        const months = ["January", "February", "March", "April", "May", "June",
                            "July", "August", "September", "October", "November", "December"
                        ];
                        months.forEach(m => document.write(`<option value="${m}">${m}</option>`));
                    </script>
                </select>
            </div>

            <label for="rooms">Number of rooms</label>
            <select name="Avg_Rooms" required>
                <option value="" disabled selected>Choose a number</option>
                <script>
                    for (let i = 1; i <= 10; i++) document.write(`<option value="${i}">${i}</option>`);
                </script>
            </select>

            <label for="bathroom">Number of bathrooms</label>
            <select name="Avg_Bathroom" required>
                <option value="" disabled selected>Choose a number</option>
                <script>
                    for (let i = 1; i <= 10; i++) document.write(`<option value="${i}">${i}</option>`);
                </script>
            </select>

            <label for="car">Number of car spaces</label>
            <select name="Avg_Car" required>
                <option value="" disabled selected>Choose a number</option>
                <script>
                    for (let i = 1; i <= 10; i++) document.write(`<option value="${i}">${i}</option>`);
                </script>
            </select>

            <label for="landsize">Land size (sqm)</label>
            <select name="Avg_Landsize" required>
                <option value="" disabled selected>Choose a number</option>
                <script>
                    for (let i = 1; i <= 10; i++) document.write(`<option value="${i}">${i * 100}</option>`);
                </script>
            </select>

            <label for="buildingarea">Building area (sqm)</label>
            <select name="Avg_BuildingArea" required>
                <option value="" disabled selected>Choose a number</option>
                <script>
                    for (let i = 1; i <= 10; i++) document.write(`<option value="${i}">${i * 50}</option>`);
                </script>
            </select>

            <label for="distance">Distance from CBD (km)</label>
            <select name="Avg_Distance" required>
                <option value="" disabled selected>Choose a number</option>
                <script>
                    for (let i = 1; i <= 10; i++) document.write(`<option value="${i}">${i} km</option>`);
                </script>
            </select>
            <input type="hidden" name="Avg_Lattitude" value="-37.8136">
            <input type="hidden" name="Avg_Longtitude" value="144.9631">
            <input type="hidden" name="Price_Change" value="0.05">

            <button type="submit">Get Forecast</button>
        </form>

        <div class="result-box" id="forecastResult"></div>
    </div>

    <footer>
        <p style="text-align:center">&copy; 2025 Home Price Forecast Team. All rights reserved.</p>
    </footer>

    <script src="sections.js"></script>
    <script src="search.js"></script>
    <script src="suburb-autocomplete.js"></script>

</body>

</html>
