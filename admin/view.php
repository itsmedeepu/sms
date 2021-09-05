<?php
include "../assets/db/db.php";
if(isset($_POST['id']))
{
	$id=$_POST['id'];
	$q="SELECT * FROM students where ID='$id'";
	$result=mysqli_query($con,$q);
	$row =mysqli_fetch_assoc($result);
	$data['id'] = $row['ID'];
	$data['name'] = $row['NAME'];
	$data['gender'] = $row['GENDER'];
	$data['fname'] = $row['FATHER'];
	$data['mname'] = $row['MOTHER'];
	$data['bgroup']=$row['BGROUP'];
	$data['dob']=$row['DOB'];
	$data['email']=$row['EMAIL'];
	$data['phone']=$row['PHONE'];
	$data['state']=$row['STATE'];
	$data['district']=$row['DISTRICT'];
	$data['address']=$row['ADDRESS'];
	$data['studentid']=$row['STUDENTID'];
	$data['ssc']=$row['SSCREG'];
	$data['pass']=$row['PASSYEAR'];
	$data['branch']=$row['BRANCH'];
	$data['hostel']=$row['HOSTEL'];
	$data['time']=$row['TIME'];


	$img = $row['USERAVTAR'];
        // $data['name'] = $row['pro_name'];
        // $data['price'] = $row['pro_price'];

        // $img = $row['pro_img'];

	$data['img'] = "<img src='../".$img."' alt='' width='80px' height='80px' class='img-circle img-responsive'>";
	echo json_encode($data);


	


}

?>
