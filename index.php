<?php
// Start the session to store user data
session_start();

// Check if the user is logged in
if (!isset($_SESSION['uid'])) {
    // If not logged in, redirect to login page
    header("Location: login.php");
    exit();
}

// Database connection details
$servername = "localhost";
$username = "root"; // Default XAMPP username
$password = ""; // Default XAMPP password is empty
$dbname = "convention"; // Replace with your actual database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the logged-in user's uid (from session)
$uid = $_SESSION['uid'];

// Query to fetch all user details based on UID or QRID
$sql = "SELECT * FROM members WHERE qrID = ? OR UID = ?";

// Prepare and execute the query
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $uid, $uid);
$stmt->execute();
$result = $stmt->get_result();

// Check if user details are found
if ($result->num_rows > 0) {
    // Fetch the user data (all columns)
    $user = $result->fetch_assoc();
} else {
    // If user not found, show an error message
    echo "User not found.";
    exit();
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }
        .navbar {
            position: fixed; /* Fixes the navbar at the top */
            top: 0;
            left: 0;
            width: 100%; /* Ensures navbar spans the full width */
            background-color: white;
            padding: 10px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 0; /* Remove rounded corners */
            z-index: 1000; /* Makes sure it stays on top */
        }
        .navbar button {
            background-color: #002d22;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 5px;
            box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);
        }
        .container {
            text-align: center;
            margin-top: 60px; /* Add space for the fixed navbar */
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
            background-color:rgb(118, 156, 147);
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <form method="POST" action="logout.php">
            <button type="submit">Logout</button>
        </form>
    </div>
    <div class="container">
    <h1>Hi, <?php echo htmlspecialchars($user['firstname']) . ' ' . strtoupper(substr($user['middlename'], 0, 1)) . '. ' . htmlspecialchars($user['lastname']); ?>!</h1>
    <p class="uid">UID: <?php echo $uid; ?></p>
        <table>
            <tr>
                <th>Column 1</th>
                <th>Column 2</th>
            </tr>
            <tr><td>Row 1</td><td>Row 1</td></tr>
            <tr><td>Row 2</td><td>Row 2</td></tr>
            <tr><td>Row 3</td><td>Row 3</td></tr>
            <tr><td>Row 4</td><td>Row 4</td></tr>
            <tr><td>Row 5</td><td>Row 5</td></tr>
            <tr><td>Row 6</td><td>Row 6</td></tr>
            <tr><td>Row 7</td><td>Row 7</td></tr>
            <tr><td>Row 8</td><td>Row 8</td></tr>
            <tr><td>Row 9</td><td>Row 9</td></tr>
            <tr><td>Row 10</td><td>Row 10</td></tr>
        </table>
    </div>
</body>
</html>
