<?php
session_start();
include ("user_nav.php");

///echo $email;
include("database.php");
        
    ?>
<html>
    <head>
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
       
      
      
      <link href="ss.css" rel="stylesheet" type="text/css" />
          <br><br>
          <?php
          $email = $_SESSION['email'];
          $sql = mysqli_query($con, "select * from userdetails where email='$email'");
        $rowsql = mysqli_fetch_row($sql);
        //echo $rowsql[5];
	//$subid = $rowsql[8];
        if($rowsql[8]=='' || $rowsql[5]!=1)
        {
            echo "U are not eligible for the Quiz";
        }
        else
        {
            $sql1 = mysqli_query($con,"select*from quizlevel where sub_id=$rowsql[8]");
            if(mysqli_num_rows($sql1)<1)
          {
		echo "No quiz available for selected Quiz"; 
          }
	else
	{
            echo "<div>";
            echo "<div class='row' style='margin-left: 350px;  margin-top: 100px;'>";
		while($row1=mysqli_fetch_row($sql1))
		{
                    echo "
                <div class='col s6 m3 '>
                <a href='quizset.php?testid=$row1[0]'>
			<div  class='card'>
				<div  class='card-image'>
                                <img src='images/card4.png' style='height: 150px; border-radius: 15px;'>
                                    <span class='card-title'><h5 style='color: white; margin-top: 500px;'>$row1[2]</span>
				</div>
			</div>
                        </a>
		</div>  ";			
		}
               echo " </div></div>";
               $_SESSION['testid']=$row1['0'];
                        
	}
        }
          
          ?>
          
      
        
          
    </body>
</html>




