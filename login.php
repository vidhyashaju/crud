<?php
include 'connection.php';
session_start();
if(isset($_POST['submit']))
{
    $uname=$_POST['name'];
    $pwd=$_POST['pwd'];
    $data=mysqli_query($con,"SELECT * FROM `login` WHERE name='$uname' AND pwd='$pwd'");
    if(mysqli_num_rows($data)>0)
    {
        $ses=mysqli_fetch_assoc($data);
        $_SESSION['name']=$ses['name'];
        header('location:home.php');
     }        
    else{
        echo "<script>alert('Inavalid username & password')</script>";
    }

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
            <table>
                <tr>
                    <td><label for="">Name</label></td>
                    <td><input type="text" name="name"></td>
                </tr>
                <tr>
                    <td><label for="">pwd</label></td>
                    <td><input type="password" name="pwd"></td>
                </tr>
                <tr>
                    <td><button name="submit">Login</button></td>
                </tr>
            </table>
        </center>
    </form>
</body>
</html>