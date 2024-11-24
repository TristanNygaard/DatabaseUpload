<?php
$host = 'localhost'; // change
$user = 'root'; // change
$password = ''; // change
$database = 'upload_database'; // recieved from the upload_database database with SQL found in readme
$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// get uploaded content from the database
$result = $conn->query("SELECT * FROM uploads ORDER BY id DESC");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Uploaded Content</title>
</head>
<body>
    <h1>Uploaded Content</h1>
    <?php while ($row = $result->fetch_assoc()): ?>
        <div style="border: 1px solid #ccc; padding: 10px; margin: 10px;">
            <h2><?php echo htmlspecialchars($row['title']); ?></h2>
            <?php
            $filePath = $row['file_path'];
            $fileExtension = pathinfo($filePath, PATHINFO_EXTENSION);
            if (in_array($fileExtension, ['jpg', 'jpeg', 'png', 'gif'])): ?>
                <img src="<?php echo htmlspecialchars($filePath); ?>" alt="Uploaded Image" style="max-width: 300px;">
            <?php else: ?>
                <p>File: <a href="<?php echo htmlspecialchars($filePath); ?>" download><?php echo htmlspecialchars($filePath); ?></a></p>
            <?php endif; ?>
        </div>
    <?php endwhile; ?>
</body>
</html>
