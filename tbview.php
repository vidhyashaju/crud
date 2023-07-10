<?php
include 'connection.php';
$data=mysqli_query($con,"SELECT details.name as dname,details.age,details.gender,details.email,details.dob,login.pwd,login.type FROM `details` INNER JOIN login ON details.email=login.name");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        th,td,table{
            border:1px solid black;
            border-collapse:collapse;
        }
    </style>
</head>
<body>
    <form action="" method="POST">
        <center>
            <table>
                <tr>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Gender</th>
                    <th>DOB</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>User Type</th>
                    <th>Action</th>
                </tr>
                <?php
                        while($row=mysqli_fetch_assoc($data))
                        {

                        
                ?>
                <tr>
                    <td><?php echo $row['dname'];?></td>
                    <td><?php echo $row['age'];?></td>
                    <td><?php echo $row['gender'];?></td>
                    <td><?php echo $row['dob'];?></td>
                    <td><?php echo $row['email'];?></td>
                    <td><?php echo $row['pwd'];?></td>
                    <td><?php echo $row['type'];?></td>
                    <td><a href="delete.php?email=<?php echo $row['email']?>">Delete</a></td>
                    <td><a href="edit.php?email=<?php echo $row['email']?>">Edit</a></td>
                </tr>
                <?php
                        }
                        ?>

            </table>
        </center>
    </form>
</body>
</html>