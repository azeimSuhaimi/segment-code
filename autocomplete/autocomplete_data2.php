<?php
// Connect to the database
$conn = mysqli_connect('localhost', 'root', '', 'food_order');

// Get the query parameter from the GET request
$q = $_GET['q'];

 //Create the SQL statement to search the database
$sql = "SELECT * FROM users WHERE name LIKE '%$q%'";

// Execute the SQL statement
$result = mysqli_query($conn, $sql);

// Create an empty array to store the results
$data = array();
//$data = array('apple','banana','cindy',$q);

// Loop through the results and add each name to the array
while ($row = mysqli_fetch_array($result)) {
   $data[] = $row['name'];
}

// Return the results as a JSON object
echo json_encode($data);
