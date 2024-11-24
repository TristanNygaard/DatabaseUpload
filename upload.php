<?php
// Database connection (replace with your credentials)
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'upload_database';
$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $drawingData = $_POST['drawingData'];

    if ($drawingData) {
        $drawingData = str_replace('data:image/png;base64,', '', $drawingData);
        $drawingData = base64_decode($drawingData);

        // saves the image as a file
        $fileName = 'uploads/' . uniqid() . '.png';
        file_put_contents($fileName, $drawingData);

        // inster drawing and title into the database
        $stmt = $conn->prepare("INSERT INTO uploads (title, file_path) VALUES (?, ?)");
        $stmt->bind_param("ss", $title, $fileName);
        $stmt->execute();

        echo "Drawing uploaded successfully! Please give me time to approve it!!!";
    } else {
        echo "No drawing data received.";
    }
}
?>
