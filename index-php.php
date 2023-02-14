
<?php
// Recipient email address
$to = "recipient@example.com";

// Subject of the email
$subject = "Test email";

// Message body
$message = "This is a test email message.";

// Additional headers
$headers = "From: sender@example.com\r\n";
$headers .= "Reply-To: reply-to@example.com\r\n";
$headers .= "X-Mailer: PHP/" . phpversion();

// Configuration options for the SMTP extension
$smtp_config = array(
    "host" => "smtp.mailtrap.io",
    "port" => 2525,
    "username" => "your-mailtrap-username",
    "password" => "your-mailtrap-password",
    "auth" => true,
);

// Create a new SMTP instance
$smtp = new SMTP($smtp_config["host"], $smtp_config["port"], "tls", $smtp_config["username"], $smtp_config["password"], $smtp_config["auth"]);

// Connect to the SMTP server
if ($smtp->connect()) {
    // Send the email
    if ($smtp->send($to, $subject, $message, $headers)) {
        echo "Email sent successfully.";
    } else {
        echo "Email sending failed.";
    }

    // Close the SMTP connection
    $smtp->disconnect();
} else {
    echo "SMTP connection failed.";
}


?>



