<?php
session_start();

if ((!isset($_SESSION['logged_in']) && !$_SESSION['logged_in'] === true) || !isset($_SESSION['token'])) {
    // The user is not  logged in
    // Redirect to the protected content
    header('location: logout.php');
} 

// Verify that the token is valid
$token = $_SESSION['token'];
$query = "SELECT * FROM users WHERE token='$token'";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    // Token is valid, display the protected page
    echo 'Welcome to the protected page';
} else {
    // Token is not valid, redirect to the login page
    header('Location: logout.php');
    exit;
}

//check authorized user on page
$user_id = $_SESSION['user_id'];
$query = "SELECT role FROM users WHERE id = '$user_id'";
$result = mysqli_query($db, $query);
$role = mysqli_fetch_assoc($result)['role'];

$query = "SELECT permissions FROM roles WHERE name = '$role'";
$result = mysqli_query($db, $query);
$permissions = mysqli_fetch_assoc($result)['permissions'];

$required_permission = "view_secret_page";
if (strpos($permissions, $required_permission) == false) {
    // The user does not have the required permission
    echo "You do not have permission to view this page";
    //header('location:.php')
} 











?>