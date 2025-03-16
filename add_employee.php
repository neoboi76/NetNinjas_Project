<?php
require 'vendor/autoload.php';
include 'connection.php';

header('Content-Type: application/json');

$response = ["success" => false, "message" => ""];

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["emp_id_add"])) {
    $emp_id = $_POST["emp_id_add"];
    $email = $_POST["emp_email_add"];
    $role = $_POST["emp_role_add"];
    $department = $_POST["emp_dept_add"];
    $first_name = $_POST["emp_fname_add"];
    $last_name = $_POST["emp_lname_add"];
    $birthdate = $_POST["emp_bday_add"];

    $sql = "INSERT INTO employee (EMP_ID, EMP_EMAIL, EMP_POS, EMP_DEPARTMENT, EMP_FNAME, EMP_LNAME, EMP_BIRTH) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("issssss", $emp_id, $email, $role, $department, $first_name, $last_name, $birthdate);

    if ($stmt->execute()) {
        $response["success"] = true;
        $response["message"] = "Employee added successfully!";
        $response["emp_id"] = $emp_id; // Return EMP_ID to be used in profile picture upload
    } else {
        $response["message"] = "Error adding employee: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
echo json_encode($response);
?>
