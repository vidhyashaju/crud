<?php
$con=mysqli_connect("localhost","root","","sample");
$productname=$_POST['product_name'];
$categoryid=$_POST['category_id'];
$itemid=$_POST['item_id'];
$pic=$_FILES['f1']['name'];
    if($pic!="")
    {
        $filearray=pathinfo($_FILES['f1']['name']);
        $file1=rand();
        $file_ext=$filearray["extension"];

        $filenew=$file1 .".".$file_ext;


        move_uploaded_file($_FILES['f1']['tmp_name'],"../images/".$filenew);

    }
   
$data=mysqli_query($con,"INSERT INTO `product`(`category_id`, `item_id`, `product_name`, `product_image`) VALUES ('$categoryid','$itemid','$productname','$filenew')");
if($data){
    $myarray['message']="success";
}
else
{
    $myarray['message']="failed";
}
echo json_encode($myarray);
?>