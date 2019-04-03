<?php
session_start();
include ("database.php");
?>
<html>
    <head>
    </head>
    <body background="images/background.jpg" height="100"  >
 
    <?php

$email = $_SESSION['email'];
$changepassword = $_POST['changepassword'];
$sql = mysqli_query($con, "update teacherdetails set password='$changepassword' where email='$email'") or die(mysqli_error($con));
if($sql)
{
    session_destroy();
    echo "<script>";
    echo "var x = window.confirm('Password CHANGED successfully, click OK to Log In');
           if(x)
           {
                window.location='index.php';
           }
           else
           {
                window.location='index.php';
           }";
    echo "</script>";
}



        
    ?>
    </body>
</html>






