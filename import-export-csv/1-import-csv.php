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
  while (($data = fgetcsv($handle, 1000, ',')) !== false) {
      // $data is an array of values for the current row
      // Do something with the data

      print_r($data[0]['2']);

      echo $data[0].',';
  }

  // Close the file
  fclose($handle);
}
?>
