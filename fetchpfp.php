<?php
    require 'getempdetail.php';
    require 'connection.php'; // Ensure this file establishes $conn

    if (!isset($_SESSION['EMP_ID'])) {
        echo json_encode(["error" => "EMP_ID not set"]);
        exit;
    }

    $emp_id = $_SESSION['EMP_ID'];

    // Fetch the profile picture path from the database
    $query = "SELECT PFP_PATH FROM profilepic WHERE EMP_ID_FK_PFP = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $emp_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        echo json_encode(["profilePicture" => $row['PFP_PATH']]);
    } else {
        echo json_encode(["error" => "Profile picture not found"]);
    }

    $stmt->close();
    $conn->close();
?>
