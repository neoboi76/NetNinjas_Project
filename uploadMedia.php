<?php
require 'vendor/autoload.php';
include 'connection.php';

use Google\Cloud\Storage\StorageClient;

putenv('GOOGLE_APPLICATION_CREDENTIALS=gcs-key.json'); // Path to service account key

$bucketName = 'websys_uploads'; // Replace with your bucket name

// Check if areaNum and media files are provided
if (!isset($_POST['areaNum'])) {
    echo json_encode(['error' => 'areaNum is missing.']);
    exit;
}

if (!isset($_FILES['media']) || !is_array($_FILES['media']['tmp_name'])) {
    echo json_encode(['error' => 'No media files uploaded.']);
    exit;
}

$areaNum = $_POST['areaNum'];  // Get the area number from the form
$files = $_FILES['media'];     // Get the uploaded files

foreach ($files['tmp_name'] as $index => $tmpName) {
    $originalName = $files['name'][$index];
    $fileTmp = $tmpName;
    $fileType = pathinfo($originalName, PATHINFO_EXTENSION);

    // Generate unique filename
    $newFileName = time() . '_' . uniqid() . '.' . $fileType;
    $fileUrl = "https://storage.googleapis.com/$bucketName/media/$newFileName"; // For Google Cloud Storage (GCS)

    try {
        // Upload to GCS (same process as before)
        $storage = new StorageClient();
        $bucket = $storage->bucket($bucketName);
        $bucket->upload(
            fopen($fileTmp, 'r'),
            ['name' => 'media/' . $newFileName]  // Upload to "media" folder
        );

        // Insert metadata into MySQL using $conn
        $stmt = $conn->prepare("INSERT INTO announcement (A_NAME, A_PATH, A_AREANUM, A_TYPE) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssis", $originalName, $fileUrl, $areaNum, $fileType);

        if ($stmt->execute()) {
            echo json_encode(['message' => 'File uploaded successfully', 'file' => $newFileName]);
        } else {
            echo json_encode(['error' => 'Database error: ' . $stmt->error]);
        }

        $stmt->close();
    } catch (Exception $e) {
        echo json_encode(['error' => 'Upload failed: ' . $e->getMessage()]);
    }
}

?>
