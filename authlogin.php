<?php
// Start the session to store session variables
session_start();

// Set content type to JSON
header('Content-Type: application/json');

// Get the raw POST data (sent from the front-end)
$data = json_decode(file_get_contents('php://input'), true);

// Extract the ID and password from the received JSON
$id = $data['id'];
$password = $data['password'];

// Database connection (reuse your connection.php)
include 'connection.php';

// Debugging: log the received data
error_log("Received ID: " . $id);
error_log("Received Password: " . $password);

// Check if the ID belongs to an employee first (and fetch their status)
$stmt_emp = $conn->prepare("SELECT EMP_PASS, EMP_STATUS FROM employee WHERE EMP_ID = ?");
$stmt_emp->bind_param("i", $id);  // 'i' indicates integer
$stmt_emp->execute();
$result_emp = $stmt_emp->get_result();

if ($result_emp->num_rows > 0) {
    $row_emp = $result_emp->fetch_assoc();

    // Debug: Log stored data
    error_log("Stored Employee Password: " . $row_emp['EMP_PASS']);
    error_log("Employee Status: " . $row_emp['EMP_STATUS']);

    // Check if employee is inactive
    if (strtolower($row_emp['EMP_STATUS']) === 'inactive') {
        // Respond with inactive status message
        echo json_encode([
            "success" => false,
            "message" => "This user is currently inactive.",
            "redirect" => "index.php"
        ]);
        exit;
    }

    // Compare passwords
    if ($password === $row_emp['EMP_PASS']) {
        // Login success, store EMP_ID in session
        $_SESSION['EMP_ID'] = $id;

        // Respond with success and redirect
        echo json_encode([
            "success" => true,
            "message" => "Employee login successful",
            "redirect" => "employee.php"
        ]);
        exit;
    } else {
        // Incorrect password
        echo json_encode([
            "success" => false,
            "message" => "Invalid password for employee"
        ]);
        exit;
    }
} else {
    // If not found in employee, check admin
    $stmt_admin = $conn->prepare("SELECT ADM_PASS FROM administrator WHERE ADM_ID = ?");
    $stmt_admin->bind_param("i", $id);
    $stmt_admin->execute();
    $result_admin = $stmt_admin->get_result();

    if ($result_admin->num_rows > 0) {
        $row_admin = $result_admin->fetch_assoc();

        // Debugging: Log stored password
        error_log("Stored Admin Password: " . $row_admin['ADM_PASS']);

        // Compare passwords
        if ($password === $row_admin['ADM_PASS']) {
            // Login success, store ADM_ID in session
            $_SESSION['ADM_ID'] = $id;

            echo json_encode([
                "success" => true,
                "message" => "Admin login successful",
                "redirect" => "admin.php"
            ]);
            exit;
        } else {
            echo json_encode([
                "success" => false,
                "message" => "Invalid password for admin"
            ]);
            exit;
        }
    } else {
        // ID not found in either table
        echo json_encode([
            "success" => false,
            "message" => "User ID not found in both employee and admin records"
        ]);
        exit;
    }
}

$conn->close();
?>
