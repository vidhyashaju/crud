<?php
include 'connection.php';
$var=mysqli_query($con,"SELECT * FROM `fileupload`");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        td,th,table{
            border: 1px solid black;
            border-collapse:collapse;
        
        }
        table{
            padding: 20px;
             width:50% ;
             text-align:center;
        }
    </style>
</head>
<body>
    <center>
        <table>
            
            <tr>
                <th>id</th>
                <th>file</th>
            </tr>
            <?php
            while($row=mysqli_fetch_assoc($var))
            {

            
            ?>
            <tr>
                <td><?php echo $row['fid'];?></td>
                <td><img src="images/<?php echo $row['file'];?>" alt="photo" height="100" width="200"></td>
            </tr>
            <?php
            }
            ?>
           
        </table>
    </center>
    
</body>
</html>