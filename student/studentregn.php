<?php
include 'connection.php';
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
  
mysqli_query($con,"INSERT INTO `student_reg`(`fname`, `lname`, `age`, `gender`, `dob`, `email`, `pwd`, `address`, `state`, `phone`, `hobby`, `file`) VALUES ('$fname','$lname','$age','$val','$dob','$email','$pwd','$address','$state','$phone','$hobbies','$filenew')");
}
if(isset($_POST['view']))
  {
        header('location:sdvw.php');
    
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
                <table>
                <h1>STUDENT REGISTRATION FORM</h1>
                <tr>
                    <td><label for=""></label>First Name</td>
                    <td><input type="text" name="fname"></td>
                </tr>
                <tr>
                    <td><label for="">Last Name</label></td>
                    <td><input type="text" name="lname"></td>
                </tr>
                <tr>
                    <td><label for="">Gender</label></td>
                    <td><input type="radio" name="gender" value='male'>Male <input type="radio" name="gender" value='female'>Female</td>
                </tr>
                <tr>
                    <td><label for="Age">Age</label></td>
                    <td><input type="number" name="age"></td>
                </tr>
                <tr>
                    <td><label for=""></label>DOB</td>
                    <td><input type="date" name="dob"></td>
                </tr>
                <tr>
                    <td><label for="">Email Address</label></td>
                    <td><input type="email" name="email"></td>
                </tr>
                <tr>
                    <td><label for="">Password</label></td>
                    <td><input type="password" name="pwd"></td>
                </tr>
                <tr>
                    <td><label for="">Address</label></td>
                    <td><textarea name="address" id="" cols="20" rows="3"></textarea></td>
                </tr>
                <tr>
                    <td><label for="">State</label></td>
                    <td>
                        <select name="state" id="">
                            <option value="kerala">Kerala</option>
                            <option value="tamilnadu">Tamilnadu</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label for="">Phone</label></td>
                    <td><input type="text" name="phone"></td>
                </tr>
                <tr>
                    <td><label for="">Hobbies</label></td>
                    <td><input type="checkbox" name="hobby[]" value="music">Music 
                        <input type="checkbox" name="hobby[]" value="movies">Movies
                        <input type="checkbox" name="hobby[]" value="sports">sports
                        <input type="checkbox" name="hobby[]" value="Travel">Travel
                    </td>
                </tr>
                <tr>
                    <td><label for="">Photo</label></td>
                    <td><input type="file" name="f1"></td>
                </tr>
                <tr>
                    <td><button name="submit">Register</button></td>
                    <td><button name="view">Preview</button></td>
                </tr>

            </table>
        </center>
    </form>
    
</body>
</html>