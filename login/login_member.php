<?php
session_start();
include '../db_connection.php'; // Ensure you have a database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $uid = $_POST['uid'];

    $query = "SELECT * FROM attendee WHERE uid = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $uid);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $_SESSION['user'] = $uid;
        header("Location: ../attendee/index.php"); // Redirect to member dashboard
    } else {
        echo "Invalid UID!";
    }

    $stmt->close();
    $conn->close();
}
?>
