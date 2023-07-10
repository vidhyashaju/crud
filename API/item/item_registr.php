<?php
$con=mysqli_connect("localhost","root","","sample");
$name=$_POST['item_name'];
$id=$_POST['category_id'];
$data=mysqli_query($con,"INSERT INTO `item`(`category_id`,`item_name`) VALUES ('$id','$name')");
if($data){
    $myarray['message']="success";
}
else{
    $myarray['message']="failed";
}
echo json_encode($myarray);
?>