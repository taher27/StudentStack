<?php
session_start();
include 'teacher_nav.php';
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
      <link type="text/css" rel="stylesheet" href="ss.css" />
    </head>
      <body background="images/background.jpg" height="100"  >
        <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
      
      <?php
      $email = $_SESSION['email'];
      $testid = $_REQUEST['testid'];
        //echo $email;
        $sql = mysqli_query($con, "select * from quizset where test_id='$testid'");
        $totalsets = mysqli_num_rows($sql);
            $setnumber = $totalsets+1;
            $setname = "set".$setnumber;
        if($totalsets<1)
        {
            echo "<center>No sets present</center>";
        }
      

                echo "<div>";
                echo "<div class='row' style='margin-left: 350px;  margin-top: 100px;'>";
                while($row1=mysqli_fetch_row($sql))
                {
                    echo "
                        <div class='col s6 m3 ' style='width:250px; margin-left:20px; margin-bottom:30px; margin-right:20px;'>
                        <a href='teacher_add_quiz_set2.php?setid=$row1[0]'>
                            <div  class='card'>
                                <div  class='card-image'>
                                    <img src='images/card4.png' style='height: 150px; border-radius: 15px;'>
                                    <span class='card-title'><h5><center>".strtoupper($row1[2])."</center></span>
                                </div>
                            </div>
                            </a>
                        </div>  ";
                    
		}
                echo "
                        <div class='col s6 m3 ' style='width:250px; margin-left:20px; margin-bottom:30px; margin-right:20px;'>
                        <a href='addset.php?testid=$testid&setname=$setname'>
                            <div  class='card'>
                                <div  class='card-image'>
                                    <img src='images/card4.png' style='height: 150px; border-radius: 15px;'>
                                    <span class='card-title'><h5><center>ADD NEW SET</center></span>
                                </div>
                            </div>
                            </a>
                        </div>  ";
               echo " </div></div>";
               $_SESSION['testid']=$row1['0'];
               
      ?> 
     
      
    </body>
</html>