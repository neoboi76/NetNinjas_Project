<?php
require 'getempdetail.php';
require 'connection.php';
require 'vendor/autoload.php';

use Google\Cloud\Storage\StorageClient;

putenv('GOOGLE_APPLICATION_CREDENTIALS=gcs-key.json');

if (!isset($_SESSION['EMP_ID'])) {
    echo json_encode(["error" => "EMP_ID not set"]);
    exit;
}

$emp_id = $_SESSION['EMP_ID'];

// Fetch the profile picture path from the database
$query = "SELECT PFP_PATH FROM profilepic WHERE EMP_ID_FK_PFP = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $emp_id);
$stmt->execute();
$result = $stmt->get_result();

if ($row = $result->fetch_assoc()) {
    $file_name = basename(parse_url($row['PFP_PATH'], PHP_URL_PATH));

    #echo json_encode(["debugFileName" => $file_name]);

    $bucketName = 'websys_uploads';
    $storage = new StorageClient();
    $bucket = $storage->bucket($bucketName);
    $object = $bucket->object("pfp/" . $file_name); // Ensure "pfp/" is included

    if (!$object->exists()) {
        echo json_encode(["error" => "Profile picture not found"]);
        exit;
    }

    // Generate signed URL (valid for 24 hours)
    $signedUrl = $object->signedUrl(new DateTime('+24 hours'));

    echo json_encode(["profilePicture" => $signedUrl]);
} else {
    echo json_encode(["error" => "Profile picture not found"]);
}

$stmt->close();
$conn->close();
?>
