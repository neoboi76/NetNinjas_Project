<?php
    require 'vendor/autoload.php';

    use Google\Cloud\Storage\StorageClient;

    putenv('GOOGLE_APPLICATION_CREDENTIALS=gcs-key.json');
    $file_path = $_GET['file'] ?? '';

    if (!$file_path) {
        die("Error: No file specified.");
    }

    // Extract filename only (in case full URL is passed)
    $file_name = basename($file_path);

    $bucketName = 'websys_uploads';

    $storage = new StorageClient();
    $bucket = $storage->bucket($bucketName);
    $object = $bucket->object($file_name);

    // Check if file exists
    if (!$object->exists()) {
        die("Error: File not found in GCS.");
    }

    // Generate signed URL with "Content-Disposition: attachment"
    $url = $object->signedUrl(
        new DateTime('tomorrow'),
        [
            'responseDisposition' => 'attachment; filename="' . $file_name . '"'
        ]
    );

    // Redirect to signed URL
    header("Location: $url");
    exit;
?>
