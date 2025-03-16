<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'connection.php';

session_start();

$data = json_decode(file_get_contents("php://input"), true);

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($data["feedback"])) {
    $feedbackText = trim($data["feedback"]);
    $empId = $_SESSION["EMP_ID"] ?? null;  // Employee ID from session
    $admId = $_SESSION["ADM_ID"] ?? null;  // Admin ID from session

    if (!$empId || !$admId) {
        echo json_encode(["success" => false, "message" => "Unauthorized access."]);
        exit();
    }

    if (empty($feedbackText)) {
        echo json_encode(["success" => false, "message" => "Feedback cannot be empty."]);
        exit();
    }

    // Sanitize input
    $feedbackText = mysqli_real_escape_string($conn, $feedbackText);

    // Insert into database
    $sql = "INSERT INTO evaluation (EVAL_NOTE, EVAL_DATE, EMP_ID_FK_EVAL, ADM_ID_FK_EVAL) 
            VALUES (?, NOW(), ?, ?)";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        echo json_encode(["success" => false, "message" => "Database error: " . $conn->error]);
        exit();
    }

    $stmt->bind_param("sii", $feedbackText, $empId, $admId);

    if ($stmt->execute()) {
        echo json_encode(["success" => true, "message" => "Feedback submitted successfully!"]);
    } else {
        echo json_encode(["success" => false, "message" => "Error: " . $stmt->error]);
    }

    $stmt->close();
} else {
    echo json_encode(["success" => false, "message" => "Invalid request."]);
}

$conn->close();
?>
