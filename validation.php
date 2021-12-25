 <?php
 include 'assets/db/db.php';
 require_once('function.php');
 session_start();
 $captcha = $_POST['captcha'];
 $fname= $_POST['fname'];
 $lname= $_POST['lname'];
 $name = $fname.' '.$lname;
 $dob = $_POST['dob'];
 $gender=$_POST['gender'];
 $bgroup=$_POST['bgroup'];
 $email=$_POST['email'];
 $phone=$_POST['pno'];
 $states=$_POST['states'];
 $district=$_POST['district'];
 $address=$_POST['address'];
 $fathername=$_POST['fathername'];
 $mname=$_POST['mname'];
 $ssc=$_POST['ssc'];
 $passyear=$_POST['passyear'];
 $branch=$_POST['branch'];
 $hostel=$_POST['hostel'];
 $prefix ='1BE';
 $middle=date('y');
 $pass=sha1(rand());
 $suffix=substr($branch,0,2); 
 $last=rand(100,999);
 $stuid = $prefix.$middle.$suffix.$last; 

 if (empty($captcha) || $captcha !== $_SESSION['captchacode']) {
  echo "1";
} else {


  $q = "select * from students where EMAIL='$email' && PHONE='$phone'";
  $query = mysqli_query($con,$q);
  $num = mysqli_num_rows($query);
  if ($num == 1){

    echo "2";
  } else {
   $user_avatar=make_avatar(strtoupper($name[0]));
   $qy="INSERT INTO `students`(`STUDENTID`, `NAME`, `DOB`, `GENDER`, `BGROUP`, `EMAIL`, `PHONE`, `STATE`, `DISTRICT`, `ADDRESS`, `FATHER`, `MOTHER`, `SSCREG`, `PASSYEAR`, `BRANCH`, `HOSTEL`,`PASS`,`USERAVTAR`) VALUES ('$stuid','$name','$dob','$gender','$bgroup','$email','$phone','$states','$district','$address','$fathername','$mname','$ssc','$passyear','$branch','$hostel','$pass','$user_avatar')";
   mysqli_query($con,$qy);

   echo "registred";

 }


}


?>