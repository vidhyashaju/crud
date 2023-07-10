<?php
include 'connection.php';
$email=$_GET['email'];
$data=mysqli_query($con,"SELECT * FROM `details` WHERE email='$email'");
$row=mysqli_fetch_assoc($data);
$gender=$row['gender'];
//var_dump($gender);
//exit();

$data1=mysqli_query($con,"SELECT * FROM `login` WHERE name='$email'");
$row1=mysqli_fetch_assoc($data1);
if(isset($_POST['submit']))
{
  $radio1=$_POST['gender'];
  if($radio1=="male"){
    $val="male";
  }
  elseif($radio1=="female")
  {
    $val="female";
  }
  $name=$_POST['name'];
  $age=$_POST['age'];
  //$gender1=$_POST['gender'];;
  $dob=$_POST['dob'];
  $email=$_POST['email'];
  $pwd=$_POST['pwd'];

  mysqli_query($con,"UPDATE `details` SET `name`='$name',`age`='$age',`gender`='$val',`dob`='$dob',`email`='$email' WHERE email='$email'");
  mysqli_query($con,"UPDATE `login` SET `name`='$email',`pwd`='$pwd',`type`='admin' WHERE name='$email'");
  header('location:tbview.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
  
  <form action="" method="POST">
    <center>
        <table style="margin: 20px">
            
              <tr>
                <td><label for="">Name </label></td>
                <td><input type="text" name="name" value="<?php echo $row['name']?>"></td>
                
              </tr> 
              <tr>
               <td><label for="">Age </label></td> 
                <td><input type="number" name="age" value="<?php echo $row['age']?>"></td>
              </tr>
              
              <tr>
                <td><label for="">Gender </label></td>
                <td><input type="radio" name="gender" value="male" <?php if($gender=='male') echo 'checked="checked"'?>>Male
                 <input type="radio" name="gender" value="female" <?php if($gender=='female') echo 'checked="checked"'?>>Female</td>
                
              </tr>
          
              
                <tr>
                  <td><label for="">DOB :</label></td>
                  <td><input type="date" name="dob" value="<?php echo $row['dob']?>"></td>
                </tr>
                
                <tr>
                  <td><label for="">Email </label></td>
                  <td><input type="email" name="email" value="<?php echo $row['email']?>"></td>
                </tr>
                
                <tr>
                  <td><label for="">Password</label></td>
                  <td><input type="password" name="pwd" value="<?php echo $row1['pwd']?>"></td>
                </tr>
                
                <tr>
                <td><button name="submit">Update</button></td>
              </tr>
              
            
        </table>
    </center>
  </form>
    
</body>
</html>