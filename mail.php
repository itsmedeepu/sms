<?php
$to_email = "deepaksdeep222@gmail.com";
$subject = "Simple Email Test via PHP";
$body = "Hi, This is test email send by PHP Script";
$headers = "From:deepaksdeep5414@gmail.com";

if (mail($to_email, $subject, $body, $headers)) {
    echo '<script>alert("Email sent to email")</script>';
} else {
    echo '<script>alert("Email sending failed...")</script>';
}
?>