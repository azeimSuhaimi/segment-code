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

  // Loop through each line of the file
  $data = [];
  while (($line = fgetcsv($handle, 1000, ',')) !== false) {
      // Add the row to the data array
      $data[] = $line;
  }

  // Close the file
  fclose($handle);

  // Display the data as an HTML table
  echo "<table>";
  foreach ($data as $row) {
    echo "<tr>";
    foreach ($row as $value) {
      echo "<td>" . $value . "</td>";
    }
    echo "</tr>";
  }
  echo "</table>";
}
?>
