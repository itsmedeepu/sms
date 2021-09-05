<?php
include 'assets/db/db.php';
session_start();
$_SESSION['token'] = bin2hex(random_bytes(32));
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>:: STUDENT MANAGEMENT SYSTEM ::</title>
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

            <!-- JUNE / JULY - 2021 Examination -->
            <div class="col-md-12">
                <div class="panel panel-primary" style="box-shadow:0px 0px 20px #dff0d8;">
                    <div class="panel-heading">
                        <h2 class="panel-title" style="font-size:20px; text-align:center;"><b>STUDENT MANAGEMENT SYSTEM(SMS)</b></h2>
                    </div>
                    <div class="panel-body">
                        <div class="col-md-4">
                            <div class="panel panel-success" >
                                <div class=" panel-heading">
                                    <h3 class="panel-title"><b>Student Login</b></h3>
                                </div>
                                <div class="panel-body">

                                    <span id="lod1" style="display:none;">Logging You in please wait....</span> <img src="assets/images/ajax-loader.gif" id="lod" style="display:none;"  height="50px">

                                    <form class="myform" id="myform">
                                        <div id="success" class="alert alert-success " role="alert" style="display:none;">

                                            <strong>Thank you !</strong> You have Logged in successfully!
                                        </div>
                                        <div id="err1" class="alert alert-warning " role="alert" style="display:none;">
                                            <strong>Sorry!</strong> Kindly Enter correct captcha code!
                                        </div>
                                        <div id="err2" class="alert alert-danger" role="alert" style="display:none;">

                                            <strong>Hmmm!!</strong> Inavlid details !!!
                                        </div>
                                        <div class="form-group">
                                            <input type="hidden" name="token" value="<?=$_SESSION['token']?>"/>
                                            <label for="username">Username</label>
                                            <input id="email" class="form-control" type="email" name="email">
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input id="pass" class="form-control" type="password" name="pass">
                                        </div>
                                        <div class="form-group">
                                            <img src="captcha.php" id="captcha_img">&nbsp;&nbsp;<span><img id="refresh" src="assets/re.png" width="30px" height="30px"></span>
                                        </div>

                                        <div class="form-group">
                                            <label for="captcha">Captcha Code</label>
                                            <input id="captcha" class="form-control" type="text" name="captcha">
                                        </div>

                                        <div class="form-group">
                                            <button  type="submit" id="submit" class="btn btn-success">Submit</button>
                                            <button type="reset" class="btn btn-warning pull-right" name="Reset"><span class="glyphicon glyphicon-refresh"></span> Reset</button>
                                        </div>
                                        <div class="form-group">
                                            <p>Forgot<a href="reset.php"> Password ??</a></p>
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

    <script >
        /** code for Form Submit**/
        $(document).ready(function() {


            $("#submit").click((function() {
                var email = $('#email').val();
                var pass = $('#pass').val();
                var captcha = $('#captcha').val();
                if (email == '') {
                    alert("Please Enter Email");
                    $('#email').focus();
                    return false;
                }
                if (pass == '') {
                    alert("Please Enter password");
                    $('#pass').focus();
                    return false;
                }
                if (captcha == '') {
                    alert("Please Enter captcha");
                    $('#captcha').focus();
                    return false;
                }



            }));
        });
    </script>

    <script type="text/javascript">

        $(document).ready(function() {
//last modified by deepak s do not edit this 

$(".myform" ).on( "submit", function( event ) {
    event.preventDefault();

    var data=$('.myform').serialize();

        //console.log(data);
        $.ajax({
            url: 'validation1.php',
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

                    $('.myform').hide();
                    $("#lod,#lod1").show();
                    window.setTimeout(function () { 
                       $("#lod,#lod1").hide(); 
                   }, 5000);

                 // $("#submit").html('<span class="glyphicon glyphicon-info-refresh">Loggingin.... </span>');
                 window.setTimeout(function() {
                    window.location.href = 'student/';
                }, 4000);

                    //$(".myform")[0].reset();
                    $("#captcha_img").attr('src', 'captcha.php'); 
                    //window.location.href="student/"; 



                }

            },
        })
    });


});
</script>
</body>

</html>