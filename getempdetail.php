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

    // Prepare and execute the query to get employee details
    $stmt = $conn->prepare("SELECT EMP_ID, EMP_PASS, EMP_FNAME, EMP_LNAME, EMP_POS, EMP_PHONENUM, EMP_BIRTH, EMP_JOINED FROM employee WHERE EMP_ID = ?");
    $stmt->bind_param("i", $empId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Fetch the employee details
        $employee = $result->fetch_assoc();
       #echo json_encode(["success" => true, "data" => $employee]);
    } else {
       #echo json_encode(["success" => false, "message" => "Employee not found"]);
    }
} else {
     #echo json_encode(["success" => false, "message" => "User not logged in"]);
}
// Check if the session variable is set
if (isset($_SESSION['EMP_ID'])) {
   # echo "EMP_ID in session: " . $_SESSION['EMP_ID'];
} else {
   #echo "EMP_ID not set in session.";
}
// Close the database connection
$conn->close();
?>
