<?php
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect JSON data
    $data = json_decode(file_get_contents("php://input"), true);

    // Extract values
    $emp_id = $data['emp_id_add'];
    $emp_email = $data['emp_email_add'];
    $emp_role = $data['emp_role_add'];
    $emp_dept = $data['emp_dept_add'];
    $emp_fname = $data['emp_fname_add'];
    $emp_lname = $data['emp_lname_add'];
    $emp_bday = $data['emp_bday_add'];

    // Default values
    $emp_pass = 'vivanetninjas'; 
    $emp_joined = date('Y-m-d'); 
    $adm_id_fk_emp = 0; 

    // Prepare SQL statement
    $emp_adding = $conn->prepare("
        INSERT INTO employee 
        (EMP_ID, EMP_PASS, EMP_FNAME, EMP_LNAME, EMP_POS, EMP_DEPARTMENT, EMP_EMAIL, EMP_BIRTH, EMP_JOINED, ADM_ID_FK_EMP) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
    ");

    // Bind parameters
    $emp_adding->bind_param(
        "issssssssi",
        $emp_id,
        $emp_pass,
        $emp_fname,
        $emp_lname,
        $emp_role,
        $emp_dept,
        $emp_email,
        $emp_bday,
        $emp_joined,
        $adm_id_fk_emp
    );

    // Execute and return response
    if ($emp_adding->execute()) {
        echo json_encode(["success" => true, "message" => "Employee added successfully!"]);
    } else {
        echo json_encode(["success" => false, "message" => "Error: " . $emp_adding->error]);
    }

    // Close resources
    $emp_adding->close();
    $conn->close();
}
?>
