<?php
include 'connection.php'; // Include database connection

$response = ['success' => false, 'message' => 'An error occurred.'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action']; // Either 'create' or 'update'

    $employeeId = $_POST['employeeId'];
    $salary = $_POST['salary'];
    $date = $_POST['date'];

    if ($action === 'create') {
        // Insert new invoice
        $stmt = $conn->prepare("INSERT INTO payroll (EMP_ID_FK_PAY, P_AMT, P_DATE) VALUES (?, ?, ?)");
        $stmt->bind_param("iss", $employeeId, $salary, $date);

        if ($stmt->execute()) {
            $response['success'] = true;
            $response['invoiceId'] = $conn->insert_id; // Return the new invoice ID
        } else {
            $response['message'] = 'Failed to create invoice.';
        }

    } elseif ($action === 'update' && isset($_POST['invoiceId'])) {
        // Update existing invoice
        $invoiceId = $_POST['invoiceId'];
        $stmt = $conn->prepare("UPDATE payroll SET EMP_ID_FK_PAY = ?, P_AMT = ?, P_DATE = ? WHERE P_ID = ?");
        $stmt->bind_param("issi", $employeeId, $salary, $date, $invoiceId);

        if ($stmt->execute()) {
            $response['success'] = true;
        } else {
            $response['message'] = 'Failed to update invoice.';
        }
    }
}

echo json_encode($response);
?>
