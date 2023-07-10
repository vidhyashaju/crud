<?php
include 'connection.php';
$data=mysqli_query($con,"SELECT  `stu_id` ,`fname`, `lname`, `age`, `gender`, `dob`, `email`, `address`, `state`, `phone`, `hobby`, `file` FROM `student_reg`");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table,td,th{
            border: 1px solid red;
        }
    </style>
</head>
<body>
    <form action="" method="POST" enctype="multipart/form-data">
        
    <center>
        <table>
            <tr>
                <th>Student Id</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Age</th>
                <th>Gender</th>
                <th>DOB</th>
                <th>Email</th>
                <th>Address</th>
                <th>State</th>
                <th>Phone</th>
                <th>Hobbies</th>
                <th>Photo</th>
                <th colspan=2>Actions</th>
                

            </tr>
    
                <?php
                  while($row=mysqli_fetch_assoc($data))
                  {
                    ?>

                  <tr>
                    <td><?php echo $row['stu_id'];?></td>
                    <td><?php echo $row['fname'];?></td>
                    <td><?php echo $row['lname'];?></td>
                    <td><?php echo $row['age'];?></td>
                    <td><?php echo $row['gender'];?></td>
                    <td><?php echo $row['dob'];?></td>
                    <td><?php echo $row['email'];?></td>
                    <td><?php echo $row['address'];?></td>
                    <td><?php echo $row['state'];?></td>
                    <td><?php echo $row['phone'];?></td>
                    <td><?php echo $row['hobby'];?></td>
                    <td><?php echo $row['file'];?></td>   
                    <td><img src="images/<?php echo $row['file'];?>" alt="photo" height="100" width="200"></td>                
                    <td><a href="editstdetail.php?stu_id=<?php echo $row['stu_id'];?>">Edit</a></td>
                    <td><a href="deletestdetails.php?stu_id=<?php echo $row['stu_id'];?>">Delate</a></td>
                    

                  </tr>
                  <?php
                  }
                  ?>
            
        </table>
    </center>
    </form>
</body>
</html>