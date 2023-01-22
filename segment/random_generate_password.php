

<?php

function generateRandomPassword($length) {
    // Define the possible characters for the password
    $possibleCharacters = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789!@#$%^&*";
    $password = "";

    // Use a for loop to select a random character from the possible characters for the length of the password
    for ($i = 0; $i < $length; $i++) {
        $password .= $possibleCharacters[rand(0, strlen($possibleCharacters) - 1)];
    }

    return $password;
}



$password = generateRandomPassword(8); 
echo $password;


?>