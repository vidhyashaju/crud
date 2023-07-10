<?php
$con=mysqli_connect("localhost","root","","sample");
$list=array();

$data=mysqli_query($con,"SELECT `item_name` FROM `item` JOIN category ON item.category_id=category.category_id");

if(mysqli_num_rows($data)>0){
    while($row=mysqli_fetch_assoc($data))
    {
    $myarray['name']=$row['item_name'];
    array_push($list,$myarray);
    }
 }
echo json_encode($list);
?>