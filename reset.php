<?php
include 'assets/db/db.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>::STUDENT MANAGEMENT SYSTEM::2021</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css">

    <script src="assets/js.js"></script>
    <script src="assets/bootstrap/js/bootstrap.js"></script>

</head>

<style>
#refresh:hover {

    cursor: pointer;
}
</style>

<body>

    <div class="container" style="box-shadow: 0px 0px 10px 0px;">
        <div class="row mt-3">

            <div class="col-md-12">
                <div class="panel panel-primary" >
                    <div class=" panel-heading">
                        <h2 class="panel-title" style="font-size:20px; text-align:center;"><b>STUDENT MANAGEMENT SYSTEM(SMS)</b></h2>
                    </div>
                    <div class="panel-body">
                        <div class="col-md-4">
                            <div class="panel panel-danger" >
                                <div class=" panel-heading">
                                    <h3 class="panel-title"><b>RESET PASSWORD</b></h3>
                                </div>
                                <div class="panel-body">
                                    <form class="myform" method="post">
<!-- <div class="form-group">
<label for="username">Name</label>
<input id="name" class="form-control" type="text" name="name">
</div> -->
<div class="form-group">
    <label for="username">Email</label>
    <input id="email" class="form-control" type="email" name="email">
</div>
<!-- <div class="form-group">
    <label for="username">Phone</label>
    <input id="phone" class="form-control" type="text" name="pno">
</div> -->
<div class="form-group">
    <button id="sendotp" class="btn-small btn-warning">Send OTP <span> <div class="spinner-border text-primary" role="status">
</div></span></button><br/>
    <label>Enter OTP</label>
    <input type="password" class="form-control" required id="otp" name="otp" maxlength="4"/>


</div>
<div class="form-group">
    <label for="password">New Password</label>
    <input id="pass" class="form-control" type="password" name="pass">
</div>
<!-- <div class="form-group">
    <img src="../captcha.php" id="captcha_img">&nbsp;&nbsp;<span><img id="refresh" src="../assets/re.png" width="30px" height="30px"></span>
</div>

<div class="form-group">
    <label for="captcha">Captcha Code</label>
    <input id="captcha" class="form-control" type="text" name="captcha">
</div> -->

<div class="form-group">
    <input id="submit" type="submit" class="btn btn-success" name="submit">
    <button type="reset" class="btn btn-warning pull-right" name="Reset"><span class="glyphicon glyphicon-refresh"></span> Reset</button>
</div>
<div class="form-group">
    <p>Already Registered <a href="index.php">Login</a></p>
</div>
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
</div>
</div>

<script>
    /** code for refresh captcha**/
    $(document).ready(function() {
        $('#refresh').click(function() {
            $("#captcha_img").attr('src', '../captcha.php');
            return false;
        });
    });
</script>

<script>
    /** code for Form Submit**/
    $(document).ready(function() {

        $('#otp').keyup(function(){
            // $(this).val($(this).val().toUpperCase());
            this.value = this.value.replace(/[^0-9\.]/g,'');
        });


        $("#submit").click((function() {
                //var name = $('#name').val();
                var email = $('#email').val();
                var phone = $('#phone').val();
                var pass = $('#pass').val();
                var otp =$('#otp').val();
                var captcha = $('#captcha').val();
                // if (name == '') {
                //     alert("Please Enter Name");
                //     $('#name').focus();
                //     return false;
                // }
                if (email == '') {
                    alert("Please Enter Email");
                    $('#email').focus();
                    return false;
                }
                if (otp == '') {
                    alert("Please Enter otp");
                    $('#otp').focus();
                    return false;
                }
                // if (phone == '') {
                //     alert("Please Enter Phone");
                //     $('#phone').focus();
                //     return false;
                // }
                if (pass == '') {
                    alert("Please Enter Password");
                    $('#pass').focus();
                    return false;
                }

                // if (captcha == '') {
                //     alert("Please Enter captcha");
                //     $('#captcha').focus();
                //     return false;
                // }


            }));


        $('#sendotp').click((function(e){

            e.preventDefault();

            var email=$('#email').val();

            if(email=='')
            {

                alert('Please enter email');
                return false;
            }
            else{

                $.ajax({
                    url:'sendotp.php',
                    method:"post",
                    data:{email:email},
                    beforeSend: function() { 
                       $("#sendotp").html('<span class="glyphicon glyphicon-transfer"></span>sending otp...');
                   },

                   success:function(data){
                    $("#sendotp").html('send otp');
                    alert(data);


                },

            })

            }

        }));

        $(".myform" ).on( "submit", function( event ) {
            event.preventDefault();

            var data=$('.myform').serialize();

        //console.log(data);
        $.ajax({
            url: 'reset2.php',
            type: 'POST',
            data:data,
            success:function(data){

                if(data==1)
                {
                    alert('otp code wrong');

                }

                else if(data==2)
                {

                    alert('invalid Details');
                }
                else{
                    $(".myform")[0].reset();
                    alert(data);
                }
            },
        });
    });
    });
</script>
</body>

</html>