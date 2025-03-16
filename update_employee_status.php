<?php
include "connection.php";

$data = json_decode(file_get_contents("php://input"), true);

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($data["emp_id"]) && isset($data["action"])) {
    $emp_id = $data["emp_id"];
    $action = $data["action"];
    
    // Validate employee exists
    $check_sql = "SELECT EMP_ID FROM employee WHERE EMP_ID = ?";
    $stmt = $conn->prepare($check_sql);
    $stmt->bind_param("i", $emp_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        // Employee exists, update status
        $new_status = ($action === "enable") ? "Active" : "Inactive";
        $update_sql = "UPDATE employee SET EMP_STATUS = ? WHERE EMP_ID = ?";
        $stmt = $conn->prepare($update_sql);
        $stmt->bind_param("si", $new_status, $emp_id);
        
        if ($stmt->execute()) {
            echo json_encode(["success" => true, "message" => "Employee ID $emp_id has been set to $new_status."]);
        } else {
            echo json_encode(["success" => false, "message" => "Error updating employee status."]);
        }
    } else {
        echo json_encode(["success" => false, "message" => "Error: Employee ID does not exist!"]);
    }

    $stmt->close();
}

$conn->close();
?>
