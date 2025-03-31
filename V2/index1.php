<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Price Forecast</title>
    <link rel="stylesheet" href="styles.css">
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

        #searchInput::placeholder {
            color: #888;
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

        .hero {
            background-color: black;
            height: 200px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 24px;
            flex-direction: column;
            text-align: center;
        }

        .hero h1,
        .hero p {
            margin: 0;
        }

        .content {
            padding: 20px;
            background: white;
            max-width: 800px;
            margin: auto;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            background: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 10px;
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
                    <li><a href="forecast3.php">Forecast</a></li>
                    <li><a href="about1.php">About</a></li>
                    <li><a href="trobleshoot3.php">Troubleshoot</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <section class="hero">
        <h1>Start Your Property Forecast Today</h1>
        <p>Accurate machine learning predictions for Melbourne real estate.</p>
        <a href="forecast3.php" class="btn">Get Started</a>
    </section>

    <div class="content">
        <h2>Why Choose Us?</h2>
        <p>✔ AI-Powered Predictions</p>
        <p>✔ Up-to-date Market Insights</p>
        <p>✔ Easy-to-Use Platform</p>
    </div>

    <footer>
        <p>&copy; 2025 Home Price Forecast Team. All rights reserved.</p>
    </footer>

    <script src="sections.js"></script>
    <script src="search.js"></script>
</body>

</html>