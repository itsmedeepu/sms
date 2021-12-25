<?php
include '../assets/db/db.php';
session_start();
$_SESSION['token'] = bin2hex(random_bytes(32));
if(isset($_POST['submit'])) {
    $captcha = $_POST['captcha'];
    $token=$_POST['token'];
    $email = mysqli_escape_string($con, $_POST['email']);
    $key = mysqli_escape_string($con,$_POST['key']);
    $pass = mysqli_escape_string($con,$_POST['pass']);
    //$pass = mysqli_escape_string($con,sha1($_POST['pass']));
    if (empty($captcha) || $captcha != $_SESSION['captchacode'] && $token!=$_SESSION['token']) {
        echo "<script>alert('captcha code wrong are session exxpired');</script>";
    } else {

        $q = "select * from admin where EMAIL='$email' && PASS='$pass' && SECRET='$key'";
        $query = mysqli_query($con,$q);
        $num = mysqli_num_rows($query);
        if ($num == 1){

            
            $row = mysqli_fetch_assoc($query);
            $_SESSION['email'] = $row['EMAIL'];
            $_SESSION['name'] = $row['NAME'];
            $_SESSION['key'] = $row['SECRET'];
           



            // $_SESSION['phone'] = $row['PHONE'];
            // $_SESSION['stid'] = $row['STUDENTID'];
            // $_SESSION['useravtar']=$row['USERAVTAR'];
            // $_SESSION['gender']=$row['GENDER'];
            // $_SESSION['bgroup']=$row['BGROUP'];
            // $_SESSION['branch']=$row['BRANCH'];
            // $_SESSION['fname']=$row['FATHER'];
            // $_SESSION['mname']=$row['MOTHER'];
            echo "<script>alert('Logged in sucessully ');
            window.location.href='dashboard.php';
            </script>";
            

        } 
        else {

            echo "<script>alert('Invalid Login Details ');
            </script>";
        }
    }

} 
else {
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>:: STUDENT MANAGEMENT SYSTEM ::</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.css">

    <script src="../assets/js.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.js"></script>

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
                                    <h3 class="panel-title"><b>Admin Login</b></h3>
                                </div>
                                <div class="panel-body">
                                    <form method="post">
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
                                            <label for="key">SECRET KEY</label>
                                            <input id="key" class="form-control" type="password" name="key">
                                        </div>
                                        <div class="form-group">
                                            <img src="../captcha.php" id="captcha_img">&nbsp;&nbsp;<span><img id="refresh" src="../assets/re.png" width="30px" height="30px"></span>
                                        </div>


                                        <div class="form-group">
                                            <label for="captcha">Captcha Code</label>
                                            <input id="captcha" class="form-control" type="text" name="captcha">
                                        </div>

                                        <div class="form-group">
                                            <button id="submit" type="submit" class="btn btn-success" name="submit">Submit</button>
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
                $("#captcha_img").attr('src', '../captcha.php');
                return false;
            });
        });
    </script>

    <script>
        /** code for Form Submit**/
        $(document).ready(function() {

            $("#submit").click((function() {
                var email = $('#email').val();
                var pass = $('#pass').val();
                var captcha = $('#captcha').val();
                var key=$('#key').val();
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
                if (key == '') {
                    alert("Please Enter key");
                    $('#key').focus();
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
</body>

</html>