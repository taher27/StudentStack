<?php
session_start();
include ("database.php");
$email = $_SESSION['email'];
$subject = $_POST['subject'];

/*echo $email;
echo $lastname;
echo $gender;
echo $dateofbirth;
echo $subject;*/

$query = mysqli_query($con, "update userdetails set subject='$subject',approval=4 where email='$email' ");
if($query)
{    
    echo "Profile Updated successfully";
    echo "<script>window.location='login.php';</script>";
}
else
{
    echo mysqli_error($con);
}
?>
