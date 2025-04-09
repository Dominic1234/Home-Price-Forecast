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
        
        .input-error {
            border: 2px solid red !important;
            background-color: #fff0f0;
        }
        .suggestion-item.highlight {
            background-color: #e0e0e0;
        }
        .slider-container {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-top: 10px;
        }
        input[type="range"] {
            flex: 1;
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
                    <li><a href="index.php">Home</a></li>
                    <li><a href="forecast.php">Forecast</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="troubleshoot.php">Troubleshoot</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <div class="container">
        <h2>Property Forecast Questionnaire</h2>
        <p class="info">Fill in the details to get a forecast for your desired property.</p>

        <form id="forecastForm" method="POST" action="predict.php" novalidate>
            
            <label for="suburbSearch">Suburb</label>
            <div style="position: relative;">
                <input type="text" id="suburbSearch" placeholder="Search for a suburb" autocomplete="off" required>
                <input type="hidden" name="Suburb" id="selectedSuburb">
                <input type="hidden" name="Postcode" id="postcode">
                <div class="suggestions" id="suggestions" style="position: absolute; background: white; border: 1px solid #ccc; width: 100%; max-height: 200px; overflow-y: auto; z-index: 999; display: none;"></div>
            </div>

            <label for="years">What years would you like to buy or sell a property?</label>
            <select name="Year" required>
                <option value="" disabled selected>Choose a number</option>
                <script>
                    const year = new Date().getFullYear();
                    for (let i = year; i <= year + 10; i++) {
                        document.write(`<option value="${i}">${i}</option>`);
                    }
                </script>
            </select>

            <label for="rooms">Number of bedrooms</label>
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

            <label for="landsize">What is the size of the block (sqm)?</label>
            <div class="slider-container">
                <input type="range" id="landsize" name="Avg_Landsize" min="1" max="1000" step="1" value="500" oninput="landsizeValue.value = this.value">
                <output id="landsizeValue">500</output> sqm
            </div>

            <label for="buildingarea">What is the house footprint (sqm)?</label>
            <div class="slider-container">
                <input type="range" id="buildingarea" name="Avg_BuildingArea" min="1" max="500" step="1" value="250" oninput="buildingAreaValue.value = this.value">
                <output id="buildingAreaValue">250</output> sqm
            </div>

            <label for="distance">Distance from CBD (km)</label> 
            <div class="slider-container">
                <input type="range" id="distance" name="Avg_Distance" min="1" max="50" step="0.1" value="25" oninput="distanceValue.textContent = parseFloat(this.value).toFixed(1)">
                <output id="distanceValue">25</output> km
            </div>
            <input type="hidden" name="Month" value="1">

            <button>Get Forecast</button>
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
