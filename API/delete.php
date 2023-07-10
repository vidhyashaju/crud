<?php
$con=mysqli_connect("localhost","root","","sample");
$id=$_POST['category_id'];
$data=mysqli_query($con,"DELETE FROM `category` WHERE category_id='$id'");
if($data)
{
    $myarray['message']="deleted";
}
else{
    $myarray['message']="failed";
}
echo json_encode($myarray);
?>
