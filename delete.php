<?php
include 'connection.php';
//$id=$_GET['id'];
//var_dump($id);
//exit();
$email=$_GET['email'];


mysqli_query($con,"DELETE FROM `login` WHERE name='$email'");
mysqli_query($con,"DELETE FROM `details` WHERE email='$email'");

echo "<script>alert('delete successfully')</script>";
header("location:tbview.php");
?>