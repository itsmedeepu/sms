<?php

include "../assets/db/db.php";
session_start();
// include '../function.php';
if (empty($_SESSION['key']) || $_SESSION['key'] == '') {
    header('location:index.php');
    die();
} else {

    $query = "select * from students";
    $result = mysqli_query($con, $query);
//$num = mysqli_fetch_assoc($result);
 //$qy = mysqli_fetch_array($result);
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>::STUDENT MANAGEMENT SYSTEM::2021</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--  <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.css"> -->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/bootstrap/css/style.css?ver=2">

    <!--data tables css-->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap.min.css">


    
</head>

<style>

.ro1{
    background-color:#f5f5f5;
}

.tb2{

    font-weight:bold;
    
    
    

}

.center-block {
  display: block;
  margin-right: auto;
  margin-left: auto;
}
@media print {
    body * {
        visibility: hidden;
    }
    .modal-content * {
        visibility: visible;
        overflow: visible;
    }
    .main-page * {
        display: none;
    }
    .modal {
        position: absolute;
        left: 0;
        top: 0;
        margin: 0;
        padding: 0;
        min-height: 550px;
        visibility: visible;
        overflow: visible !important; /* Remove scrollbar for printing. */
    }
    .modal-dialog {
        visibility: visible !important;
        overflow: visible !important; /* Remove scrollbar for printing. */
    }
    .btn{
        display: none;

    }
}

</style>



<body>
    <div class="container" style="box-shadow: 0px 0px 10px 0px;">
      <div id='loader' style='display: none;'>
          <img src='../assets/images/ajax-loader.gif' width='32px' height='32px'>
      </div>
      <div class="row mt-3">

        <!-- panel start -->
        <div class="col-md-12">
            <div class="panel panel-primary shadow" style="box-shadow:0px 0px 20px #dff0d8;">
                <div class="panel-heading">
                    <h2 class="panel-title" style="font-size:20px; text-align:center;"><b>STUDENT MANAGEMENT SYSTEM(SMS)</b></h2>
                </div>
                <marquee scrollamount=8  onmouseover="this.stop();" onmouseout="this.start();" id='marq1'>WEBSITE IS UNDER MAINTAINENCE PLEASE IGONRE IF UR DATA ARE DEATILS INCORRECT </marquee>
                <div class="panel-body">

                    <span class="N1">WELCOME:ADMIN</span> <span class="N2"><?php echo $_SESSION['name']; ?></span>
                    <span><button class="btn-sm btn-danger" id="logout" style="float: right;"><span class="glyphicon glyphicon-off"></span>  Logout</button></span>


                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-success shadow"  id="pan1">
                                <div class=" panel-heading">
                                    <h3 class="panel-title"><b>Registred Students Details</b></h3>
                                </div>
                                <div class="panel-body">
                                    <div  class="table-responsive ">
                                      <table id="example" class="table table-responsive table-hover table-striped table-bordered"  style="width=100%"; >
                                        <thead>
                                            <tr>

                                                <th>NAME</th>
                                                <th>STUDENT ID</th>
                                                <th>EMAIL</th>
                                                <th>BRANCH</th>
                                                <th>VIEW</th>
                                                <th>EDIT</th>
                                                <th>DELETE</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php

                                            while($res=mysqli_fetch_array($result)){

                                                ?>

                                                <tr>

                                                    <td><?php echo $res['NAME']; ?></td>
                                                    <td><?php echo $res['STUDENTID']; ?></td>
                                                    <td><?php echo $res['EMAIL']; ?></td>
                                                    <td><?php echo $res['BRANCH']; ?></td>
                                                    <td><a href="#view" data-toggle="modal" data-target="#view" data-id="<?php echo $res['ID']; ?>" class="btn btn-warning"><span class="glyphicon glyphicon-eye-open"></span>&nbsp;View</a></td>
                                                    <td><a href="#edit" data-toggle="modal" data-target="#edit" data-id="<?php echo $res['ID']; ?>" class="btn btn-success"><span class="glyphicon glyphicon-edit"></span>&nbsp;EDIT</a></td>
                                                    <td><a href="#delete"data-toggle="modal" data-target="#delete" data-id="<?php echo $res['ID']; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span>&nbsp;DELETE</a></td>
                                                </tr>

                                                <?php

                                            }

                                            ?>
                                        </table>

                                    </table>
                                </div>
                            </div>
                        </div>



                    </div>
                </div>






            </div>
        </div>

    </div>
</div>
<!---bootstrap view modal-->

<div id="view" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h3 class="modal-title">STUDENT DETAILS</h3>
    </div>
    <div class="modal-body">

      <div  class="table-responsive ">
        <table class="table table-bordered table-hover">
            <tr><td class="ro1" >PHOTO</td><td><p id="img"></p></td></tr>
            <tr><td class="ro1">NAME</td><td class="tb2"><p id="name"></p></td></tr>
            <tr><td class="ro1">STUDENT ID</td><td class="tb2"><p id="studentid"></p></td></tr>
            <tr><td class="ro1">BRANCH</td><td class="tb2"><p id="branch"></p></td></tr>
            <tr><td class="ro1">BLOOD GROUP</td ><td class="tb2"><p id="bgroup"></p></td></tr>
            <tr><td class="ro1">GENDER</td ><td class="tb2"><p id="gender"></p></td></tr>
            <tr><td class="ro1">FATHER NAME</td><td class="tb2"><p id="fname"></p></td></tr>
            <tr><td class="ro1">MOTHER NAME</td><td class="tb2"><p id="mname"></p></td></tr>
            <tr><td class="ro1">D.O.B(YY-MM-DD)</td><td class="tb2"><p id="dob"></p></td></tr>
            <tr><td class="ro1">EMAIL</td><td class="tb2"><p id="email"></p></td></tr>
            <tr><td class="ro1">PHONE</td><td class="tb2"><p id="phone"></p></td></tr>
            <tr><td class="ro1">STATE</td><td class="tb2"><p id="state"></p></td></tr>
            <tr><td class="ro1">DISTRICT</td><td class="tb2"><p id="district"></p></td></tr>
            <tr><td class="ro1">ADDRESS</td><td class="tb2"><p id="address"></p></td></tr>
            <tr><td class="ro1">SSC</td><td class="tb2"><p id="ssc"></p></td></tr>
            <tr><td class="ro1">12TH PASS YEAR</td><td class="tb2"><p id="pass"></p></td></tr>
            <tr><td class="ro1">HOSTEL</td><td class="tb2"><p id="hostel"></p></td></tr>
            <tr><td class="ro1">REG/DATE</td><td class="tb2"><p id="time"></p></td></tr>


        </table>
    </div>
</div>
<div class="modal-footer">
    <button type="button" onclick = "window.print()" class="btn btn-success" data-dismiss="modal"><span class="glyphicon glyphicon-print">&nbsp;PRINT</span></button>
    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
</div>
</div>

</div>
</div>
<!--edit modal-->
<div id="edit" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h3 class="modal-title">EDIT STUDENT DETAILS</h3>
    </div>
    <div class="modal-body">
        <form class="row" id="editform"> 
            <div class="col-lg-8">
                <div class="form-group">
                    <input type="hidden" id="eid" class="form-control" name="eid">
                    <label>Name</label>
                    <input type="text" name="ename"  class="form-control" id="ename" required>
                </div>
                <div class="form-group">
                    <label>Dob</label>
                    <input type="date" name="edob"  class="form-control" id="edob" required>
                </div>

                <div class="form-group ">
                    <label for="gender">Select Gender</label>
                    <select class="form-control" name="egender" id="egender" required>
                        <option value="">**SELECT**</option>
                        <option value="MALE">MALE</option>
                        <option value="FEMALE">FEMALE</option>
                        <option value="OTHERS">OTHERS</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="eemail"   class="form-control" id="eemail" required>
                </div>
                <div class="form-group">
                    <label>Mother</label>
                    <input type="text" name="emname"   class="form-control" id="emname" required>
                </div>
                <div class="form-group ">
                    <label for="degree">Select Branch*</label>
                    <select class="form-control" name="ebranch" id="ebranch" required>
                        <option value="">**SELECT**</option>
                        <option value="COMPUTERS">B.E/COMPUTER SCEINCE ENGINEERING</option>
                        <option value="CIVIL">B.E/CVIL ENGINEERING</option>
                        <option value="ELECTRONICS">B.E/ELECTRONICS & COMUNICATION ENGINEERING </option>
                        <option value="ELECTRICAL">B.E/ELECTRICAL ENGINEERING</option>
                        <option value="MECHANICAL">B.E/MECHNICAL ENGINEERING</option>
                    </select>
                </div>

            </div>

        </form>


    </div>
    <div class="modal-footer">
        <button type="submit" id="submit" class="btn btn-success"><span class="glyphicon glyphicon-book">&nbsp;SAVE</span></button>
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
    </div>
</div>

</div>
</div>
<!--delete modal-->
<div id="delete" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h3 class="modal-title">STUDENT DETAILS</h3>
    </div>
    <div class="modal-body">

      <div  class="table-responsive ">
        <table class="table table-bordered table-hover">
            <form class="dform">
                <input type="hidden" name="did" id="did">
            </form>
            
            <tr><td class="ro1" >PHOTO</td><td><p id="dimg"></p></td></tr>
            <tr><td class="ro1">NAME</td><td class="tb2"><p id="dname"></p></td></tr>
            <tr><td class="ro1">STUDENT ID</td><td class="tb2"><p id="dstudentid"></p></td></tr>
            <tr><td class="ro1">BRANCH</td><td class="tb2"><p id="dbranch"></p></td></tr>
            <tr><td class="ro1">BLOOD GROUP</td ><td class="tb2"><p id="dbgroup"></p></td></tr>
            <tr><td class="ro1">GENDER</td ><td class="tb2"><p id="dgender"></p></td></tr>
            <tr><td class="ro1">FATHER NAME</td><td class="tb2"><p id="dfname"></p></td></tr>
            <tr><td class="ro1">MOTHER NAME</td><td class="tb2"><p id="dmname"></p></td></tr>
            <tr><td class="ro1">D.O.B(YY-MM-DD)</td><td class="tb2"><p id="ddob"></p></td></tr>
            <tr><td class="ro1">EMAIL</td><td class="tb2"><p id="demail"></p></td></tr>
            <tr><td class="ro1">PHONE</td><td class="tb2"><p id="dphone"></p></td></tr>
            <tr><td class="ro1">STATE</td><td class="tb2"><p id="dstate"></p></td></tr>
            <tr><td class="ro1">DISTRICT</td><td class="tb2"><p id="ddistrict"></p></td></tr>
            <tr><td class="ro1">ADDRESS</td><td class="tb2"><p id="daddress"></p></td></tr>
            <tr><td class="ro1">SSC</td><td class="tb2"><p id="dssc"></p></td></tr>
            <tr><td class="ro1">12TH PASS YEAR</td><td class="tb2"><p id="dpass"></p></td></tr>
            <tr><td class="ro1">HOSTEL</td><td class="tb2"><p id="dhostel"></p></td></tr>
            <tr><td class="ro1">REG/DATE</td><td class="tb2"><p id="dtime"></p></td></tr>


        </table>
    </div>
</div>
<div class="modal-footer">
    <button type="button"  class="btn btn-success" id="delete1"><span class="glyphicon glyphicon-trash">&nbsp;Delete</span></button>
    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
</div>
</div>

</div>
</div>







<div class="row">
    <div class="col-md-12" style="background:#2a2730; margin:0px; padding:10px;box-shadow:0px 0px 10px 0px #888888;">
        <div class="row">
            <div class="col-md-12" style="text-align:center;color:white;padding-left:20px;"> © 2021 Designed and Maintained by <a href="https://deepak1.xyz/" target="_blank" style="color: #fcb316;"> Deepak S ver-0.0.1</a></div>
        </div>
    </div>
</div>
</div>
</div>

<!--main js files--->
<script src="../assets/js.js"></script>
<script src="../assets/bootstrap/js/bootstrap.js"></script>
<!-- data table js-->

<script type="text/javascript" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap.min.js"></script>


<script type="text/javascript">
    $(document).ready(function() {

        $('#logout').click(function() {
            var deepak= confirm('Are you sure wanna logout');

            if(deepak == true)
            {
             window.location.href = "logout.php";

         }
         else{
            return false;

        }


    });



    });
</script>


<script type="text/javascript">

 $(document).ready(function() {
    $('#view').on('show.bs.modal', function (e) {
        var ID= $(e.relatedTarget).data('id');
        $.ajax({
            url:"view.php",
            method: "POST",
            data:{id:ID},
            dataType:"JSON",
            success:function(data)
            {   

                $('#studentid').text(data.studentid);
                $('#name').text(data.name);
                $('#dob').text(data.dob);
                $('#gender').text(data.gender);
                // $('#proDesc').text(data.description);
                $('#bgroup').html(data.bgroup); 
                $('#email').html(data.email)
                $('#phone').html(data.phone);
                $('#state').html(data.state);
                $('#district').html(data.district);
                $('#address').html(data.address);
                $('#fname').html(data.fname);
                $('#mname').html(data.mname);
                $('#ssc').html(data.ssc);
                $('#pass').html(data.pass);
                $('#branch').html(data.branch);
                $('#hostel').html(data.hostel);
                $('#time').html(data.time);
                $('#img').html(data.img);
            }
        })
        console.log(ID);
    });
});

</script>

<script type="text/javascript">

    $(document).ready(function() {
        $('#example').DataTable();
    } );


</script>
<script type="text/javascript">

 $(document).ready(function() {
    $('#edit').on('show.bs.modal', function (e) {
        var ID= $(e.relatedTarget).data('id');
        $.ajax({
            url:"view.php",
            method: "POST",
            data:{id:ID},
            dataType:"JSON",
            success:function(data)
            {   

                //$('#studentid').text(data.studentid);
                $('#eid').val(data.id);
                $('#ename').val(data.name);
                $('#edob').val(data.dob);
                $('#egender').val(data.gender);
                // $('#proDesc').text(data.description);
              //  $('#bgroup').html(data.bgroup); 
              $('#eemail').val(data.email);
              $('#ephone').html(data.phone);
               // $('#state').html(data.state);
               // $('#district').html(data.district);
               // $('#address').html(data.address);
               $('#efname').val(data.fname);
               $('#emname').val(data.mname);
                //$('#ssc').html(data.ssc);
               // $('#pass').html(data.pass);
               $('#ebranch').val(data.branch);
               // $('#hostel').html(data.hostel);
               // $('#time').html(data.time);
               // $('#img').html(data.img);
           }
       })
    });
});

</script>

<script type="text/javascript">
   // var table=('#example').Datatable();
   $(document).ready(function() {
    $('#submit').on('click',function(){


        var form=$('#editform').serialize();

        

        $.ajax({
            url:"edit.php",
            method: "POST",
            data:form,
            success:function(data)
            {

                alert(data);
                location.reload();
                //table.draw();

                   // $("#example").ajax.reload();
                   //dtable.draw();
                   // $('#example').DataTable().ajax.reload();

               },

           });

    });
});
</script>
<script type="text/javascript">

 $(document).ready(function() {
    $('#delete').on('show.bs.modal', function (e) {
        var ID= $(e.relatedTarget).data('id');
        $.ajax({
            url:"view.php",
            method: "POST",
            data:{id:ID},
            dataType:"JSON",
            success:function(data)
            {   
                $('#did').val(data.id);
                $('#dstudentid').text(data.studentid);
                $('#dname').text(data.name);
                $('#ddob').text(data.dob);
                $('#dgender').text(data.gender);
                // $('#proDesc').text(data.description);
                $('#dbgroup').html(data.bgroup); 
                $('#demail').html(data.email)
                $('#dphone').html(data.phone);
                $('#dstate').html(data.state);
                $('#ddistrict').html(data.district);
                $('#daddress').html(data.address);
                $('#dfname').html(data.fname);
                $('#dmname').html(data.mname);
                $('#dssc').html(data.ssc);
                $('#dpass').html(data.pass);
                $('#dbranch').html(data.branch);
                $('#dhostel').html(data.hostel);
                $('#dtime').html(data.time);
                $('#dimg').html(data.img);
            }
        })
        //console.log(ID);
    });
});




</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#delete1').on('click',function(){
            var form=$('.dform').serialize();
            console.log(form);
            var deepak=confirm('Delete this Record??');
            if(deepak==true)
            {
                $.ajax({
                    url:"d.php",
                    method: "POST",
                    data:form,
                    success:function(data)
                    {

                        alert(data);
                        location.reload();
                //table.draw();

                   // $("#example").ajax.reload();
                   //dtable.draw();
                   // $('#example').DataTable().ajax.reload();

               },
           });

            }
            else{

                return false;

            }






        });
    });
</script>
</body>

</html>