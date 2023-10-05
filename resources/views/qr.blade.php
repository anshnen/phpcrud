<!DOCTYPE html>
<html>
  <head>
    <title>QR reader</title>
    <script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
  </head>
  <body>
    <video id="preview"></video>
    <p>Scanned Output: <span id="scannedOutput"></span></p>
    <button onclick="sendScannedData()">Send to DB</button>
    <script type="text/javascript">
      let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });
      scanner.addListener('scan', function (content) {
        document.getElementById('scannedOutput').textContent = content;
      });
      Instascan.Camera.getCameras().then(function (cameras) {
        if (cameras.length > 0) {
          scanner.start(cameras[0]);
        } else {
          console.error('No cameras found.');
        }
      }).catch(function (e) {
        console.error(e);
      });

      function sendScannedData() {
        const scannedData = document.getElementById('scannedOutput').textContent;
        
        fetch('/decode', {
          method: 'POST',
          body: JSON.stringify({ data: scannedData }),
          headers: {
            'Content-Type': 'application/json'
          }
        })
        .then(response => response.json())
        .then(data => {
          console.log(data);
        })
        .catch(error => {
          console.error('Error sending data to backend:', error);
        });
      }
    </script>
  </body>
</html>
