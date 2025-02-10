<?php
session_start();
include '../db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $uid = $_POST['UID'];
    $password = $_POST['password'];

    $query = "SELECT * FROM admins WHERE uid = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $uid);
    $stmt->execute();
    $result = $stmt->get_result();

    $response = ["success" => false, "message" => "Invalid UID or password!"];

    if ($row = $result->fetch_assoc()) {
        // Directly compare passwords (since they are stored in plain text)
        if ($password === $row['password']) {
            $_SESSION['admins'] = $uid;
            $response["success"] = true;

            if ($row['role'] == 'superadmin') {
                $response["redirect"] = "admin/adminScanner.php";
            } else {
                $response["redirect"] = "staff.php";
            }
        } else {
            $response["message"] = "Invalid password!";
        }
    } else {
        $response["message"] = "Invalid UID!";
    }

    $stmt->close();
    $conn->close();

    echo json_encode($response);
    exit();
}
?>
