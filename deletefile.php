<?php
    include 'connection.php';

    header('Content-Type: application/json');

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        // Get the JSON request body
        $data = json_decode(file_get_contents("php://input"), true);

        if (isset($data['file_id'])) {
            $file_id = $data['file_id'];

            // Delete the record from the database
            $sql_delete = "DELETE FROM files WHERE F_ID = ?";
            $stmt = $conn->prepare($sql_delete);
            $stmt->bind_param("i", $file_id);

            if ($stmt->execute()) {
                echo json_encode(["success" => true, "message" => "File record removed from database."]);
            } else {
                echo json_encode(["success" => false, "message" => "Error deleting file record."]);
            }

            $stmt->close();
        } else {
            echo json_encode(["success" => false, "message" => "Invalid request. Missing parameters."]);
        }

        $conn->close();
    } else {
        echo json_encode(["success" => false, "message" => "Invalid request method."]);
    }
?>
