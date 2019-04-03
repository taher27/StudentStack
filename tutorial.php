<?php
session_start();
include ("user_nav.php");
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <style>
            table{
                background-color: rgba(0,172,193,0.75);
                border-radius: 15px;
            }
        </style>
    </head>
    <body background="images/background.jpg" height="100">
   
        <?php
            include ("database.php");
            $email = $_SESSION['email'];
            //echo $email;
            $sql = mysqli_query($con,"select * from userdetails where email='$email'");
            $row = mysqli_fetch_row($sql);
            //echo $row[0];
            $sql2 = mysqli_query($con,"select * from tutorial_doc where sub_id=$row[0]");
            if(mysqli_num_rows($sql2)<1)
            {
                echo "No tutorial available currently";
            }
            else
            {
                //echo "<div class='row' style=''>";
                echo "<table class='bordered centered' style='margin-left:500px; margin-top: 200px; width:250px;'>";
                echo "<th><center><font color='white'>Name</font></center></th>";
                while($row2 = mysqli_fetch_row($sql2))
                {
                    echo "<tr><td><a target='self' href='$row2[3]' style='color: white;'>$row2[2]</a></td></tr>";
                }
                echo "</table>";
            }
        ?>
    
    </body>
</html>

