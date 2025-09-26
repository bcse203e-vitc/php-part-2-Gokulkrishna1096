<?php
$filename = "access.log";

function addLog($username, $action, $filename) {
    $timestamp = date("Y-m-d H:i:s");
    $entry = "$username – $timestamp – $action" . PHP_EOL;
    file_put_contents($filename, $entry, FILE_APPEND); // Append mode
}

addLog("admin", "Logged In", $filename);
addLog("user1", "Viewed Dashboard", $filename);
addLog("guest", "Attempted Login", $filename);

$lines = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

$lastLogs = array_slice($lines, -5);

echo "<h2>Last 5 Log Entries</h2>";
echo "<table border='1' cellpadding='10' cellspacing='0'>";
echo "<tr><th>Username</th><th>Date & Time</th><th>Action</th></tr>";

foreach ($lastLogs as $log) {
    // Split log into parts
    $parts = explode(" – ", $log);
    echo "<tr>";
    echo "<td>" . htmlspecialchars($parts[0]) . "</td>";
    echo "<td>" . htmlspecialchars($parts[1]) . "</td>";
    echo "<td>" . htmlspecialchars($parts[2]) . "</td>";
    echo "</tr>";
}

echo "</table>";
?>

