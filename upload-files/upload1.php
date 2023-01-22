
<?php


if(isset($_POST['upload']))
{
    //echo "upload";
    //var_dump($_FILES);

    $location = "img/";

    $namefile = $_FILES['gambar']['name'];
    $tmpnamefile = $_FILES['gambar']['tmp_name'];
    $sizefile = $_FILES['gambar']['size'];
    $errorfile = $_FILES['gambar']['error'];

    //check have error or not inside file
    if($errorfile !== 4)
    {
        //check the valid extension file
        $ext_valid = ['png','jpeg','jpg'];
        $file_ext = explode('.',$namefile);
        $file_ext = strtolower( end($file_ext) );
        if(in_array($file_ext,$ext_valid))
        {
            //check size limit can uplaod
            if($sizefile < 5000000)
            {
                $newnamefile = uniqid();
                $newnamefile .= '.' . $file_ext;
                //var_dump($newnamefile);
                move_uploaded_file($tmpnamefile,$location.$newnamefile);

                //insert into database code here user newnamefile
                
            }
            else
            {
                echo "<script>alert('size file too large');</script>";
            }
        }
        else
        {
            echo "<script>alert('you upload is not valid extension file');</script>";
        }
        
    }
    else
    {
        echo "<script>alert('choose images first');</script>";
    }

    

    


    

    

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Document</title>
</head>
<body>


<form action=""  method="post" enctype="multipart/form-data">

    <label for="file"></label>
    <input type="file" name="gambar" id="file"><br>
    <button type="submit" name="upload">upload</button>
</form>
</body>
</html>