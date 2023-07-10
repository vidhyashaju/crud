<?php
include 'connection.php';
$data=mysqli_query($con,"SELECT  `fname`,`lname`,`stu_id` FROM `student_reg`");
if(isset($_POST['submit']))
{
    $mark=$_POST['mark'];
    $subject=$_POST['subject'];
    $stuid=$_POST['stu_id'];
    mysqli_query($con,"INSERT INTO `mark`( `stu_id`, `mark`, `subject`) VALUES ('$stuid','$mark','$subject')");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST">
    <center>
        <table>
            <tr>
            <td>
                <select name="stu_id" id="">
                    <option value="">Select</option>
                    <?php
                    while($row=mysqli_fetch_assoc($data))
                    {
                        ?>
                        <option value="<?php echo $row['stu_id'];?>"><?php echo $row['fname'];?><?php echo " ";?><?php echo $row['lname'];?></option>
                        <?php
                    }
                    ?>
                </select>
            </td>
            </tr>
            <tr>
                <td><label for="">Mark </label></td>
                <td>
                    <input type="text" name="mark">
                </td>
            </tr>
            <tr>
                <td><label for="">Subject</label></td>
                <td><input type="text" name="subject"></td>
            </tr>
            <tr>
                <td><button name="submit">submit</button></td>
            </tr>
        </table>
    </center>
    </form>
</body>
</html>