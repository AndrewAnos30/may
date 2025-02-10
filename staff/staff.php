<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Page</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5-qrcode/2.3.7/html5-qrcode.min.js"></script>
    <style>
        /* Global Styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
            text-align: center;
        }
        
        h2 {
            margin-top: 80px;
        }

        /* Navbar Styles */
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

        /* QR Code Scanner Section */
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

        /* Table Styles */
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

    <!-- Navbar -->
    <div class="navbar">
        <div class="nav-links">
            <a href="staff.php">Home</a>

        </div>
        <div class="logout-container">
            <form method="POST" action="../logout.php">
                <button type="submit">Logout</button>
            </form>        
        </div>
    </div>

    <!-- QR Scanner Section -->
    <h2>Scan QR Code</h2>
    <div id="reader"></div>
    <div class="button-container">
        <button onclick="window.location.href='index.php';">Back</button>
    </div>

    <script>
        function onScanSuccess(decodedText) {
            alert("QR Code scanned successfully: " + decodedText);
            window.location.href = "./staff.php";
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
