<?php
// Start the session
session_start();

// Database connection details
$servername = "34.92.138.155";
$username = "root";  // Replace with your DB username
$password_db = "|ra4.lh2)u+0qgv=";  // Replace with your DB password
$dbname = "web2proj";  // Your database name

// Create a connection to the database
$conn = new mysqli($servername, $username, $password_db, $dbname);

// Fetch EMP_ID from the session
$empId = $_SESSION['EMP_ID'];

// Sanitize inputs
$currentPassword = $conn->real_escape_string($_POST['currentPassword']);
$newPassword = $conn->real_escape_string($_POST['newPassword']);

// Fetch the stored password from the database
$sql = "SELECT EMP_PASS FROM employee WHERE EMP_ID = '$empId'";
$result = $conn->query($sql);

// Check if the current password matches
$row = $result->fetch_assoc();
if ($row['EMP_PASS'] == $currentPassword) {
    // Update the password
    $updateSql = "UPDATE employee SET EMP_PASS = '$newPassword' WHERE EMP_ID = '$empId'";
    $conn->query($updateSql);
    echo "Password updated successfully.";
}

// Close the database connection
$conn->close();
?>
