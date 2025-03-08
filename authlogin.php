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

// Prepare and bind the query to prevent SQL injection
$stmt = $conn->prepare("SELECT EMP_PASS FROM employee WHERE EMP_ID = ?");
$stmt->bind_param("i", $id);  // 'i' indicates that $id is an integer

// Execute the query
$stmt->execute();

// Get the result
$result = $stmt->get_result();

// Check if a user with the provided ID exists
if ($result->num_rows > 0) {
    // Fetch the row containing the password
    $row = $result->fetch_assoc();
    
    // Compare the stored password with the entered password
    if ($password === $row['EMP_PASS']) {
        // Store the EMP_ID in the session
        $_SESSION['EMP_ID'] = $id;
        
        // If the password is correct, respond with success
        echo json_encode(["success" => true, "message" => "Login successful"]);
    } else {
        // If the password is incorrect, respond with failure
        echo json_encode(["success" => false, "message" => "Invalid password"]);
    }
} else {
    // If no user found with the provided ID, respond with failure
    echo json_encode(["success" => false, "message" => "User ID not found"]);
}

// Close the database connection
$conn->close();
?>
