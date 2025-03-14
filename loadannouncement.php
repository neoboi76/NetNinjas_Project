<?php
    include('connection.php');  // Ensure the database connection is included

    // Query to fetch media data
    $query = "SELECT A_AREANUM, A_NAME, A_PATH, A_TYPE FROM announcement"; // Replace 'media_table' with your actual table name

    // Execute the query
    $result = $conn->query($query);

    // Create an array to hold the media data
    $mediaData = [];

    if ($result) {
        // Fetch each row from the result
        while ($row = $result->fetch_assoc()) {
            $mediaData[] = [
                'area' => $row['A_AREANUM'],
                'name' => $row['A_NAME'],
                'path' => $row['A_PATH'],
                'type' => $row['A_TYPE']
            ];
        }
    }

    // Return the data as a JSON response
    echo json_encode($mediaData);
?>
