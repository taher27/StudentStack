<?php
if(!isset($_SESSION['email']))
{
    session_start();
}

include ("database.php");
//$em = $_REQUEST['email'];
//$_SESSION['email'] = $em;
$email = $_SESSION['email'];
//echo $email;
          $sql=mysqli_query($con,"select * from userdetails where email='$email'");
          $row = mysqli_fetch_row($sql);
?>
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
    }
    hr.style-two {
    border: 0;
    height: 1px;
    background-image: linear-gradient(to right, rgba(0, 0, 0, 0), rgba(255,255,255,0.9), rgba(0, 0, 0, 0));
    
    
}
.material-icons 
{
    vertical-align: -5px; /*Change this to adjust the icon*/
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
 
 
      <center><ul class="side-nav fixed" style="width: 210px; background-color:rgba(13,13,13,0.78);padding-left: 0px;">
          
            <li>
          <div class="user-view">
              <center>  <a href="#!user"><img class="circle" src="<?php if($row[6]=='male'){echo "images/Male_pro_pic.jpg";} else{echo "images/Female_pro_pic.jpg";} ?>" height="26%"></a></center>
      <a href="#!user"></a>
      <a href="#!name"><span class="white-text name"><?php echo "$row[1] $row[2]" ?></span></a>
      <a href="#!"><span class="white-text email"><?php echo $row[4]; ?></span></a></div></li>
      <hr class="style-two"> 
      <br>
      <a href="login.php"><li><i class="material-icons" >home</i>&nbsp;&nbsp;&nbsp;Home</li></a>

      <a href="quiz_user.php"><li><i class="material-icons" >assignment</i>&nbsp;&nbsp;&nbsp;Quiz</li> </a>
      <a href="user_tutorial.php"><li><i class="material-icons" >library_books</i>&nbsp;&nbsp;&nbsp;Tutorial</li> </a>
      <a href="user_result.php"><li><i class="material-icons" >assessment</i> &nbsp;&nbsp;&nbsp;Result</li> </a>
      <a href="aboutus.php"><li><i class="material-icons" >info</i> &nbsp;&nbsp;&nbsp;About Us</li> </a>
      
      
          <a href="signout.php"><li><i class="material-icons" >power_settings_new</i> &nbsp;&nbsp;&nbsp;Signout</li></a>
       
          </ul></center>
    </body>
</html>
