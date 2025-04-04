<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Troubleshoot - Home Price Forecast</title>
  <link rel="stylesheet" href="styles.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
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
    .container {
      max-width: 1000px;
      margin: 60px auto;
      padding: 0 20px;
    }
    section {
      margin-bottom: 50px;
    }
    section h2 {
      font-size: 26px;
      margin-bottom: 10px;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 15px;
    }
    th, td {
      border: 1px solid #ccc;
      padding: 12px 15px;
      text-align: left;
      font-size: 16px;
    }
    th {
      background-color: #f5f5f5;
    }
    footer {
      text-align: center;
      padding: 20px;
      background: #f9f9f9;
      font-size: 13px;
      color: #666;
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
    <section id="overview">
      <h2>Overview</h2>
      <p>This page provides solutions to common issues...</p>
    </section>

    <section id="login">
      <h2>Login Issues</h2>
      <table>
        <tr><th>Issue</th><th>Solution</th></tr>
        <tr><td>Incorrect password</td><td>Click "Forgot Password"</td></tr>
      </table>
    </section>

    <section id="forecast">
      <h2>Forecast Problems</h2>
      <table>
        <tr><th>Issue</th><th>Solution</th></tr>
        <tr><td>No prediction result</td><td>Ensure all fields...</td></tr>
      </table>
    </section>

    <section id="api">
      <h2>API Errors</h2>
      <table>
        <tr><th>Error</th><th>Description</th></tr>
        <tr><td>500</td><td>The model server is down...</td></tr>
      </table>
    </section>
  </div>

  <footer>
    &copy; 2025 Home Price Forecast Help Center. All rights reserved.
  </footer>

  <script src="sections.js"></script>
  <script src="search.js"></script>
</body>
</html>

