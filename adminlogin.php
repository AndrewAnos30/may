<?php
session_start();

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


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the form data
    $uid = $_POST['UID'];
    $password = $_POST['password'];

    // Query to check if the user exists and fetch their role
    $sql = "SELECT * FROM admins WHERE uid = ?";  // Replace 'admins' with your table name
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $uid);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Verify the password
        if (password_verify($password, $user['password'])) {  // Assuming passwords are hashed
            // Store the user info in session
            $_SESSION['uid'] = $user['uid'];
            $_SESSION['role'] = $user['role']; // 'superadmin' or 'admin'

            // Redirect based on the role
            if ($user['role'] === 'superadmin') {
                header('Location: adminwinners.php');
                exit();
            } else if ($user['role'] === 'admin') {
                header('Location: staff.php');
                exit();
            }
        } else {
            // Invalid password
            $error = "Invalid password.";
        }
    } else {
        // User not found
        $error = "User not found.";
    }
}
?>
