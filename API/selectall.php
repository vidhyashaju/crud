<?php
$con=mysqli_connect("localhost","root","","sample");
$data=mysqli_query($con,"SELECT * FROM `category`");
$list=array();
if(mysqli_num_rows($data)>0)
{
    while($row=mysqli_fetch_assoc(($data)))
    {
        $myarray['name']=$row['category_name'];
        array_push($list,$myarray);
    }
}
else
{
    $myarray['message']="failed";
    array_push($list,$myarray);
}
echo json_encode($list);
?>
