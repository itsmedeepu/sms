<?php
include '../assets/db/db.php';
$id=$_GET['id'];
$qy="select * from students where ID='$id'";
$r=mysqli_query($con,$qy);
$num=mysqli_fetch_assoc($r);
// echo $num['NAME'];

?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <!--<![endif]-->
<html>
    <head>
    <title>:: STUDENT MANAGEMENT SYSTEM ::</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.css">

    <script src="../assets/js.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.js"></script> -->

    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<style>
    @media print {
  .btn{
    display: none;
  }
  .print{
    display: none;
  }
  /* .container{
      display: none;
  } */
  #progressBar{
      display: none;
  }
}
.row{
    overflow: hidden;
}
body{
    font-size: 14px;
}

</style>    
</head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <div class="container shadow mt-3">
            <div class="row">
                <h4 class="text-center">STUDENT DETAILS</h4><span><p>This page closes in 30 secs</p><progress value="0" max="20" id="progressBar"></progress></span>
                <div class="table-responsive col-lg-8 m-auto">
        <table class="table table-bordered table-hover">
            <tr><td>PHOTO</td><td><img class="rounded-circle" width="50px" height="50px" src="../<?php echo $num['USERAVTAR'];?>"></td></tr>
            <tr><td>STUDENT NAME</td><td><p class="fw-bold"><?php echo $num['NAME']?></p></td></tr>
            <tr><td>STUDENT ID</td><td><p class="fw-bold"><?php echo $num['STUDENTID']?></p></td></tr>
            <tr><td>BRANCH</td><td><p class="fw-bold"><?php echo $num['BRANCH']?></p></td></tr>
            <tr><td>BLOOD GROUP</td><td><p class="fw-bold"><?php echo $num['BGROUP']?></p></td></tr>
            <tr><td>GENDER</td><td><p class="fw-bold"><?php echo $num['GENDER']?></p></td></tr>
            <tr><td>FATHER NAME</td><td><p class="fw-bold"><?php echo $num['FATHER']?></p></td></tr>
            <tr><td>MOTHER NAME</td><td><p class="fw-bold"><?php echo $num['MOTHER']?></p></td></tr>
            <tr><td>D.O.B(YY-MM-DD)</td><td><p class="fw-bold"><?php echo $num['DOB']?></p></td></tr>
            <tr><td>EMAIL</td><td><p class="fw-bold"><?php echo $num['EMAIL']?></p></td></tr>
            <tr><td>PHONE</td><td><p class="fw-bold"><?php echo $num['PHONE']?></p></td></tr>
            <tr><td>STATE</td><td><p class="fw-bold"><?php echo $num['STATE']?></p></td></tr>
            <tr><td>DISTRICT</td><td><p class="fw-bold"><?php echo $num['DISTRICT']?></p></td></tr>
            <tr><td>ADDRESS</td><td><p class="fw-bold"><?php echo $num['ADDRESS']?></p></td></tr>
            <tr><td>SSC</td><td><p class="fw-bold"><?php echo $num['SSCREG']?></p></td></tr>
            <tr><td>12<sup>th</sup> PASS YEAR</td><td><p class="fw-bold"><?php echo $num['PASSYEAR']?></p></td></tr>
            <tr><td>HOSTEL</td><td><p class="fw-bold"><?php echo $num['HOSTEL']?></p></td></tr>
            <tr><td>REG/DATE</td><td><p class="fw-bold"><?php echo $num['TIME']?></p></td></tr>
            <tr><td colspan="2" class="text-center print"><button onclick = "window.print()" class="btn btn-success">PRINT</button></td></tr>
        </table>
    </div>


            </div>
        </div>

<script>
    setTimeout("self.close()", 30000 )
    var timeleft = 30;
var downloadTimer = setInterval(function(){
  if(timeleft <= 0){
    clearInterval(downloadTimer);
  }
  document.getElementById("progressBar").value = 30 - timeleft;
  timeleft -= 1;
}, 3000);
</script>

        
    </body>
</html>
<td></td>