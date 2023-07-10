<?php
include 'connection.php';
$studeId=$_GET['stu_id'];
$data=mysqli_query($con,"SELECT * FROM `student_reg` WHERE stu_id='$studeId'");
$row=mysqli_fetch_assoc($data);
$gender=$row['gender'];
$hobby=$row['hobby'];
$add=$row['address'];
$hobbies=explode(",",$hobby);
if(isset($_POST['submit']))
{
  $fname=$_POST['fname'];
  $lname=$_POST['lname'];
  $age=$_POST['age'];
  $email=$_POST['email'];
  $pwd=$_POST['pwd'];
  $dob=$_POST['dob'];
  $address=$_POST['address'];
  $phone=$_POST['phone'];
  $state=$_POST['state'];
  $radio1=$_POST['gender'];
  if($radio1=="male")
  {
    $val="male";
  }
  elseif($radio1=="female")
  {
    $val="female";
  }
  $hobby=$_POST['hobby'];
  $hobbies=implode(",",$hobby);
  $pic=$_FILES['f1']['name'];
  if($pic!="")
  {
      $filearray=pathinfo($_FILES['f1']['name']);
      $file1=rand();
      $file_ext=$filearray["extension"];

      $filenew=$file1 .".".$file_ext;


      move_uploaded_file($_FILES['f1']['tmp_name'],"images/".$filenew);
  }
  
mysqli_query($con,"UPDATE `student_reg` SET ``fname`='$fname',`lname`='$lname',`age`='$age',`gender`='$val',`dob`='$dob',`email`='$email',`pwd`='$pwd',`address`='$address'
,`state`='$state',`phone`='$phone',`hobby`='$hobby',`file`='$filenew' WHERE stu_id='$studeId'");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table{
            
             border: 5px solid red;
            border-collapse:collapse;
            text-align:center;
            padding:100%;
            margin: 2%;
            border-spacing:30px;   
                 
        }

        td{
            text-align:left;
            padding:10px;
                   
        }
        h1{
            color:red;
            text-align:center;
        
        }
        tr{
            margin: 10px;
        }
        button{
        
            width: 75px;
            border-radius:5px;
            font: 1em sans-serif;
            
        }
    </style>
</head>
<body>
    <form action="" method="POST" enctype="multipart/form-data">
        <center>
            <caption><h1></h1></caption>
            <table>
                <h1>STUDENT REGISTRATION FORM</h1>
                <tr>
                    <td><label for=""></label>First Name</td>
                    <td><input type="text" name="fname" value="<?php echo $row['fname'];?>"></td>
                </tr>
                <tr>
                    <td><label for="">Last Name</label></td>
                    <td><input type="text" name="lname" value="<?php echo $row['lname'];?>"></td>
                </tr>
                <tr>
                    <td><label for="">Gender</label></td>
                    <td><input type="radio" name="gender" value="male" <?php if($gender=='male') echo 'checked="checked"'?>>Male 
                    <input type="radio" name="gender" value="female" <?php if($gender=='female') echo 'checked="checked"'?>>Female</td>
                </tr>
                <tr>
                    <td><label for="Age">Age</label></td>
                    <td><input type="number" name="age" value="<?php echo $row['age'];?>"></td>
                </tr>
                <tr>
                    <td><label for=""></label>DOB</td>
                    <td><input type="date" name="dob" value="<?php echo $row['dob'];?>"></td>
                </tr>
                <tr>
                    <td><label for="">Email Address</label></td>
                    <td><input type="email" name="email" value="<?php echo $row['email'];?>"></td>
                </tr>
                <tr>
                    <td><label for="">Password</label></td>
                    <td><input type="password" name="pwd" value="<?php echo $row['pwd'];?>"></td>
                </tr>
                <tr>
                    <td><label for="">Address</label></td>
                    <td><textarea name="address" id="" cols="20" rows="3"> <?php echo htmlspecialchars($add);?></textarea></td>
                </tr>
                <tr>
                    <td><label for="">State</label></td>
                    <td>
                        <select name="state" id="">
                            <option value="kerala" <?php if($row['state']=='kerala') echo 'selected="selected"';?>>Kerala</option>
                            <option value="tamilnadu" <?php if($row['state']=='tamilnadu') echo 'selected="selected"';?>>Tamilnadu</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label for="">Phone</label></td>
                    <td><input type="text" name="phone" value="<?php echo $row['phone'];?>"></td>
                </tr>
                <tr>
                    <td><label for="">Hobbies</label></td>
                    <td><input type="checkbox" name="hobby" value="music" <?php if(in_array("music",$hobbies)){echo "checked";}?>>Music 
                        <input type="checkbox" name="hobby" value="movies" <?php if(in_array("movies",$hobbies)){echo "checked";}?>>Movies
                        <input type="checkbox" name="hobby" value="travel" <?php if(in_array("travel",$hobbies)){echo "checked";}?>>Travel
                        <input type="checkbox" name="hobby" value="movies" <?php if(in_array("sports",$hobbies)){echo "checked";}?>>Sports
                    </td>
                </tr>
                <tr>
                    <td><label for="">Photo</label></td>
                    <td><input type="file" name="f1" value="<?php echo $row['file'];?>"></td>
                </tr>
                <tr>
                    <td><button name="submit">UPDATE</button></td>
                    
                </tr>

            </table>
        </center>
    </form>
    
</body>
</html>