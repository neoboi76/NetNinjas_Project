<?php
require 'vendor/autoload.php';
include 'connection.php';

use Google\Cloud\Storage\StorageClient;

putenv('GOOGLE_APPLICATION_CREDENTIALS=gcs-key.json'); // Path to service account key

$bucketName = 'websys_uploads'; // Your GCS bucket name

header('Content-Type: application/json');

$response = ["success" => false, "message" => ""];

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["emp_id"])) {
    $emp_id = $_POST["emp_id"];

    if (!empty($_FILES["addProfilePic"]["name"])) {
        $file_name = basename($_FILES["addProfilePic"]["name"]);
        $file_tmp = $_FILES["addProfilePic"]["tmp_name"];
        $file_type = pathinfo($file_name, PATHINFO_EXTENSION);

        // Generate a unique filename
        $newFileName = time() . '_' . uniqid() . '.' . $file_type;
        $fileUrl = "https://storage.cloud.google.com/$bucketName/pfp/$newFileName";

        try {
            // Upload to GCS
            $storage = new StorageClient();
            $bucket = $storage->bucket($bucketName);
            $bucket->upload(
                fopen($file_tmp, 'r'),
                ['name' => 'pfp/' . $newFileName] // Upload to "pfp" folder
            );

            // Insert profile picture metadata into MySQL
            $sql_pic = "INSERT INTO profilepic (PFP_PATH, EMP_ID_FK_PFP) VALUES (?, ?)";
            $stmt_pic = $conn->prepare($sql_pic);
            $stmt_pic->bind_param("si", $fileUrl, $emp_id);

            if ($stmt_pic->execute()) {
                $response["success"] = true;
                $response["message"] = "Profile picture uploaded successfully!";
            } else {
                $response["message"] = "Database error: " . $stmt_pic->error;
            }

            $stmt_pic->close();
        } catch (Exception $e) {
            $response["message"] = "Upload failed: " . $e->getMessage();
        }
    } else {
        $response["message"] = "No file uploaded.";
    }
}

$conn->close();
echo json_encode($response);
?>
