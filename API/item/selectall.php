<?php
$con=mysqli_connect("localhost","root","","sample");
$data=mysqli_query($con,"SELECT * FROM `item`");
$list=array();
if(mysqli_num_rows($data)>0)
{
    while($row=mysqli_fetch_assoc($data))

    {
            $myarray['itemname']=$row['item_name'];
            $myarray['categoryid']=$row['category_id'];
            array_push($list,$myarray);
    }
}
else{
    $myarray['message']="failed";
  
    array_push($list,$myarray);
}
echo json_encode($list);

?>