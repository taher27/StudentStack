<html>
    <head></head>
    <body background="images/background.jpg"></body>
</html>


<?php
include("database.php");
$firstname = $_POST['firstname'];
$email = $_POST['email'];
$password = $_POST['password'];

/*echo $firstname;
echo $email;
echo $password;*/
$sql = mysqli_query($con,"select * from userdetails where email='$email'");
if(mysqli_num_rows($sql)>0)
{
    echo "<center><h2>User already exists</h2></center>";
}
 else 
{
     $insert = mysqli_query($con,"insert into userdetails (firstname,email,password) values ('$firstname','$email','$password')");
    if($insert)
    {
        echo "<center><h2>You have been successfully Registered</h2></center>";
        //echo "<center><h4><a href='index.php'>Click here</a> to Login</h4></center>";
        include ("signout.php");
    }
    else
    {
        echo "Not registered";
    }
    
}

?>

