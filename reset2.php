 <?php
 include 'assets/db/db.php';
 session_start();
 $email=mysqli_escape_string($con,$_POST['email']);
 $otp=mysqli_escape_string($con,$_POST['otp']);
 $pass=mysqli_escape_string($con,sha1($_POST['pass']));
 if (empty($otp) || $otp!= $_SESSION['otp']) {
    echo "1";
} else {
    $q = "select * from students where EMAIL='$email'";
    $query = mysqli_query($con, $q);
    $num = mysqli_num_rows($query);
    if ($num != 1) {

        echo "2";
    } else {
        $qy = "update students set PASS='$pass' where EMAIL='$email'";
        mysqli_query($con, $qy);
        echo "Password Reset Succesfully";


    }
}






?>