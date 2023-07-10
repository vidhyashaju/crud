<?php
$con=mysqli_connect("localhost","root","","sample");
$username=$_POST['name'];
$password=$_POST['pwd'];
$data=mysqli_query($con,"SELECT `name`, `pwd` FROM `login` WHERE name='$username'AND pwd='$password'");
if(mysqli_num_rows($data)>0)
{
$data1=mysqli_query($con,"SELECT `id` FROM `details` WHERE email='$username'");
$row=mysqli_fetch_assoc($data1);
    $mayarray['id']=$row['id'];
}
else{
    $mayarray['message']="failed";
}
echo json_encode($mayarray);
?>