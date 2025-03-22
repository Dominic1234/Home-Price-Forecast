<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Home Price Forecast</title>
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
            height: 300px;
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
            padding: 40px;
            background: white;
            max-width: 800px;
            margin: 50px auto;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .team-section {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            margin-top: 20px;
        }
        .team-member {
            background: #ddd;
            margin: 10px;
            padding: 15px;
            border-radius: 5px;
            width: 200px;
            text-align: center;
        }
        .team-member img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 10px;
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
    
    <section class="hero">
        <h1>About Home Price Forecast</h1>
        <p>Learn more about our project and the team behind it.</p>
    </section>
    
    <div class="content">
        <h2>Our Mission</h2>
        <p>
            Using 
            <strong>machine learning</strong>, we analyze market data to deliver 
            <strong>accurate forecasts</strong> for Melbourne properties.
        </p>

        <h2>Meet the Team</h2>
        <div class="team-section">
            <div class="team-member">
                <img src="images/member1.png" alt="Dhruv Sharma">
                <h3>Dhruv Sharma</h3>
                <p>Project Manager</p>
            </div>
            <div class="team-member">
                <img src="images/member2.png" alt="Igor Tumbas">
                <h3>Igor Tumbas</h3>
                <p>Lead Developer</p>
            </div>
            <div class="team-member">
                <img src="images/member3.png" alt="Kerry Kolosidhi">
                <h3>Kerry Kolosidhi</h3>
                <p>Machine Learning Engineer</p>
            </div>
            <div class="team-member">
                <img src="images/member4.png" alt="Aksha Mehjabin">
                <h3>Aksha Mehjabin</h3>
                <p>Business Analyst</p>
            </div>
            <div class="team-member">
                <img src="images/member5.png" alt="Taner Bodur">
                <h3>Taner Bodur</h3>
                <p>Software Engineer</p>
            </div>
        </div>
    </div>
    
    <footer>
        <p>&copy; 2025 Home Price Forecast Team. All rights reserved.</p>
    </footer>
</body>
</html>
