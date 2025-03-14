<?php
require 'vendor/autoload.php';
require 'connection.php';

use Google\Cloud\Storage\StorageClient;

putenv('GOOGLE_APPLICATION_CREDENTIALS=gcs-key.json'); // Path to service account key

$bucketName = 'websys_uploads'; // Replace with your bucket name

if ($_FILES['file']['error'] === UPLOAD_ERR_OK) {
    $originalName = $_FILES['file']['name'];
    $fileTmp = $_FILES['file']['tmp_name'];
    $fileType = pathinfo($originalName, PATHINFO_EXTENSION);
    
    // Generate unique filename
    $newFileName = time() . '_' . uniqid() . '.' . $fileType;
    $fileUrl = "https://storage.googleapis.com/$bucketName/$newFileName";

    try {
        // Upload to GCS
        $storage = new StorageClient();
        $bucket = $storage->bucket($bucketName);
        $bucket->upload(
            fopen($fileTmp, 'r'),
            ['name' => $newFileName]
        );

        // Insert metadata into MySQL using $conn
        $stmt = $conn->prepare("INSERT INTO files (F_DATE, F_DEPT, F_TYPE, F_NAME, F_PATH) VALUES (NOW(), ?, ?, ?, ?)");
        $stmt->bind_param("ssss", $dept, $fileType, $originalName, $fileUrl);
        
        // Example department (modify this to get from a form if needed)
        $dept = "General"; 
        
        if ($stmt->execute()) {
            echo "File uploaded successfully: " . $newFileName;
        } else {
            echo "Database error: " . $stmt->error;
        }

        $stmt->close();
    } catch (Exception $e) {
        echo "Upload failed: " . $e->getMessage();
    }
} else {
    echo "No file uploaded or an error occurred.";
}
?>
