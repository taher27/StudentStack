
<?php 
if(!isset($_SESSION['email']))
{
    session_start();
}
 
$email = $_SESSION['email'];

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
 
 
 
 
 
 
      <ul class="side-nav fixed" style="width: 210px; background-color:rgba(	21,101,192,0.9)">
            <li>
          <div class="user-view">
            
               
              <center>  <a href="#!user"><img class="circle" src="images/people.jpg" height="26%"></a></center>
      <a href="#!user"></a>
      <a href="#!name"><span class="white-text name">Teacher </span></a>
     
      <a href="#!email"><span class="white-text email"><?php echo $email;?>
              </span></a></div></li>
       
            
      <hr class="style-two"> 
      <br>
      <a href="teacher.php"><li><i class="material-icons" >home</i>&nbsp;&nbsp;&nbsp;Home</li></a>

      <a href="request.php"><li><i class="material-icons" >group</i>&nbsp;&nbsp;&nbsp;Requests</li> </a>
<a href="teacher_quiz.php"><li><i class="material-icons" >library_books</i>&nbsp;&nbsp;&nbsp;Quiz</li> </a>
<a href="teacher_tutorial.php"><li><i class="material-icons" >library_books</i>&nbsp;&nbsp;&nbsp;Tutorial</li> </a>
<a href="teacher_result.php"><li><i class="material-icons" >assessment</i> &nbsp;&nbsp;&nbsp;Result</li> </a>
<a href="aboutus.php"><li><i class="material-icons" >info</i> &nbsp;&nbsp;&nbsp;About Us</li> </a>

          <a href="signout.php"><li><i class="material-icons" >power_settings_new</i> &nbsp;&nbsp;&nbsp;Signout</li></a>
       
      </ul>
    
            </body></html>
