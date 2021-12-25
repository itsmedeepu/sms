<?php

include '../assets/db/db.php';
if(isset($_POST['did']))

{
	$id=$_POST['did'];

	//echo $id;
	// $name=$_POST['ename'];
	// $email=$_POST['eemail'];
	// $dob=$_POST['edob'];
	// $mname=$_POST['emname'];
	// $gender=$_POST['egender'];

	//echo $id,$name,$email,$dob,$mname,$gender;

	$qy="DELETE FROM students where ID='$id'";
	mysqli_query($con,$qy);

	echo 'Record Deleted  successfully';









}





?>