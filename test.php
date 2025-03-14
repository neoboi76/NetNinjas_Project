<?php
require 'vendor/autoload.php';

use Google\Cloud\Storage\StorageClient;

try {
    $storage = new StorageClient();
    echo "Google Cloud Storage is installed and working!";
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>
