
<?php

/*
option 1

$old_image = $this->Users_model->getbyic($ic)['image'];
if($old_image !== "empty.png")
{
    unlink(FCPATH . 'assets/img/profile/'.$old_image);
}
*/

/*

option 2

$file_path = 'path/to/image.jpg';

if (file_exists($file_path)) {
    if (unlink($file_path)) {
        echo 'File deleted successfully';
    } else {
        echo 'Error deleting file';
    }
} else {
    echo 'File does not exist';
}


*/


?>