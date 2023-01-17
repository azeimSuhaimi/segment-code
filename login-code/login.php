
<?php

//check cookies

if (isset($_COOKIE['remember_token'])) {
    # code...

    $remember_token = $_COOKIE['remember_token'];


    // Look up the user in the database using the remember_token
    $query = "SELECT * FROM users WHERE remember_token = '$remember_token'";
    $result = mysqli_query($db, $query);
    $user = mysqli_fetch_assoc($result);

    if (password_verify($remember_token,$user['remenber_token'])) {
        // Log the user in
        $_SESSION['logged_in'] = true;
        $_SESSION['user_id'] = $user['id'];
    } else {
        // The remember_token is invalid, remove the cookie
        setcookie('remember_token', '', time() - 3600);
    }

}

if(isset($_POST['']))
{
        // Get the submitted data
        $username = $_POST['username'];
        $password = $_POST['password'];

        $pass_hash = password_hash('123456', PASSWORD_DEFAULT);
        $user_hash = password_hash($username, PASSWORD_DEFAULT);
        // Check if the username and password match any records in the database
        $result = ['username' => 'admin','password' => $pass_hash]; //password is 123456


        if($result['username'] == $username && password_verify($password,$result['password']))
        {
            
            // Store the username in a session variable
            $_SESSION['username'] = $username;
            $_SESSION['logged_in'] = true;

            // Set a cookie with the username
            if(isset($_POST['remember_me']))
            {
                $remember_token = bin2hex(random_bytes(32)); //generate_token();
                $user_id = $_SESSION['username'];

                //hash remenber token
                $remember_token_hash = password_hash($remember_token, PASSWORD_DEFAULT);

                // store remember_token in the database
                $query = "UPDATE users SET remember_token = '$remember_token_hash' WHERE id = $user_id";
                mysqli_query($db, $query);

                // set the remember_token cookie
                 setcookie('remember_token', $remember_token, time() + (30 * 24 * 60 * 60));

            }
            //setcookie('username', $username, time() + (86400 * 30), "/"); // 86400 = 1 day

            // Redirect to the protected content
            header('location: welcome.php');
        }
        else
        {
            // Display an error message
            echo 'Invalid username or password';
        }
    
}

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<form>
    <label for="password">Password:</label>
    <input type="password" id="password" name="password">
    <br>
    <label for="show_password">Show password:</label>
    <input type="checkbox" id="show_password" onchange="showPassword()">
</form>

    
</body>
</html>


<script>
    function showPassword() {
    // Get the password input and checkbox elements
    var password = document.getElementById("password");
    var checkbox = document.getElementById("show_password");

    // Check the state of the checkbox
    if (checkbox.checked) {
        // If the checkbox is checked, change the input type to "text"
        password.type = "text";
    } else {
        // If the checkbox is not checked, change the input type back to "password"
        password.type = "password";
    }
}

</script>