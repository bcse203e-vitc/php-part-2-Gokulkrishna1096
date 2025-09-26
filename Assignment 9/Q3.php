<?php
$emails = [
    "john@example.com",
    "wrong-email@",
    "me@site",
    "user123@gmail.com",
    "test.user@domain.co.in",
    "@missingname.com"
];

$pattern = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-z]{2,}$/";

echo "<h2>Valid Email Addresses</h2>";
echo "<ul>";

foreach ($emails as $email) {
    if (preg_match($pattern, $email)) {
        echo "<li>$email</li>";
    }
}

echo "</ul>";
?>

