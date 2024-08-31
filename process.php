<?php
session_start();
// get form data
$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$message = $_POST['message'];
$captcha = $_POST['captcha'];

// email address to receive the form data
$to_address = "luckymehndiartist@gmail.com";
$Bcc= "dgtalvebmediamarketing@gmail.com";

// email subject
$subject = "Business Inquiry from [$name] to Lucky Mehndi Art through DGTAL VEB MEDIA";

// captcha validation
if($_SESSION['captcha'] != $captcha){
    echo "Captcha verification failed! Please try again.";
    exit();
}

// email message
$message = "<table border='1' cellpadding='10'>";
$message .= "<tr><td><strong>Name:</strong> </td><td>" . strip_tags($_POST['name']) . "</td></tr>";
$message .= "<tr><td><strong>Phone:</strong> </td><td>" . strip_tags($_POST['phone']) . "</td></tr>";
$message .= "<tr><td><strong>Email:</strong> </td><td>" . strip_tags($_POST['email']) . "</td></tr>";
$message .= "<tr><td><strong>Message:</strong> </td><td>" . strip_tags($_POST['message']) . "</td></tr>";
$message .= "</table>";

// email headers
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= "From: $name <$email>" . "\r\n";
$headers .= "Bcc: $Bcc" . "\r\n";

// send email
mail($to_address, $subject, $message, $headers);

// redirect to thank you page
header("Location: thankyou.html");
?>