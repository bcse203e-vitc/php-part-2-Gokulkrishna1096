<?php
$inputFile = "students.txt";
$errorFile = "errors.log";

file_put_contents($errorFile, "");

if (!file_exists($inputFile)) {
    die("Error: students.txt not found!");
}

$lines = file($inputFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

$emailPattern = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-z]{2,}$/";

$validStudents = [];

foreach ($lines as $line) {
    $fields = explode(",", $line);

    if (count($fields) != 3 || empty($fields[0]) || empty($fields[1]) || empty($fields[2])) {
        file_put_contents($errorFile, $line . PHP_EOL, FILE_APPEND);
        continue;
    }

    list($name, $email, $dob) = $fields;

    if (!preg_match($emailPattern, $email)) {
        file_put_contents($errorFile, $line . PHP_EOL, FILE_APPEND);
        continue;
    }

    try {
        $dobDate = new DateTime($dob);
        $today = new DateTime();
        $age = $today->diff($dobDate)->y;
    } catch (Exception $e) {
        file_put_contents($errorFile, $line . PHP_EOL, FILE_APPEND);
        continue;
    }

    $validStudents[] = [
        'name' => $name,
        'email' => $email,
        'age' => $age
    ];
}

echo "<h2>Valid Student Records</h2>";
if (!empty($validStudents)) {
    echo "<table border='1' cellpadding='10' cellspacing='0'>";
    echo "<tr><th>Name</th><th>Email</th><th>Age</th></tr>";
    foreach ($validStudents as $student) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($student['name']) . "</td>";
        echo "<td>" . htmlspecialchars($student['email']) . "</td>";
        echo "<td>" . $student['age'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No valid student records found.";
}

if (file_exists($errorFile) && filesize($errorFile) > 0) {
    echo "<h3>Invalid Records saved in <b>$errorFile</b></h3>";
    echo "<pre>" . file_get_contents($errorFile) . "</pre>";
}
?>

