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
          //echo $email;
          $testid = $_REQUEST['testid'];
          //echo $testid;
          $sql = mysqli_query($con, "select * from userdetails where email='$email'");
          //$sqlresult = mysqli_query($con, "select score from mst_result where login='$email' and test_id=$testid")or die(mysqli_error($con));
        $rowsql = mysqli_fetch_row($sql);
        
        //echo mysqli_num_rows($sqlresult);
        /*while($rowresult = mysqli_fetch_row($sqlresult))
        {
            print_r($rowresult);
            
        }*/
        //echo $rowsql[5];
	//$subid = $rowsql[8];
        if($rowsql[8]=='' || $rowsql[5]!=1)
        {
            echo "U are not eligible for the Quiz";
        }
        else
        {
            $sql1 = mysqli_query($con,"select*from quizset where test_id=$testid");
                      if(mysqli_num_rows($sql1)<1)
                      {

		echo "No quiz available for selected Quiz"; 
                        }
	else
	{
            echo "<div>";
            echo "<div class='row' style='margin-left: 350px; margin-top: 10px;'>";
		while($row1=mysqli_fetch_row($sql1))
		{
                    
                    echo "
                            <div class='col s6 m3 ' style='width:250px; margin-left:20px; margin-bottom:30px; margin-right:20px;'>
                            <a style='color: white;' href='quiz.php?setid=$row1[0]'>
                                <div  class='card'>
                                    <div  class='card-image'>
                                        <img src='images/card4.png' style='height: 150px; border-radius: 15px;'>
                                        <span class='card-title'><h5><center>".strtoupper($row1[2])."</center></span>
                                    </div>
                                </div>
                                </a>
                            </div>  ";			
		}
               echo " </div></div>";
               $_SESSION['setid']=$row1['0'];
                        
	}
        }
          
          ?>
          
      
        
          
    </body>
</html>







