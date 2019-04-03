<?php
session_start();
//include ("feed.php");
include ("teacher_nav.php");
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
 
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <link href='https://fonts.googleapis.com/css?family=Roboto:400,300,100' rel='stylesheet' type='text/css'>
        <meta name="viewport" content="width=device-width, initial-scale=1">
 
        <meta charset="UTF-8">
        <title></title>
        <!--Import Google Icon Font-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Import materialize.css-->
        <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
 
        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
 
        <style>
           table{
                background-color: rgba(238, 238, 238,0.9);
                border-radius: 15px;
                border-color: black;
                border-width:medium;
                margin-top: 10px;
            }
            th
            {
                text-align: center;
                background-color: #000;
                
            }
        </style>
       <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
 
    </head>
    <body background="images/background.jpg" height="100" style="background-repeat: no-repeat; background-attachment:  fixed;">
 
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="js/materialize.min.js"></script>
 
        <?php
	include("database.php");
	$email = $_SESSION['email'];
        //echo $email;
	
        //$sql = mysqli_query($con, "select l.test_name,l.test_id,s.total_que, r.set_id,r.score,r.test_date,s.set_id,s.set_name,s.test_id from quizlevel l, mst_result r,quizset s where r.email='$email' and s.set_id=r.set_id and l.test_id=s.test_id") or die(mysqli_error($con));
        //$sql = mysqli_query($con, "select l.test_name,l.test_id,s.test_id,s.set_name,u.subject,u.email,t.subject,r.email from quizlevel l,quizset s,userdetails u,teacherdetails t.mst_result r where l.test_id=s.test_id and u.subject=t.subject and u.email=r.email;") or die(mysqli_error($con));
        
        //$sql = mysqli_query($con, "select u.email,u.subject,t.subject,r.email,r.score,l.sub_id,l.test_name,r.set_id from userdetails u,teacherdetails t,mst_result r,quizlevel l where u.subject=t.subject and r.email=u.email and l.sub_id=t.subject");
        $sql = mysqli_query($con, "select u.email,u.subject,u.firstname,u.lastname,t.subject,r.email,r.score,r.test_date,r.set_id,s.set_id,s.test_id,l.test_id,l.test_name,s.set_name,s.total_que from userdetails u,teacherdetails t,mst_result r,quizset s,quizlevel l where u.subject=t.subject and r.email=u.email and r.set_id=s.set_id and s.test_id=l.test_id");
        if(mysqli_num_rows($sql)<1)
        {
            echo "<center>No test given</center>";
        }
        else
        {
            echo "<table class='bordered centered' style='margin-left:400px; width:650px;'>";
		echo "<tr><font color=white>";
		echo "<th style='border-top-left-radius: 15px;'><font color=white>Student Name</font></th>";
                 echo "<th><font color=white>Student E-mail</font></th>";
                echo "<th><font color=white>Score</font></th>";
               echo "<th><font color=white>Total Questions</font></th>";
		echo "<th><font color=white>Test Name</font></th>";
                echo "<th><font color=white>Set</font></th>";
		//echo "<th><font color=white>Score</font></th>";
                echo "<th style='border-top-right-radius: 15px;'><font color=white>Test Date</font></th>";
		echo "</font></tr>";
            while($row = mysqli_fetch_row($sql))
            {
                echo "<tr><td>$row[2] $row[3]</td><td>$row[0]</td><td>$row[6]</td><td>$row[14]</td><td>$row[12]</td><td>$row[13]</td><td>$row[7]</td></tr>";
                //echo "<tr><td>$row[2] $row[3]</td><td>$row[0]</td><td>$row[6]</td><td>$row[7]</td><td>$row[12]</td><td>$row[13]</td></tr>";
            }
            echo "</table>";
        }
        ?>
        
 
    </body>
 
</html>

