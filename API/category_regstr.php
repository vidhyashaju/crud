<?php
$con=mysqli_connect("localhost","root","","sample");
$name=$_POST['category_name'];
$data=mysqli_query($con,"INSERT INTO `category`( `category_name`) VALUES ('$name')");
if($data){
$myarray['message']="success";
}
else
{
$myarray['message']="failed";
}
echo json_encode($myarray);
?>
