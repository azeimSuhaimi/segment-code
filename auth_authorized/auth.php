<?php
session_start();

if (!isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
    // The user is not  logged in
    // Redirect to the protected content
    header('location: logout.php');
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