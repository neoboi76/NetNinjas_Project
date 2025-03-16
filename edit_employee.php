<?php
include 'connection.php';

// Read JSON data from request
$data = json_decode(file_get_contents("php://input"), true);

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($data['edit_emp_ID'])) {
    $edit_emp_ID = $data['edit_emp_ID'];

    if ($data['action'] === "delete_emp") {
        // DELETE EMPLOYEE
        $delete_emp = $conn->prepare("DELETE FROM employee WHERE EMP_ID = ?");
        $delete_emp->bind_param("i", $edit_emp_ID);

        if ($delete_emp->execute()) {
            echo json_encode(["success" => true, "message" => "Employee deleted successfully!"]);
        } else {
            echo json_encode(["success" => false, "message" => "Error deleting employee: " . $delete_emp->error]);
        }
        $delete_emp->close();
    } else {
        // UPDATE EMPLOYEE
        $edit_emp_email = $data['edit_emp_email'];
        $edit_emp_role = $data['edit_emp_role'];
        $edit_emp_dept = $data['edit_emp_dept'];
        $edit_emp_fname = $data['edit_emp_fname'];
        $edit_emp_lname = $data['edit_emp_lname'];
        $edit_emp_bday = $data['edit_emp_bday'];

        // Check if employee exists
        $check_emp_db_save = $conn->prepare("SELECT EMP_ID FROM employee WHERE EMP_ID = ?");
        $check_emp_db_save->bind_param("i", $edit_emp_ID);
        $check_emp_db_save->execute();
        $result_save = $check_emp_db_save->get_result();

        if ($result_save->num_rows == 0) {
            echo json_encode(["success" => false, "message" => "Error: Employee ID does not exist!"]);
        } else {
            $check_emp_db_save->close();

            // Update employee details
            $emp_save = $conn->prepare("
                UPDATE employee SET 
                    EMP_EMAIL = ?, 
                    EMP_POS = ?,  
                    EMP_DEPARTMENT = ?, 
                    EMP_FNAME = ?, 
                    EMP_LNAME = ?, 
                    EMP_BIRTH = ? 
                WHERE EMP_ID = ?
            ");

            $emp_save->bind_param(
                "ssssssi",
                $edit_emp_email,
                $edit_emp_role,
                $edit_emp_dept,
                $edit_emp_fname,
                $edit_emp_lname,
                $edit_emp_bday,
                $edit_emp_ID
            );

            if ($emp_save->execute()) {
                echo json_encode(["success" => true, "message" => "Employee details updated successfully!"]);
            } else {
                echo json_encode(["success" => false, "message" => "Error updating employee: " . $emp_save->error]);
            }
            $emp_save->close();
        }
    }
}

$conn->close();
?>
