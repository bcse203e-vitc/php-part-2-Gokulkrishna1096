<?php
// File name
$filename = "products.txt";

if (!file_exists($filename)) {
    die("Error: File not found!");
}


$lines = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);


$products = [];
foreach ($lines as $line) {
    list($name, $price) = explode(",", $line);
    $products[$name] = (int)$price; // store as integer
}

asort($products);

echo "<h2>Sorted Product List</h2>";
echo "<table border='1' cellpadding='10' cellspacing='0'>";
echo "<tr><th>Product Name</th><th>Price</th></tr>";

foreach ($products as $name => $price) {
    echo "<tr>";
    echo "<td>$name</td>";
    echo "<td>$price</td>";
    echo "</tr>";
}

echo "</table>";
?>

