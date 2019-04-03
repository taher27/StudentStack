<?php
session_start();
include ("database.php");
$email = $_SESSION['email'];
$lastname = $_POST['lastname'];
$gender = $_POST['gender'];
$dateofbirth = $_POST['dateofbirth'];;
$subject = $_POST['subject'];
$mobile = $_POST['mobileno'];

/*echo $email;
echo $lastname;
echo $gender;
echo $dateofbirth;
echo $subject;*/

$query = mysqli_query($con, "update userdetails set lastname='$lastname',gender='$gender',dateofbirth='$dateofbirth',subject='$subject',approval=4,mobile='$mobile' where email='$email' ");
if($query)
{    
    echo "Profile Updated successfully";
    echo "<script>window.location='login.php?email=$email';</script>";
}
else
{
    echo mysqli_error($con);
}
?>


