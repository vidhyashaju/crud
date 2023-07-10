<?php
$con=mysqli_connect("localhost","root","","sample");
$id=$_POST['category_id'];
$data=mysqli_query($con,"SELECT * FROM `category` WHERE category_id='$id'");
$row=mysqli_fetch_assoc($data);
if(mysqli_num_rows($data)>0)
{
    $myarray['name']=$row['category_name'];
}
echo json_encode($myarray);
?>