<?php
require_once '../assets/db/db.php';
session_start();
$lkey=$_SESSION['key'];
$logintime = "UPDATE admin SET LASTLOGGED = now() where SECRET = '$lkey'";
mysqli_query($con, $logintime);
session_destroy();
echo "<script>alert('Logged Out Successfully!!!!!!'),window.location.href='index.php'</script>";


?>