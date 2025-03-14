<?php
include('connection.php');

header("Content-Type: application/json");

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(["status" => "error", "message" => "Invalid request method."]);
    exit;
}

$area = isset($_POST['area']) ? $_POST['area'] : null;

error_log("Received DELETE Request - Area: " . json_encode($area));

if (!$area) {
    echo json_encode(["status" => "error", "message" => "Missing area parameter."]);
    exit;
}

// Check if any records exist for this area
$checkStmt = $conn->prepare("SELECT * FROM announcement WHERE A_AREANUM = ?");
$checkStmt->bind_param("i", $area);
$checkStmt->execute();
$result = $checkStmt->get_result();
$checkStmt->close();

if ($result->num_rows === 0) {
    error_log("No matching record found for deletion - Area: $area");
    echo json_encode(["status" => "error", "message" => "No matching record found."]);
    exit;
}

// Proceed with deletion
$stmt = $conn->prepare("DELETE FROM announcement WHERE A_AREANUM = ?");
$stmt->bind_param("i", $area);
if ($stmt->execute() && $stmt->affected_rows > 0) {
    echo json_encode(["status" => "success", "message" => "Announcements deleted for area $area."]);
} else {
    error_log("Deletion failed for Area: $area");
    echo json_encode(["status" => "error", "message" => "Failed to delete records."]);
}

$stmt->close();
?>
