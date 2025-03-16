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
    $storage = new StorageClient();
    $bucket = $storage->bucket($bucketName);

    if (isset($_POST["action"]) && $_POST["action"] === "delete_pfp") {
        // DELETE PROFILE PICTURE RECORD FROM DATABASE (but keep file in the bucket)
        $deleteStmt = $conn->prepare("DELETE FROM profilepic WHERE EMP_ID_FK_PFP = ?");
        $deleteStmt->bind_param("i", $emp_id);
        if ($deleteStmt->execute()) {
            $response["success"] = true;
            $response["message"] = "Profile picture record deleted from database!";
        } else {
            $response["message"] = "Error deleting profile picture record: " . $deleteStmt->error;
        }
        $deleteStmt->close();
    } elseif (isset($_FILES["editProfilePic"]) && $_FILES["editProfilePic"]["error"] == 0) {
        // UPLOAD NEW PROFILE PICTURE WITHOUT DELETING OLD FILE
        $file_name = basename($_FILES["editProfilePic"]["name"]);
        $file_tmp = $_FILES["editProfilePic"]["tmp_name"];
        $file_type = pathinfo($file_name, PATHINFO_EXTENSION);

        $newFileName = time() . '_' . uniqid() . '.' . $file_type;
        $fileUrl = "https://storage.cloud.google.com/$bucketName/pfp/$newFileName";

        try {
            // Upload new file to GCS
            $bucket->upload(
                fopen($file_tmp, 'r'),
                ['name' => 'pfp/' . $newFileName]
            );

            // Check if the employee already has a profile picture
            $checkStmt = $conn->prepare("SELECT PFP_PATH FROM profilepic WHERE EMP_ID_FK_PFP = ?");
            $checkStmt->bind_param("i", $emp_id);
            $checkStmt->execute();
            $result = $checkStmt->get_result();
            $checkStmt->close();

            if ($result->num_rows > 0) {
                // Employee already has a profile picture, update it
                $updateStmt = $conn->prepare("UPDATE profilepic SET PFP_PATH = ? WHERE EMP_ID_FK_PFP = ?");
                $updateStmt->bind_param("si", $fileUrl, $emp_id);
                if ($updateStmt->execute()) {
                    $response["success"] = true;
                    $response["message"] = "Profile picture updated successfully!";
                } else {
                    $response["message"] = "Database update error: " . $updateStmt->error;
                }
                $updateStmt->close();
            } else {
                // No existing profile picture, insert new record
                $insertStmt = $conn->prepare("INSERT INTO profilepic (EMP_ID_FK_PFP, PFP_PATH) VALUES (?, ?)");
                $insertStmt->bind_param("is", $emp_id, $fileUrl);
                if ($insertStmt->execute()) {
                    $response["success"] = true;
                    $response["message"] = "Profile picture uploaded successfully!";
                } else {
                    $response["message"] = "Database insert error: " . $insertStmt->error;
                }
                $insertStmt->close();
            }
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