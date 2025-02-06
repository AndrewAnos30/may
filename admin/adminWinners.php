<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }
        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background-color: white;
            padding: 10px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            z-index: 1000;
            display: flex;
            align-items: center;
        }
        .nav-links {
            display: flex;
            gap: 20px;
            margin-left: 20px;
        }
        .logout-container {
            margin-left: auto;
            margin-right: 20px;
        }
        .navbar a {
            text-decoration: none;
            color: black;
            padding: 10px;
        }
        .navbar button {
            background-color: #51160f;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 5px;
            box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);
        }
        .container {
            text-align: center;
            margin-top: 60px;
            padding: 20px;
        }
        .uid {
            font-size: 12px;
            color: gray;
        }
        table {
            width: 50%;
            margin: 20px auto;
            border-collapse: collapse;
            background: white;
            border-radius: 10px;
            box-shadow: 4px 4px 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #f1f1f1;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <div class="nav-links">
            <a href="adminWinners.html">Home</a>
            <a href="adminCreation.html">Create</a>
            <a href="adminData.html">Members</a>
        </div>
        <div class="logout-container">
            <button>Logout</button>
        </div>
    </div>
    <div class="container">
        <h1>Hi, John!</h1>

        <table>
            <tr>
                <th>Column 1</th>
                <th>Column 2</th>
                <th>Column 3</th>
            </tr>
            <tr><td>Row 1</td><td>Row 1</td><td>Row</td></tr>
            <tr><td>Row 2</td><td>Row 2</td><td>Row</td></tr>
            <tr><td>Row 3</td><td>Row 3</td><td>Row</td></tr>
            <tr><td>Row 4</td><td>Row 4</td><td>Row</td></tr>
            <tr><td>Row 5</td><td>Row 5</td><td>Row</td></tr>
            <tr><td>Row 6</td><td>Row 6</td><td>Row</td></tr>
            <tr><td>Row 7</td><td>Row 7</td><td>Row</td></tr>
            <tr><td>Row 8</td><td>Row 8</td><td>Row</td></tr>
            <tr><td>Row 9</td><td>Row 9</td><td>Row</td></tr>
            <tr><td>Row 10</td><td>Row 10</td><td>Row</td></tr>
        </table>
    </div>
</body>
</html>
