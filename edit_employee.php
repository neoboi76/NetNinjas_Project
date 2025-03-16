<?php
include 'connection.php';

// Read JSON data from request
$data = json_decode(file_get_contents("php://input"), true);

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($data['edit_emp_ID']) && isset($data['action'])) {
    $edit_emp_ID = $data['edit_emp_ID'];
    $action = $data['action']; // 'save_emp' or 'delete_emp'

    // Check if employee exists
    $check_emp = $conn->prepare("SELECT EMP_ID FROM employee WHERE EMP_ID = ?");
    $check_emp->bind_param("i", $edit_emp_ID);
    $check_emp->execute();
    $result = $check_emp->get_result();
    $check_emp->close();

    if ($result->num_rows == 0) {
        echo json_encode(["success" => false, "message" => "Error: Employee ID does not exist!"]);
        exit;
    }

    if ($action === "delete_emp") {
        // DELETE EMPLOYEE
        $delete_emp = $conn->prepare("DELETE FROM employee WHERE EMP_ID = ?");
        $delete_emp->bind_param("i", $edit_emp_ID);

        if ($delete_emp->execute()) {
            echo json_encode(["success" => true, "message" => "Employee deleted successfully!"]);
        } else {
            echo json_encode(["success" => false, "message" => "Error deleting employee: " . $delete_emp->error]);
        }

        $delete_emp->close();
    } else if ($action === "save_emp") {
        // UPDATE EMPLOYEE
        $edit_emp_email = $data['edit_emp_email'];
        $edit_emp_role = $data['edit_emp_role'];
        $edit_emp_dept = $data['edit_emp_dept'];
        $edit_emp_fname = $data['edit_emp_fname'];
        $edit_emp_lname = $data['edit_emp_lname'];
        $edit_emp_bday = $data['edit_emp_bday'];

        $update_emp = $conn->prepare("
            UPDATE employee SET 
                EMP_EMAIL = ?, 
                EMP_POS = ?,  
                EMP_DEPARTMENT = ?, 
                EMP_FNAME = ?, 
                EMP_LNAME = ?, 
                EMP_BIRTH = ? 
            WHERE EMP_ID = ?
        ");

        $update_emp->bind_param(
            "ssssssi",
            $edit_emp_email,
            $edit_emp_role,
            $edit_emp_dept,
            $edit_emp_fname,
            $edit_emp_lname,
            $edit_emp_bday,
            $edit_emp_ID
        );

        if ($update_emp->execute()) {
            echo json_encode(["success" => true, "message" => "Employee details updated successfully!"]);
        } else {
            echo json_encode(["success" => false, "message" => "Error updating employee: " . $update_emp->error]);
        }

        $update_emp->close();
    } else {
        echo json_encode(["success" => false, "message" => "Invalid action!"]);
    }
}

$conn->close();
?>
