<?php
include('connection.php');

require 'vendor/autoload.php';

use Google\Cloud\Storage\StorageClient;

putenv('GOOGLE_APPLICATION_CREDENTIALS=gcs-key.json');

$bucketName = 'websys_uploads';
$storage = new StorageClient();
$bucket = $storage->bucket($bucketName);

$query = "SELECT * FROM announcement";
$result = $conn->query($query);

$mediaData = [];

if ($result) {
    while ($row = $result->fetch_assoc()) {
        // Fix file path by removing the base URL
        $filePath = str_replace('https://storage.googleapis.com/websys_uploads/', '', trim($row['A_PATH']));

        error_log("Processing file: " . $filePath);

        if (empty($filePath)) {
            error_log("Error: A_PATH is empty for announcement ID " . $row['A_AREANUM']);
            continue;
        }

        try {
            $object = $bucket->object($filePath);

            if (!$object->exists()) {
                error_log("Error: Object does not exist in GCS - " . $filePath);
                $signedUrl = null;
            } else {
                error_log("Generating signed URL for: " . $filePath);

                $signedUrl = $object->signedUrl(
                    new DateTime('+1 year'),
                    ['method' => 'GET']
                );

                error_log("Signed URL generated: " . $signedUrl);
            }
        } catch (Exception $e) {
            $signedUrl = null;
            error_log("Exception while generating signed URL for $filePath: " . $e->getMessage());
        }

        $mediaData[] = [
            'area' => $row['A_AREANUM'],
            'name' => $row['A_NAME'],
            'path' => $filePath,
            'type' => $row['A_TYPE'],
            'signedUrl' => $signedUrl
        ];
    }
} else {
    error_log("Error fetching announcements: " . $conn->error);
}

echo json_encode($mediaData);
?>
