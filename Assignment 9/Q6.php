<?php
echo "<h2>Current Date & Time</h2>";
echo date("d-m-Y H:i:s") . "<br><br>";


if (isset($_POST['dob'])) {
    $dob = $_POST['dob'];

    try {
        $dobDate = new DateTime($dob);
        $today = new DateTime();

        $nextBirthday = new DateTime(date("Y") . "-" . $dobDate->format("m-d"));

        if ($nextBirthday < $today) {
            $nextBirthday->modify("+1 year");
        }

        $interval = $today->diff($nextBirthday);
        $daysLeft = $interval->days;

        echo "<h2>Birthday Countdown</h2>";
        echo "Your next birthday is on <b>" . $nextBirthday->format("d-m-Y") . "</b><br>";
        echo "Days left: <b>$daysLeft</b>";
    } catch (Exception $e) {
        echo "Invalid date format!";
    }
}
?>

<h2>Enter Your Date of Birth</h2>
<form method="post">
    <label for="dob">Date of Birth (YYYY-MM-DD): </label>
    <input type="date" name="dob" required>
    <button type="submit">Calculate</button>
</form>

