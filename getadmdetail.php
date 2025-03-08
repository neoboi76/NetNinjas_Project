<?php
// Start the session to access session data
session_start();

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

// Check if the ADM_ID is stored in the session (for admin login)
if (isset($_SESSION['ADM_ID'])) {
    // Get the ADM_ID from the session
    $adminId = $_SESSION['ADM_ID'];

    // Prepare and execute the query to get admin details
    $stmt = $conn->prepare("SELECT ADM_ID, ADM_FNAME, ADM_LNAME, ADM_POS, ADM_DATE FROM administrator WHERE ADM_ID = ?");
    $stmt->bind_param("i", $adminId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Fetch the admin details
        $admin = $result->fetch_assoc();
        #echo json_encode(["success" => true, "data" => $admin]);
    } else {
        #echo json_encode(["success" => false, "message" => "Admin not found"]);
    }
} else {
    #echo json_encode(["success" => false, "message" => "Admin not logged in"]);
}

// Close the database connection
$conn->close();
?>
