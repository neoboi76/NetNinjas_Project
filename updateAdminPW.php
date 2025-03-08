<?php
include 'connection.php';

// Check if the request is a POST request and is in JSON format
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the raw POST data
    $input = json_decode(file_get_contents('php://input'), true);

    if (!isset($input['currentPassword']) || !isset($input['newPassword'])) {
        echo json_encode(['success' => false, 'message' => 'Missing password fields']);
        exit;
    }

    $currentPassword = $input['currentPassword'];
    $newPassword = $input['newPassword'];

    session_start();
    $empId = $_SESSION['ADM_ID']; // Assuming employee ID is stored in the session

    // Fetch the current password from the database
    $sql = "SELECT password FROM administrator WHERE ADM_ID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $empId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $storedPassword = $row['password'];

        // Check if the current password matches
        if ($currentPassword === $storedPassword) {
            // Update the password with the new one (plain text)
            $updateSql = "UPDATE administrator SET password = ? WHERE ADM_ID = ?";
            $updateStmt = $conn->prepare($updateSql);
            $updateStmt->bind_param("si", $newPassword, $empId);

            if ($updateStmt->execute()) {
                echo json_encode(['success' => true, 'message' => 'Password updated successfully']);
            } else {
                echo json_encode(['success' => false, 'message' => 'Error updating password']);
            }
        } else {
            echo json_encode(['success' => false, 'message' => 'Current password is incorrect']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Employee not found']);
    }

    $stmt->close();
    $conn->close();
}
?>
