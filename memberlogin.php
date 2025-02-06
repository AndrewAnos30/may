<?php
// Start the session to store user data
session_start();

// Check if the user is already logged in
if (isset($_SESSION['uid'])) {
    // Redirect to the index.php page if already logged in
    header("Location: index.php");
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

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $uid = $_POST['uid']; // UID for admin or QR ID for member

    // Query for member login (either QRID or UID)
    $sql = "SELECT * FROM members WHERE qrID = ? OR UID = ?";

    // Prepare and execute the query
    $stmt = $conn->prepare($sql);
    
    // Bind the UID to both qrID and UID columns
    $stmt->bind_param("ss", $uid, $uid);

    $stmt->execute();
    $result = $stmt->get_result();

    // Check if any record was found for the member
    if ($result->num_rows > 0) {
        // If login is successful, store user info in session
        $_SESSION['uid'] = $uid;
        // Redirect to the index.php for member login
        header("Location: index.php");
        exit();
    } else {
        // If login fails, show an error message
        $error = "Invalid QR ID or UID!";
    }

    $stmt->close();
}

$conn->close();
?>