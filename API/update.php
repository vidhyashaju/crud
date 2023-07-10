<?php
$con=mysqli_connect("localhost","root","","sample");
$id=$_POST['category_id'];
$name=$_POST['category_name'];
$data=mysqli_query($con,"UPDATE `category` SET `category_name`='$name' WHERE category_id='$id'");
if($data){
    $myarray['message']="updated";
}
else{
    $myarray['message']="failed";
}
echo json_encode($myarray);
?>