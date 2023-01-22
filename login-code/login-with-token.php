
<?php


/*

//check token in the user for authenticate each page

session_start();

if (!isset($_SESSION['token'])) {
    // Token is not present, redirect to the login page
    header('Location: login.php');
    exit;
}

// Connect to the database
$conn = new mysqli('host', 'username', 'password', 'database');

// Verify that the token is valid
$token = $_SESSION['token'];
$query = "SELECT * FROM users WHERE token='$token'";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    // Token is valid, display the protected page
    echo 'Welcome to the protected page';
} else {
    // Token is not valid, redirect to the login page
    header('Location: login.php');
    exit;
}




*/

function generateToken() {
    return bin2hex(openssl_random_pseudo_bytes(32));
}

if($_POST['password'])
{
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Connect to the database
    $conn = new mysqli('host', 'username', 'password', 'database');

    // Check if the entered credentials match a user in the database
    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        // Login is successful
        $user = $result->fetch_assoc();
        // Generate and store token
        $token = generateToken();
        $_SESSION['token'] = $token;
        $query = "UPDATE users SET token='$token' WHERE id='$user[id]'";
        $conn->query($query);
        // Redirect to the protected page
        header('Location: protected.php');
    } else {
        // Login is not successful
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
<form method="post" action="login.php">
  <label for="username">Username:</label>
  <input type="text" id="username" name="username">
  <br>
  <label for="password">Password:</label>
  <input type="password" id="password" name="password">
  <br><br>
  <input type="submit" value="Login">
</form>

</body>
</html>