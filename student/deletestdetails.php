<?php
include 'connection.php';
$studid=$_GET['stu_id'];
mysqli_query($con,"DELETE FROM `student_reg` WHERE stu_id='$studid'");
echo "<script>alert('delete successfully')</script>";
header("location:sdvw.php");
?>