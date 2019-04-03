<?php
session_start();
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
            body{
 
                font-family: 'Roboto', sans-serif;
            }
 
            .imaage{
                position: absolute;
                line-height: 39pt
            }
            .container{
                /*border:1px solid white;*/
                width: 1000px;
                height: 670px;
                position: absolute;
                top:50%;
                left: 30%;
                transform: translate(-50%, -50%);
                display: inline-flex; 
            }
            .backbox{  
                background-color: #374d5b;
                width: 100%;
                height: 80%;
                position: absolute;
                transform: translate(0,-50%);
                top:50%;
                display: inline-flex;
 
            }
 
            .frontbox{
                background-color: white;
                border-radius: 20px;
                height: 100%;
                width: 50%;
                z-index: 10;
                position: absolute;
                right: 0;
                margin-right: 3%;
                margin-left: 3%;
                transition: right .8s ease-in-out;
            }
 
            .moving{
                right:45%;
 
            }
 
            .loginMsg, .signupMsg{
                width: 50%;
                height: 100%;
                font-size: 15px;
                box-sizing: border-box;
            }
 
            .loginMsg .title,
            .signupMsg .title{
                font-weight: 300;
                font-size: 23px;
            }
 
            .loginMsg p,
            .signupMsg p {
                font-weight: 100;
            }
 
            .textcontent{
                color:white;
                margin-top:65px;
                margin-left: 12%;
            }
 
            .loginMsg button,
            .signupMsg button {
                background-color: #374d5b;
                border: 2px solid white;
                border-radius: 10px;
                color:white;
                font-size: 12px;
                box-sizing: content-box;
                font-weight: 300;
                padding:10px;
                margin-top: 20px;
            }
 
            /* front box content*/
            .login, .signup{
                padding: 20px;
                text-align: center;
            }
 
            .login h2,
            .signup h2{
                color: #35B729;
                font-size:22px;
            }
            .login h7
             {
                color: #35B729;
                
            }
 
            .inputbox{
                margin-top:30px; 
            }
            .login input, 
            .signup input {
                display: block;
                width: 100%;
                height: 40px;
                background-color: #f2f2f2;
                border: none;
                margin-bottom:20px;
                font-size: 12px;
                color: black;
            }
 
            .login button,
            .signup button{
                background-color: #35B729;
                border: none;
                color:white;
                font-size: 12px;
                font-weight: 300;
                box-sizing: content-box;
                padding:10px;
                border-radius: 10px;
                width: 60px;
                position: absolute;
                right:30px;
                bottom: 30px;
                cursor: pointer;
            }
             
            #loginbutton{
                background-color: #35B729;
                border: none;
                color:white;
                font-size: 12px;
                font-weight: 300;
                box-sizing: content-box;
                padding:10px;
                border-radius: 10px;
                width: 60px;
                height: 18px;
                position: absolute;
                right:30px;
                bottom: 5px;
                cursor: pointer;
            }
            
            #loginbutton:hover{
                background-color: #35f229;
            }
 
            /* Fade In & Out*/
            .login p {
                cursor: pointer;
                color:#404040;
                font-size:15px;
            }
 
            .loginMsg, .signupMsg{
                /*opacity: 1;*/
                transition: opacity .8s ease-in-out;
            }
 
            .visibility{
                opacity: 0;
            }
 
            .hide{
                display: none;
 
            } 
            
            .btn2 {
	border: none;
	font-family: serif;
	font-size: inherit;
	color: inherit;
	background: none;
	cursor: pointer;
	padding: 8px 80px;
	display: inline-block;
	margin: 1px;
	text-transform: uppercase;
	letter-spacing: 1px;
	font-weight: 700;
	outline: none;
        position: relative;
-webkit-transition: all 0.3s;
	-moz-transition: all 0.3s;
	transition: all 0.3s;
        height: 80px;
        width: 300px;
}

.btn2:after {
	content: '';
        position: absolute;
	z-index: -1;
	-webkit-transition: all 0.3s;
	-moz-transition: all 0.3s;
	transition: all 0.3s;
}

/* Button 1 */
.btn2-1 {
	border: 3px solid #000;
        color: #000;
        background: #fff;
}

/* Button 1a */
.btn2-1a:hover,
.btn2-1a:active{
	color: #fff;
            background:#263238 ;
}
input[type="date"]::-webkit-inner-spin-button { 
    display: none;
}

 
        </style>
       <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
 
    </head>
    <body background="images/background.jpg" height="100"  >
 
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="js/materialize.min.js"></script>
 
        
        <?php
        
include("database.php");
//$firstname = $_POST['firstname'];
$email = $_SESSION['email'];
//$password = $_POST['password'];
//echo $email;
$query = mysqli_query($con, "select * from userdetails where email='$email'");
$row = mysqli_fetch_row($query);
//$_SESSION['email'] = $row[4];
$subquery = mysqli_query($con, "select * from subject");
//echo "Welcome $row[1]<br>";
if($row[5]==0)
{
       echo "<div class='container' style='margin-left: 20%;' >
            <div class='container'>
                <!-- backbox -->
 
                <div class='frontbox'>
                    <div class='login'>
                        <h2>REGISTRATION FORM</h2>
                        <h7>Welcome $row[1]<h7>
                        <form action='login2.php' method='POST'>
                        <div class='inputbox'>
                            <b> <input type='text' name='firstname' value='$row[1]' disabled></b>   
                            <input type='text' name='lastname' placeholder='  LAST NAME' required>
                            <b><input type='text' name='email' value='$row[4]' disabled></b>
                            <input type='date' name='dateofbirth' placeholder='  DOB(DD/MM/YYYY)' required>
                            <p>
                                <label style='font-size: 15px;'>GENDER: </label>
                                <input class='with-gap' name='gender' type='radio' id='test3'value='male' required  />
                                <label for='test3'>MALE</label>
                                <input class='with-gap' name='gender' type='radio' id='test4' value='female' required  />
                                <label for='test4'>FEMALE</label>
                              </p>
                            <br>
                            <input maxlength='10' type='text' name='mobileno' placeholder='  MOBILE NUMBER' required>
                             
                            <select name='subject' class='browser-default' required>
                              <option value='' disabled selected>SELECT COURSE</option>";
                                  while($row1 = mysqli_fetch_row($subquery))
                                  {
                                     echo "<option value='$row1[0]'>$row1[1]</option>";
                                  } 
                           echo "</select>
 
                        <input id='loginbutton' type='submit' name='submit' value='PROCEED' />
                        </form>
                    </div>
                </div>
            </div>
        </div>";
}
else if($row[5]==4)
{
    echo "<center><h4>Your Approval is pending, Please wait...</h4></center>";
    include './signout1.php';
}
else if($row[5]==2)
{
     echo "<div class='container' style='margin-left: 20%; margin-top: 5%;' >
            <div class='container'>";
    echo "<div class='frontbox' style='height: 250px;'>";
    echo "<div class='login'>";
    echo "<center><h2>You are not Approved for Selected Course, Please select other course :-</h2></center>";
    
    echo "<form action='subjectmodify.php' method='POST' align='center'>";
    echo "<div class='inputbox'>";
    echo "<select name='subject' class='browser-default' required>
          <option value='' disabled selected>SELECT COURSE</option>";
    while($row1 = mysqli_fetch_row($subquery))
    {
        echo "<option value='$row1[0]'>$row1[1]</option>";
    }   
    echo "</select><br>";
    echo "<input id='loginbutton' type='submit' name='submit' required />";
    echo "</div>";
    echo "</form>";
    echo "</div>";
    echo "</div>";
    echo "</div>";
    echo "</div>";
    echo "<br><center style='margin-top: 300px;'><h5>Not Interested?</h5><button style='top: 10px;' class='btn2 btn2-1 btn2-1a' id='myButton'><a href='userdelete.php'>Click here to delete your Account</a></button></center><br>";
    
}
 else 
{
     include("user_nav.php");
     include("feed.php");
     //echo "Approved user<br>";
}
           ?>
           
            <script>
                 $('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 80, // Creates a dropdown of 15 years to control year,
    today: 'Today',
    clear: 'Clear',
    close: 'Ok',
    closeOnSelect: false // Close upon selecting a date,
  });
        </script>
 
 
    </body>
 
</html>