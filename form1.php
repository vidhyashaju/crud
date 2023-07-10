<?php
include 'connection.php';
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

  mysqli_query($con,"INSERT INTO `details`(`name`, `age`, `gender`, `dob`, `email`) VALUES ('$name','$age','$val','$dob','$email')");
  mysqli_query($con,"INSERT INTO `login`( `name`, `pwd`, `type`) VALUES ('$email','$pwd','admin')");
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
                <td><input type="text" name="name"></td>
                
              </tr> 
              <tr>
               <td><label for="">Age </label></td> 
                <td><input type="number" name="age"></td>
              </tr>
              
              <tr>
                <td><label for="">Gender </label></td>
                <td><input type="radio" name="gender" value="male">Male <input type="radio" name="gender" value="female">Female</td>
                
              </tr>
          
              
                <tr>
                  <td><label for="">DOB :</label></td>
                  <td><input type="date" name="dob"></td>
                </tr>
                
                <tr>
                  <td><label for="">Email </label></td>
                  <td><input type="email" name="email"></td>
                </tr>
                
                <tr>
                  <td><label for="">Password</label></td>
                  <td><input type="password" name="pwd"></td>
                </tr>
                
                <tr>
                <td><button name="submit">Submit</button></td>
              </tr>
              <tr>
                </tr>
            
        </table>
    </center>
  </form>
    
</body>
</html>