<?php 

    if(isset($_POST['sub']))
    {
        if(!empty($_POST['lang']))
        {
            $lang = $_POST['lang'];
            foreach($lang as $l)
            {
                echo $l.'<br>';
            }
        }   
        else
        {

        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <form action="" method="POST">
    
        <label for=""> <input type="checkbox" name="lang[]" value="html" id="">html</label>
        <label for=""> <input type="checkbox" name="lang[]" value="css" id="">css</label>
        <label for=""> <input type="checkbox" name="lang[]" value="javascript" id="">javascript</label>
        <label for=""> <input type="checkbox" name="lang[]" value="php" id="">php</label>
        <label for=""> <input type="checkbox" name="lang[]" value="ajax" id="">ajax</label>

        <button type="submit" name="sub">submit</button>
    </form>
    
</body>
</html>