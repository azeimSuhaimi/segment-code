<form method="post" enctype="multipart/form-data">
  <input type="file" name="csv_file">
  <input type="submit" name="submit" value="Upload">
</form>

<?php
// Check if the form has been submitted
if (isset($_POST['submit'])) {
  // Get the file name and temporary file location
  $file_name = $_FILES['csv_file']['name'];
  $file_tmp = $_FILES['csv_file']['tmp_name'];
  
  // Check if file is a CSV file
  $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
  if ($file_ext != 'csv') {
    echo "Error: Please upload a CSV file.";
    exit;
  }

  // Open the CSV file
  $handle = fopen($file_tmp, 'r');

  // Connect to the MySQL database
  $host = 'localhost';
  $user = 'your_username';
  $password = 'your_password';
  $database = 'your_database';
  $conn = mysqli_connect($host, $user, $password, $database);

  // Loop through each line of the file
  while (($data = fgetcsv($handle, 1000, ',')) !== false) {
      // $data is an array of values for the current row
      // Insert the data into the MySQL database
      $sql = "INSERT INTO your_table (col1, col2, col3) VALUES ('$data[0]', '$data[1]', '$data[2]')";
      mysqli_query($conn, $sql);
  }

  // Close the file and database connection
  fclose($handle);
  mysqli_close($conn);
}

// Display the data from the MySQL database
$host = 'localhost';
$user = 'your_username';
$password = 'your_password';
$database = 'your_database';
$conn = mysqli_connect($host, $user, $password, $database);

$sql = "SELECT * FROM your_table";
$result = mysqli_query($conn, $sql);

echo "<table>";
while ($row = mysqli_fetch_assoc($result)) {
  echo "<tr>";
  foreach ($row as $value) {
    echo "<td>" . $value . "</td>";
  }
  echo "</tr>";
}
echo "</table>";

mysqli_close($conn);
?>
