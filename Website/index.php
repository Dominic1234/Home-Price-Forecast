<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Price Forecast</title>
    <link rel="stylesheet" href="styles.css">
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
        .hero h1, .hero p {
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
            <nav>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="forecast1.php">Forecast</a></li>
                    <li><a href="about.php">About</a></li>
                </ul>
            </nav>
        </div>
    </header>
    
    <section class="hero">
        <h1>Start Your Property Forecast Today</h1>
        <p>Accurate machine learning predictions for Melbourne real estate.</p>
        <a href="forecast.php" class="btn">Get Started</a>
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
</body>
</html>