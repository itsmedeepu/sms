<?php
require_once '../assets/db/db.php';
session_start();
session_destroy();
echo "<script>alert('Logged Out Successfully!!!!!!'),window.location.href='index.php'</script>";


?>