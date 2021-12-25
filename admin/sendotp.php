<?php
include '../assets/db/db.php';
session_start();
$otp=rand(1000,9999);
// $otp=$_SESSION['otp'];
$_SESSION['otp']=$otp;
if(isset($_POST['email']))
{
    $email=mysqli_escape_string($con,$_POST['email']);

    $q = "select * from admin where EMAIL='$email'";
    $query = mysqli_query($con, $q);
    $num = mysqli_num_rows($query);
    if ($num !=1)
    {
        echo 'Email not found in our database';


    }
    else{


        $to_email = $email;
        $subject = "OTP for reset password";
        $body = "Your otp is $otp  ";
        $headers = "From:deepaksdeep5414@gmail.com";
        mail($to_email, $subject, $body, $headers);

        echo 'Email with otp sent successfully';

    }



   // echo $email;
}







?>