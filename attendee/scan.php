<?php
session_start();

if (!isset($_SESSION['user'])) {
    header('Location: ../login.html');  // Redirect to login if not logged in
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scan QR Code</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5-qrcode/2.3.7/html5-qrcode.min.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #f8f9fa;
            padding: 20px;
        }
        #reader {
            width: 300px;
            margin: auto;
        }
        .button-container {
            margin-top: 20px;
        }
        button {
            background-color: #002d22;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 5px;
            font-size: 16px;
        }
        button:hover {
            background-color: #005f46;
        }
    </style>
</head>
<body>
    <h2>Scan QR Code</h2>
    <div id="reader"></div>
    <div class="button-container">
        <button onclick="window.location.href='index.php';">Back</button>
    </div>

    <script>
        function onScanSuccess(decodedText) {
            alert("QR Code scanned successfully: " + decodedText);
            window.location.href = "index.php";
        }

        function onScanFailure(error) {
            console.warn(`QR Code scan error: ${error}`);
        }

        let html5QrcodeScanner = new Html5QrcodeScanner(
            "reader", { fps: 10, qrbox: 250 }
        );
        html5QrcodeScanner.render(onScanSuccess, onScanFailure);
    </script>
</body>
</html>
