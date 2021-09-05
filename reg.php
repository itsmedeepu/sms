<?php
include 'assets/db/db.php';
session_start();


?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>:: STUDENT MANAGEMENT SYSTEM ::2021</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="assets/bootstrap/css/style.css">

	<script src="assets/js.js"></script>
	<script src="assets/bootstrap/js/bootstrap.js"></script>

</head>

<style>

#refresh:hover{

	cursor: pointer;


}
</style>

<body>

	<div class="container" style="box-shadow: 0px 0px 10px 0px;">
		<div class="row mt-3">

			<!-- JUNE / JULY - 2021 Examination -->
			<div class="col-md-12">
				<div class="panel panel-primary">
					<div class=" panel-heading">
						<h2 class="panel-title" style="font-size:20px; text-align:center;"><b>STUDENT MANAGEMENT SYSTEM(SMS)</b></h2>
					</div>
					<div class="panel-body">
						<div class="col-md-12">
							<div class="panel panel-primary">
								<div class=" panel-heading">
									<h3 class="panel-title "><b>STUDENT REGISTRATION</b></h3>
								</div>

								<div class="panel-body">
									<div id="success" class="alert alert-success " role="alert" style="display:none;">

										<strong>Thank you !</strong> You have Successfully Registred!
									</div>
									<div id="err1" class="alert alert-warning " role="alert" style="display:none;">
										<strong>Sorry!</strong> Kindly Enter correct captcha code!
									</div>
									<div id="err2" class="alert alert-danger" role="alert" style="display:none;">
										
										<strong>Hmmm!!</strong> User with same details found!
									</div>
									<form method="post"  class="myform" >
										<div class="form-row">
											<div class="form-group col-md-4">
												<label for="firstname">First Name*</label>
												<input   data-toggle="tooltip" title="First name in case  ex-DEEPAK S here First name is DEEPAK"  id="fname" class="form-control" type="text" name="fname" maxlength="20" required autocomplete="off">
											</div>
											<div class="form-group col-md-3">
												<label for="lastname">Last Name*</label>
												<input  data-toggle="tooltip" title="last name in case ex:DEEPAK S the initial is your last name " id="lname" class="form-control" type="text" maxlength="10" name="lname" required autocomplete="off">
											</div>
											<div class="form-group col-md-3">
												<label for="dob">Date of birth*</label>
												<input id="dob" data-toggle="tooltip" title="Date of birth Should be as per sslc marks card " class="form-control" type="date" name="dob" autocomplete="off" required>
											</div>
											<div class="form-group col-md-2">
												<label for="gender">Select Gender*</label>
												<select class="form-control" name="gender"id="gender" required>
													<option value="">**SELECT**</option>
													<option value="MALE">MALE</option>
													<option value="FEMALE">FEMALE</option>
													<option value="OTHERS">OTHERS</option>
												</select>
											</div>
										</div>
										<div class="form-group col-lg-4">
											<label for="blood group">Select Blood Group*</label>
											<select class="form-control" name="bgroup" required >
												<option value="">**select**</option>
												<option value="A+">A+</option><option value="A-">A-</option>
												<option value="B+">B+</option><option value="B-">B-</option>
												<option value="O+">O+</option><option value="O-">O-</option>
												<option value="AB+">AB+</option><option value="AB-">AB-</option>
											</select>
										</div>
										<div class="form-group col-md-4" >
											<label for="email">Email*</label>
											<input type="email"  class="form-control" name="email" required=>
										</div>
										<div class="form-group col-md-4" >
											<label for="email">Phone Number*</label>
											<input type="text" data-toggle="tooltip" title="Enter number 10 digits do not include +91" id="pno" class="form-control" name="pno" required=>
										</div>
										
										<div class="form-group col-lg-4">
											<label>SELECT YOUR STATE*</label>
											<select class="form-control"  namE="states" required>
												<option value="">**SELECT STATE**</option>
												<option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
												<option value="Andhra Pradesh">Andhra Pradesh</option>
												<option value="Arunachal Pradesh">Arunachal Pradesh</option>
												<option value="Assam">Assam</option>
												<option value="Bihar">Bihar</option>
												<option value="Chandigarh">Chandigarh</option>
												<option value="Chhattisgarh">Chhattisgarsh</option>
												<option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
												<option value="Daman and Diu">Daman and Diu</option>
												<option value="Delhi">Delhi</option>
												<option value="Goa">Goa</option>
												<option value="Gujarat">Gujarat</option>
												<option value="Haryana">Haryana</option>
												<option value="Himachal Pradesh">Himachal Pradesh</option>
												<option value="Jammu and Kashmir">Jammu and Kashmir</option>
												<option value="Jharkhand">Jharkhand</option>
												<option value="Karnataka">Karnataka</option>
												<option value="Kerala">Kerala</option>
												<option value="Lakshadweep">Lakshadweep</option>
												<option value="Madhya Pradesh">Madhya Pradesh</option>
												<option value="Maharashtra">Maharashtra</option>
												<option value="Manipur">Manipur</option>
												<option value="Meghalaya">Meghalaya</option>
												<option value="Mizoram">Mizoram</option>
												<option value="Nagaland">Nagaland</option>
												<option value="Orissa">Orissa</option>
												<option value="Pondicherry">Pondicherry</option>
												<option value="Punjab">Punjab</option>
												<option value="Rajasthan">Rajasthan</option>
												<option value="Sikkim">Sikkim</option>
												<option value="Tamil Nadu">Tamil Nadu</option>
												<option value="Tripura">Tripura</option>
												<option value="Uttaranchal">Uttaranchal</option>
												<option value="Uttar Pradesh">Uttar Pradesh</option>
												<option value="West Bengal">West Bengal</option>
											</select>

										</div>
										<div class="form-group col-lg-4">
											<label for="DISTRICT">Enter District*</label>
											<input type="text" id="dist" name="district" class="form-control" required>

										</div>
										<div class="form-group col-lg-4">
											<label for="address">Address*</label>
											<textarea  class="form-control"  name="address" required></textarea>
										</div>
										<div class="form-group col-lg-4">
											<label for="father">Father Name*</label>
											<input type="text"  data-toggle="tooltip" title="Father name should be as per sslc/10th marks card"  id="father" name="fathername" class="form-control" maxlength="20" required>
											
										</div>
										<div class="form-group col-lg-4">
											<label for="father">Mother Name*</label>
											<input type="text"  data-toggle="tooltip" title="Mother name should be as per sslc/10th marks card"  id="mname" name="mname" class="form-control" maxlength="20" required>
											
										</div>
										<div class="form-group col-lg-4">
											<label for="ssc">SSLC/SSC/10th REGISTRATION NUMBER*</label>
											<input type="text"  data-toggle="tooltip" title="Enter the 10th Registration number"  id="ssc" name="ssc" class="form-control" maxlength="15" required>
											
										</div>
										<div class="form-group col-lg-4 ">
											<label for="year">Select 12th pass year*</label>
											<select class="form-control" name="passyear" id="passyear" required>
												<option value="">**SELECT**</option>
												<option value="2016">2016</option>
												<option value="2017">2017</option>
												<option value="2018">2018</option>
												<option value="2019">2019</option>
												<option value="2020">2020</option>
											</select>
										</div>
										<div class="form-group col-lg-4">
											<label for="degree">Select Branch*</label>
											<select class="form-control" name="branch" id="branch" required>
												<option value="">**SELECT**</option>
												<option value="COMPUTERS">B.E/COMPUTER SCEINCE ENGINEERING</option>
												<option value="CIVIL">B.E/CVIL ENGINEERING</option>
												<option value="ELECTRONICS">B.E/ELECTRONICS & COMUNICATION ENGINEERING </option>
												<option value="ELECTRICAL">B.E/ELECTRICAL ENGINEERING</option>
												<option value="MECHANICAL">B.E/MECHNICAL ENGINEERING</option>
											</select>
										</div>
										<div class="form-group col-lg-4" >
											<label>Hostel*</label>
											<select class="form-control" name="hostel" id="hostel" required>
												<option value="">**SELECT**</option>
												<option value="YES">YES</option>
												<option value="NO">NO</option>
											</select>

										</div>
										<div class="form-group ">
											<img id="captcha_img" src="captcha.php">&nbsp;&nbsp;<span><img id="refresh" src="assets/re.png" width="30px" height="30px"></span>
										</div>
										<div class="form-group col-lg-4">
											<label>Enter Captcha*</label>
											<input type="text" class="form-control" name="captcha" required>
										</div>


										<div class="form-group text-center">
											<button class="btn btn-success text-center" name="submit" type="submit">SUBMIT</button>
											<button class="btn btn-danger" type="reset">RESET</button>

										</div>






                                           <!-- 
										<div class="form-group">
											<input id="submit" type="submit" class="btn btn-success" name="submit">
											<button type="reset" class="btn btn-warning" name="Reset"><span class="glyphicon glyphicon-refresh"></span> Reset</button>
										</div> -->
									</form>


								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12" style="background:#2a2730;margin:0px;padding:10px;box-shadow:0px 0px 10px 0px #888888;">
						<div class="row">
							<div class="col-md-12" style="text-align:center;color:white;padding-left:20px;"> © 2021 Designed and Maintained by <a href="https://deepak1.xyz/" target="_blank" style="color: #fcb316;"> Deepak S ver-0.0.1</a></div>
						</div>
					</div>
				</div>

			</div>
			<!-- JUNE / JULY - 2021 Examination -->
		</div>
	</div>

	<script>
		/** code for refresh captcha**/
		$(document).ready(function() {
			$('#refresh').click(function() {
				$("#captcha_img").attr('src', 'captcha.php');
				return false;
			});
		});
	</script>

	<script>
		/** code for Form Submit**/
    // $(document).ready(function() {


    //     $("#submit").click((function() {
    //         var name = $('#name').val();
    //         var email = $('#email').val();
    //         var phone = $('#phone').val();
    //         var pass = $('#pass').val();
    //         var captcha = $('#captcha').val();
    //         if (name == '') {
    //             alert("Please Enter Name");
    //             $('#name').focus();
    //             return false;
    //         }
    //         if (email == '') {
    //             alert("Please Enter Email");
    //             $('#email').focus();
    //             return false;
    //         }
    //         if (phone == '') {
    //             alert("Please Enter Phone");
    //             $('#phone').focus();
    //             return false;
    //         }
    //         if (pass == '') {
    //             alert("Please Enter Password");
    //             $('#pass').focus();
    //             return false;
    //         }
    //         if (captcha == '') {
    //             alert("Please Enter captcha");
    //             $('#captcha').focus();
    //             return false;
    //         }



    //     }));
    // });


    $("#fname,#lname,#dob,#pno,#father,#mname,#ssc").tooltip(
    {

    	placement: "top",
    	trigger: "focus"
    	
    });







</script>
<script type="text/javascript">
	/**script to change diable the numeric and also change to upper case*/
	$(document).ready(function(){
		$('#fname,#lname,#father,#mname').keyup(function(){
			$(this).val($(this).val().toUpperCase());
			this.value = this.value.replace(/[^A-Z\.]/g,'');
		});
		$('#pno,#ssc').keyup(function(){
			$(this).val($(this).val().toUpperCase());
			this.value = this.value.replace(/[^0-9\.]/g,'');
		});
		$('#dist').keyup(function(){
			$(this).val($(this).val().toUpperCase());
			this.value = this.value.replace(/[^A-Z\.]/g,'');
		});


	});

	/** code for refresh captcha**/

	$('#refresh').click(function() {
		$("#captcha_img").attr('src', 'captcha.php');
		return false;
	});

</script>


<script type="text/javascript">
	// $( ".myform" ).on( "submit", function( event ) {
	// 	event.preventDefault();
	// 	var data=$('myform').serialize();
	// 	$.ajax({
	// 		url: 'validation.php',
	// 		type: 'POST',
	// 		data: data,
	// 		dataType: "json",
	// 		success:function(data){

	// 			alert(data);


	// 		},
	// 		error:function(data){

	// 			alert(data);



	// 		}
	// 	});



	// 	console.log( $( this ).serialize() );
	// });

</script>


<script type="text/javascript">

	$(document).ready(function() {
//last modified by deepak s do not edit this 

$(".myform" ).on( "submit", function( event ) {
	event.preventDefault();

	var data=$('.myform').serialize();

		//console.log(data);
		$.ajax({
			url: 'validation.php',
			type: 'POST',
			data:data,
			success:function(response){
				//alert(data);
				
				if(response==1)
				{
					$("#err1").fadeIn(1000, function(){     
					}); 
					window.setTimeout(function () { 
						$("#err1").hide(); 
					}, 6000);
					$("#captcha_img").attr('src', 'captcha.php');


				}
				else if(response==2)
				{

					$("#err2").fadeIn(1000, function(){     
					}); 
					window.setTimeout(function () { 
						$("#err2").hide(); 
					}, 6000);  


				}

				else{
					$("#success").fadeIn(1000, function(){     
					}); 
					window.setTimeout(function () { 
						$("#success").hide(); 
					}, 6000);  
					$(".myform")[0].reset();
					$("#captcha_img").attr('src', 'captcha.php');



				}

			},
		})
	});


});



</script>

</body>


</html>