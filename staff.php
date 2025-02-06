<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QR Code Scanner</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin-top: 50px;
        }
        #video {
            width: 100%;
            max-width: 500px;
            height: auto;
        }
        #qr-result {
            margin-top: 20px;
            font-size: 20px;
            color: green;
        }
    </style>
</head>
<body>
    <h1>QR Code Scanner</h1>
    <video id="video" autoplay></video>
    <canvas id="canvas" style="display: none;"></canvas>
    <div id="qr-result">Scan a QR code!</div>

    <script src="https://cdn.jsdelivr.net/npm/jsqr/dist/jsQR.js"></script>
    <script>
        // Initialize the camera and set up the video feed
        const videoElement = document.getElementById('video');
        const canvasElement = document.getElementById('canvas');
        const canvasContext = canvasElement.getContext('2d');
        const qrResult = document.getElementById('qr-result');
        
        // Access camera and start the video feed
        navigator.mediaDevices.getUserMedia({ video: { facingMode: "environment" } })
            .then(function(stream) {
                videoElement.srcObject = stream;
                videoElement.setAttribute("playsinline", true); // required to play in iOS
                videoElement.play();
                requestAnimationFrame(scanQRCode);
            })
            .catch(function(err) {
                console.error('Camera not accessible:', err);
            });

        function scanQRCode() {
            if (videoElement.readyState === videoElement.HAVE_ENOUGH_DATA) {
                // Set canvas size equal to the video
                canvasElement.height = videoElement.videoHeight;
                canvasElement.width = videoElement.videoWidth;

                // Draw the video frame to canvas
                canvasContext.drawImage(videoElement, 0, 0, canvasElement.width, canvasElement.height);

                // Get image data from canvas
                const imageData = canvasContext.getImageData(0, 0, canvasElement.width, canvasElement.height);

                // Scan for QR code
                const code = jsQR(imageData.data, canvasElement.width, canvasElement.height);

                if (code) {
                    qrResult.textContent = `QR Code Detected: ${code.data}`;
                } else {
                    qrResult.textContent = "Scan a QR code!";
                }
            }
            // Keep scanning the video feed
            requestAnimationFrame(scanQRCode);
        }
    </script>
</body>
</html>
