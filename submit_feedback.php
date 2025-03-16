<?php
include 'connection.php';
session_start();

$data = json_decode(file_get_contents("php://input"), true);

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($data["emp_id"], $data["feedback"])) {
    $emp_id = $data["emp_id"];
    $feedback = $data["feedback"];
    $admin_id = $_SESSION["ADM_ID"] ?? null;

    if (!$admin_id) {
        echo json_encode(["success" => false, "message" => "Admin not logged in."]);
        exit();
    }

    // Check if employee ID exists
    $check_sql = "SELECT 1 FROM employee WHERE EMP_ID = ?";
    $check_stmt = $conn->prepare($check_sql);
    $check_stmt->bind_param("i", $emp_id);
    $check_stmt->execute();
    $result = $check_stmt->get_result();

    if ($result->num_rows === 0) {
        echo json_encode(["success" => false, "message" => "Error: Employee ID not found!"]);
        exit();
    }
    $check_stmt->close();

    // Insert feedback into evaluation_emp table
    $sql = "INSERT INTO evaluation_emp (EVAL_NOTE, EVAL_DATE, EMP_ID_FK_EVAL, ADM_ID_FK_EVAL) VALUES (?, NOW(), ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sii", $feedback, $emp_id, $admin_id);

    if ($stmt->execute()) {
        echo json_encode(["success" => true, "message" => "Feedback successfully submitted!"]);
    } else {
        echo json_encode(["success" => false, "message" => "Error: " . $stmt->error]);
    }

    $stmt->close();
}

$conn->close();
?>
