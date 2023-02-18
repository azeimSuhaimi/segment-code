<?php
// Open a connection to the database
$db = new mysqli('localhost', 'root', '', 'login-system');

// Check if the connection was successful
if ($db->connect_error) {
  die("Connection failed: " . $db->connect_error);
}

// Select the data from the database table
$sql = "SELECT * FROM users";
$result = $db->query($sql);

// Create a new CSV file
$file = fopen('output.csv', 'w');

// Loop through the database results and write them to the CSV file
while ($row = $result->fetch_assoc()) {
  fputcsv($file, $row);
}

// Close the CSV file and the database connection
fclose($file);
$db->close();

// Download the CSV file
header('Content-Type: application/csv');
header('Content-Disposition: attachment; filename="output.csv"');
readfile('output.csv');
?>
