<?php 
    //To reuse the code when coding
    $host = "34.92.138.155"; 
    $user = "root2"; 
    $pass = "O1Bf>i:9/v&kA-@i"; 
    $db = "web2proj"; 

    $conn = new mysqli($host, $user, $pass, $db);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>