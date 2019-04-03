<html>
    <head>
        <style type="text/css">
    a li
        {               margin-top:  1px;
                       color: #E0E0E0;
                       text-align: center;
 
        }
        
    a li:hover
    {
        font-weight: bold; 
        color: #ffffff;
            
;
        
         
    }
    hr.style-two {
    border: 0;
    height: 1px;
    background-image: linear-gradient(to right, rgba(0, 0, 0, 0), rgb(245,255,250)
, rgba(0, 0, 0, 0));
}
.material-icons 
{
    
    vertical-align: -5px; /*Change this to adjust the icon*/
    
    
}
    .button1{
                display:inline-block;
                width:8em;
                height:2em;
                background: #cfd8dc;
                border-style: solid;
                border-width: 1px;
                border-color: #424242;
                color:#333;
                line-height:2;
                text-align:center;
                text-decoration:none;
                font-weight:500;
                border-radius: 10px;
               
                margin-left: 20px;
            }
            .button1:hover{
                background:#424242;
                color:  white;
                border-color:  #cfd8dc;
                
            }
          
            
        </style>
             
        <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
    
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>
    <body background="images/background.jpg" height="100"  >
        <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
 
 
 
 
 
 
      </body></html>

<?php
session_start();
include("teacher_nav.php");
include("database.php");
//echo "Welcome to teacher<br>";
$email = $_SESSION['email'];
$teacherquery = mysqli_query($con,"select * from teacherdetails where email='$email' ");
$teacherrow = mysqli_fetch_row($teacherquery);
$requestquery = mysqli_query($con, "select * from userdetails where approval=4 and subject=$teacherrow[5]");
if(mysqli_num_rows($requestquery)>0)
{
    echo "<center><h1>New Registrations</h1>";
    echo "<table border='2' style='width:50%; border: 3px solid black; background-color:#eee' >";
    echo "<th style='width:50%; border: 3px solid black; background-color:#000; color:#fff'  >Student name</th>";
    echo "<th width='50%' style='width:50%; border: 3px solid black; background-color:#000; color:#fff'>Verify</th>";
    while($row= mysqli_fetch_row($requestquery))
    {
        echo "<tr>";
        echo "<td style='align-content: center; width:50%; border: 3px solid black;  color:#000'>$row[1]</td>";
        echo "<td style='border: 3px solid black;  color:#000'><a class='button1'  href='yesverify.php?email_std=$row[4]'>Yes</a>\t<a class='button1' href='noverify.php?email_std=$row[4]'>No</a></td>";
        echo "</tr>";
    }
    
    echo "</table>";
    echo "</center>";
}
else
{
    echo "<center>No new Requests</center>";
}

?>

