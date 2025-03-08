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

// Check if the EMP_ID is stored in the session
if (isset($_SESSION['EMP_ID'])) {
    // Get the EMP_ID from the session
    $empId = $_SESSION['EMP_ID'];

    // Prepare and execute the query to get employee and admin details
    $stmt = $conn->prepare("
        SELECT e.EMP_ID, e.EMP_PASS, e.EMP_FNAME, e.EMP_LNAME, e.EMP_POS, 
               e.EMP_PHONENUM, e.EMP_BIRTH, e.EMP_JOINED, e.ADM_ID_FK_EMP,
               a.ADM_FNAME, a.ADM_LNAME
        FROM employee e
        LEFT JOIN administrator a ON e.ADM_ID_FK_EMP = a.ADM_ID
        WHERE e.EMP_ID = ?
    ");
    $stmt->bind_param("i", $empId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Fetch the employee and admin details
        $employee = $result->fetch_assoc();
        #echo json_encode(["success" => true, "data" => $employee]);
    } else {
        #echo json_encode(["success" => false, "message" => "Employee not found"]);
    }
} else {
    #echo json_encode(["success" => false, "message" => "User not logged in"]);
}

// Close the database connection
$conn->close();
?>
