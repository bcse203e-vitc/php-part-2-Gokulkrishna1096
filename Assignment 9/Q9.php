<?php
function createBackup($file) {

    if (!file_exists($file)) {
        die("Error: File not found!");
    }

    $pathInfo = pathinfo($file);
    $filename = $pathInfo['filename'];   // e.g., "data"
    $extension = isset($pathInfo['extension']) ? "." . $pathInfo['extension'] : "";

    $timestamp = date("Y-m-d_H-i"); // e.g., 2025-09-26_11-25

    $backupFile = $filename . "_" . $timestamp . $extension;

    if (copy($file, $backupFile)) {
        echo "Backup created successfully: <b>$backupFile</b>";
    } else {
        echo "Error: Could not create backup.";
    }
}

createBackup("data.txt");
?>

