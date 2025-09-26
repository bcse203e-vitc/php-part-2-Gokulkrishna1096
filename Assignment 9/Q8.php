<?php
$inputFile = "data.txt";
$outputFile = "numbers.txt";


if (!file_exists($inputFile)) {
    die("Error: data.txt not found!");
}


$content = file_get_contents($inputFile);


$pattern = "/\b[6-9][0-9]{9}\b/";


preg_match_all($pattern, $content, $matches);

if (!empty($matches[0])) {

    file_put_contents($outputFile, implode(PHP_EOL, $matches[0]));
    echo "<h3>Extracted Mobile Numbers:</h3>";
    echo "<pre>" . implode("\n", $matches[0]) . "</pre>";
    echo "<p>Numbers saved to <b>$outputFile</b></p>";
} else {
    echo "No valid mobile numbers found.";
}
?>

