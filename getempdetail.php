<?php
session_start();

$servername = "34.92.138.155";
$username = "root";
$password_db = "|ra4.lh2)u+0qgv=";
$dbname = "web2proj";

$conn = new mysqli($servername, $username, $password_db, $dbname);
if ($conn->connect_error) {
    if (isset($_GET['api'])) {
        die(json_encode(["success" => false, "message" => "Connection failed: " . $conn->connect_error]));
    } else {
        die("Connection failed: " . $conn->connect_error);
    }
}

if (isset($_SESSION['EMP_ID'])) {
    $empId = $_SESSION['EMP_ID'];

    $stmt = $conn->prepare("
        SELECT e.EMP_ID, e.EMP_PASS, e.EMP_FNAME, e.EMP_LNAME, e.EMP_POS, 
               e.EMP_DEPARTMENT, e.EMP_EMAIL, e.EMP_BIRTH, e.EMP_JOINED, e.ADM_ID_FK_EMP,
               a.ADM_FNAME, a.ADM_LNAME
        FROM employee e
        LEFT JOIN administrator a ON e.ADM_ID_FK_EMP = a.ADM_ID
        WHERE e.EMP_ID = ?
    ");
    $stmt->bind_param("i", $empId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $employee = $result->fetch_assoc();

        if (isset($_GET['api'])) {
            echo json_encode(["success" => true, "data" => $employee]);
        }
        // Otherwise do nothing or prepare data for the page

    } else {
        if (isset($_GET['api'])) {
            echo json_encode(["success" => false, "message" => "Employee not found"]);
        }
    }
} else {
    if (isset($_GET['api'])) {
        echo json_encode(["success" => false, "message" => "User not logged in"]);
    }
}

$conn->close();
?>
