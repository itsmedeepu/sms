<?php
include '../assets/db/db.php';
if(isset($_POST['eid']))

{
	$id=$_POST['eid'];
	$name=$_POST['ename'];
	$email=$_POST['eemail'];
	$dob=$_POST['edob'];
	$mname=$_POST['emname'];
	$gender=$_POST['egender'];
	$branch=$_POST['ebranch'];
	$phone=$_POST['ephone'];

	//echo $id,$name,$email,$dob,$mname,$gender;

	$qy="UPDATE students set NAME='$name',EMAIL='$email',DOB='$dob',PHONE='$phone',MOTHER='$mname',GENDER='$gender',BRANCH='$branch' where ID='$id'";
	mysqli_query($con,$qy);

	echo 'updated successfully';









}




?>