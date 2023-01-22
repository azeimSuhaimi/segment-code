<?php
if (isset($_FILES['file'])) {
    $file = $_FILES['file'];

    // File properties
    $file_name = $file['name'];
    $file_tmp = $file['tmp_name'];
    $file_size = $file['size'];
    $file_error = $file['error'];
    $file_ext = explode('.', $file_name);
    $file_ext = strtolower(end($file_ext));

    // Allowed file types
    $allowed = array('jpg', 'jpeg', 'png', 'pdf');

    // Check if the file type is allowed
    if (in_array($file_ext, $allowed)) {
        // Check for errors
        if ($file_error === 0) {
            // Check file size
            if ($file_size <= 2097152) {
                // Generate new file name
                $file_name_new = uniqid('', true) . '.' . $file_ext;
                $file_destination = 'uploads/' . $file_name_new;

                // Move the file to the uploads folder
                if (move_uploaded_file($file_tmp, $file_destination)) {
                    echo 'File uploaded successfully';
                } else {
                    echo 'Error uploading file';
                }
            } else {
                echo 'File size is too large';
            }
        } else {
            echo 'Error uploading file';
        }
    } else {
        echo 'File type not allowed';
    }
}
?>
