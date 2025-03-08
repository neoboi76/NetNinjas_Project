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

// Database connection details
$servername = "34.92.138.155";
$username = "root";  // Replace with your DB username
$password_db = "|ra4.lh2)u+0qgv=";  // Replace with your DB password
$dbname = "web2proj";  // Your database name

// Create a connection to the database
$conn = new mysqli($servername, $username, $password_db, $dbname);

// Check for database connection errors
if ($conn->connect_error) {
    die(json_encode(["success" => false, "message" => "Connection failed: " . $conn->connect_error]));
}

// Debugging: log the received data
error_log("Received ID: " . $id);
error_log("Received Password: " . $password);

// Check if the ID belongs to an employee or admin
// First, check the employee table
$stmt_emp = $conn->prepare("SELECT EMP_PASS FROM employee WHERE EMP_ID = ?");
$stmt_emp->bind_param("i", $id);  // 'i' indicates that $id is an integer
$stmt_emp->execute();
$result_emp = $stmt_emp->get_result();

// Debugging: Check if the employee ID exists
if ($result_emp->num_rows > 0) {
    // Fetch the row containing the password for employee
    $row_emp = $result_emp->fetch_assoc();
    
    // Debugging: Check password comparison
    error_log("Stored Employee Password: " . $row_emp['EMP_PASS']);
    
    // Compare the stored password with the entered password
    if ($password === $row_emp['EMP_PASS']) {
        // Store the EMP_ID in the session
        $_SESSION['EMP_ID'] = $id;
        
        // Debugging: Log successful login for employee
        error_log("Employee login successful");
        
        // Respond with success and redirect to employee.php
        echo json_encode(["success" => true, "message" => "Employee login successful", "redirect" => "employee.php"]);
        exit;
    } else {
        // If the password is incorrect, respond with failure
        echo json_encode(["success" => false, "message" => "Invalid password for employee"]);
    }
} else {
    // If no user found in the employee table, check the admin table
    $stmt_admin = $conn->prepare("SELECT ADM_PASS FROM administrator WHERE ADM_ID = ?");
    $stmt_admin->bind_param("i", $id);  // 'i' indicates that $id is an integer
    $stmt_admin->execute();
    $result_admin = $stmt_admin->get_result();
    
    // Debugging: Check if the admin ID exists
    if ($result_admin->num_rows > 0) {
        // Fetch the row containing the password for admin
        $row_admin = $result_admin->fetch_assoc();
        
        // Debugging: Check password comparison for admin
        error_log("Stored Admin Password: " . $row_admin['ADM_PASS']);
        
        // Compare the stored password with the entered password
        if ($password === $row_admin['ADM_PASS']) {
            // Store the ADM_ID in the session
            $_SESSION['ADM_ID'] = $id;
            
            // Debugging: Log successful login for admin
            error_log("Admin login successful");
            
            // Respond with success and redirect to admin.php
            echo json_encode(["success" => true, "message" => "Admin login successful", "redirect" => "admin.php"]);
            exit;
        } else {
            // If the password is incorrect, respond with failure
            echo json_encode(["success" => false, "message" => "Invalid password for admin"]);
        }
    } else {
        // If no user found in both tables, respond with failure
        echo json_encode(["success" => false, "message" => "User ID not found in both employee and admin records"]);
    }
}

// Close the database connection
$conn->close();
?>
