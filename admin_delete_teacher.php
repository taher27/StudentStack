<?php
session_start();
include 'admin_nav.php';
include ("database.php");

?>
<html>
    <head>
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
            .buttonlink{
                display:block;
                width:6em;
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
            }
            .buttonlink:hover{
                background:#424242;
                color:  #cfd8dc;
                border-color:  #cfd8dc;
                
            } 
        </style>
    </head>
      <body background="images/background.jpg" height="100"  >
        <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
      
      <?php
      $email = $_SESSION['email'];
      $sql = mysqli_query($con, "select * from teacherdetails") or die(mysqli_error($con));
      $srno = 1;
      if(mysqli_num_rows($sql)<1)
      {
          echo "No Teachers present";
      }
      else
      {
            echo "<table class='bordered centered' style='margin-left:280px; width:1000px;'>";
            echo "<th style='border-top-left-radius: 15px;'><font color=white><center>Sr. No.</center></font></th>";
            echo "<th><font color=white><center>First Name</center></font></th>";
            echo "<th><font color=white><center>Last Name</center></font></th>";
            echo "<th><font color=white><center>E-Mail</center></font></th>";
            echo "<th><font color=white><center>Subject</center></font></th>";
            echo "<th><font color=white><center>Approval</center></font></th>";
            echo "<th><font color=white><center>Gender</center></font></th>";
            echo "<th><font color=white><center>Date of Birth</center></font></th>";
            echo "<th><font color=white><center>Mobile</center></font></th>";
            echo "<th style='border-top-right-radius: 15px;'><font color=white><center></center></font></th>";
            while($row = mysqli_fetch_row($sql))
            {
                $sql2 = mysqli_query($con, "select name from subject where sub_id='$row[5]'");
                $row2 = mysqli_fetch_row($sql2);
                echo "<tr><center><td>$srno</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row2[0]</td><td>$row[6]</td><td>$row[7]</td><td>$row[8]</td><td>$row[9]</td><td><a class='buttonlink' href='admin_delete_teacher2.php?id=$row[0]'>REMOVE</a></td></center></tr>";
              $srno++;            
              
            }
            echo "</table>";
            
      }
      ?>
    </body>
</html>










