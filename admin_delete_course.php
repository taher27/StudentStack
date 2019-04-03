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
                width:10em;
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
      $sql = mysqli_query($con, "select * from subject") or die(mysqli_error($con));
      $srno = 1;
      if(mysqli_num_rows($sql)<1)
      {
          echo "No Subjects present";
      }
      else
      {
            echo "<table class='bordered centered' style='margin-left:380px; margin-top:30px; width:500px;'>";
            echo "<th style='border-top-left-radius: 15px;'><font color=white><center>Sr. No.</center></font></th>";
            echo "<th><font color=white><center>Subject Name</center></font></th>";
            echo "<th style='border-top-right-radius: 15px;'></th>";
            while($row = mysqli_fetch_row($sql))
            {
                echo "<tr><center><td>$srno</td><td>".strtoupper($row[1])."</td><td><a class='buttonlink' href='admin_delete_course2.php?subid=$row[0]'>DELETE</a></td></center></tr>";
              $srno++;            
              
            }
            echo "</table>";
            
      }
      ?>
    </body>
</html>








