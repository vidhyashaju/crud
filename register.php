<?php
include 'connection.php';
if(isset($_POST['submit']))
{
  $name=$_POST['name'];
  $email=$_POST['email'];
  $pwd=$_POST['pwd'];

  mysqli_query($con,"INSERT INTO `register1`(`name`, `email`) VALUES ('$name','$email')");
  $id=mysqli_insert_id($con);
  mysqli_query($con,"INSERT INTO `login1`(`email`, `pwd`, `id`) VALUES ('$email','$pwd','$id')");
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