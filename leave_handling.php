<?php 
     include 'connection.php';

     if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['leave_id'], $_POST['action'])) {
         $leave_id = $_POST['leave_id'];
         $action = $_POST['action'];
 
         // Determine the status based on action
         $change_stat = ($action == "approve") ? "Approved" : "Denied";
 
         // Update the leave request status in the database
         $change_status = "UPDATE leave_request SET LEAVERQ_STATUS = ? WHERE LEAVERQ_ID = ?";
         $leave_manage = $conn->prepare($change_status);
         $leave_manage->bind_param("si", $change_stat, $leave_id);
 
         if ($leave_manage->execute()) {
             echo "Success: Leave request updated to $change_stat.";
         } else {
             echo "Error updating leave request: " . $conn->error;
         }
 
         $leave_manage->close();
     }
 
     $conn->close();
?>