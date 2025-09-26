<?php
class PasswordException extends Exception {}

function validatePassword($password) {
    if (strlen($password) < 8) {
        throw new PasswordException("Password must be at least 8 characters long.");
    }

    if (!preg_match('/[A-Z]/', $password)) {
        throw new PasswordException("Password must contain at least one uppercase letter.");
    }

    if (!preg_match('/[0-9]/', $password)) {
        throw new PasswordException("Password must contain at least one digit.");
    }

    if (!preg_match('/[@#$%]/', $password)) {
        throw new PasswordException("Password must contain at least one special character (@, #, $, %).");
    }

    return true;
}

$passwords = [
    "hello123",       
    "Hello123",      
    "Hello123@",      
    "short@1A"       
];

foreach ($passwords as $pwd) {
    try {
        if (validatePassword($pwd)) {
            echo "<p><b>$pwd</b> Password is valid</p>";
        }
    } catch (PasswordException $e) {
        echo "<p><b>$pwd</b> Error: " . $e->getMessage() . "</p>";
    }
}
?>

