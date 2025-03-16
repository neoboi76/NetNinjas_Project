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
        // Check if employee exists
        $check_emp = $conn->prepare("SELECT * FROM employee WHERE EMP_ID = ?");
        $check_emp->bind_param("i", $edit_emp_ID);
        $check_emp->execute();
        $result = $check_emp->get_result();

        if ($result->num_rows == 0) {
            echo json_encode(["success" => false, "message" => "Error: Employee ID does not exist!"]);
            $check_emp->close();
            exit;
        }
        
        $row = $result->fetch_assoc();
        $check_emp->close();

        // Preserve existing values if inputs are blank
        $edit_emp_email = !empty($data['edit_emp_email']) ? $data['edit_emp_email'] : $row['EMP_EMAIL'];
        $edit_emp_role = !empty($data['edit_emp_role']) ? $data['edit_emp_role'] : $row['EMP_POS'];
        $edit_emp_dept = !empty($data['edit_emp_dept']) ? $data['edit_emp_dept'] : $row['EMP_DEPARTMENT'];
        $edit_emp_fname = !empty($data['edit_emp_fname']) ? $data['edit_emp_fname'] : $row['EMP_FNAME'];
        $edit_emp_lname = !empty($data['edit_emp_lname']) ? $data['edit_emp_lname'] : $row['EMP_LNAME'];
        $edit_emp_bday = !empty($data['edit_emp_bday']) ? $data['edit_emp_bday'] : $row['EMP_BIRTH'];

        // Update employee details
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
    }
}

$conn->close();
?>
