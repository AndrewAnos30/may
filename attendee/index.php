<?php
session_start();

if (!isset($_SESSION['user'])) {
    header('Location: ../login.html');  // Redirect to login if not logged in
    exit();
}

// Continue fetching and displaying data after confirming user is logged in
include '../db_connection.php'; 

// Get the UID of the logged-in user from the session
$uid = $_SESSION['user'];

// Fetch user data from the database
$query = "SELECT firstname, middlename, lastname FROM attendee WHERE uid = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $uid);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

if ($user) {
    // Format the name
    $firstname = $user['firstname'];
    $middlename = $user['middlename'];
    $lastname = $user['lastname'];
    $formattedName = $firstname . ' ' . strtoupper(substr($middlename, 0, 1)) . '. ' . $lastname;
} else {
    // In case user data is not found
    $formattedName = 'Unknown User';
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Dashboard</title>
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
        .camera-button {
            position: fixed;
            bottom: 20px;
            right: 20px;
            width: 60px;
            height: 60px;
            background-color: #002d22;
            color: white;
            border: none;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 30px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.2);
            cursor: pointer;
            z-index: 999; /* Ensures button is above other elements */
        }
        .camera-button:hover {
            background-color: #002d22;
        }
    </style>
</head>
<body>
<div class="navbar">
        <div class="nav-links">
            <a href="./index.php">Home</a>
            <a href="./map.php">Map</a>
            <a href="./attendeeProfile.php">Profile</a>
        </div>
        <div class="logout-container">
        <form method="POST" action="../logout.php">
                <button type="submit">Logout</button>
            </form>        
        </div>
    </div>
    <div class="container">
        <h1>Hi, <?php echo htmlspecialchars($formattedName); ?></h1>
        <p class="uid">UID: <?php echo htmlspecialchars($uid); ?></p>
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
<!-- Camera button with JavaScript redirection -->
<button class="camera-button" onclick="window.location.href='scan.php';">
    <i class="fas fa-camera"></i>
</button>

    </button>
</body>
</html>
