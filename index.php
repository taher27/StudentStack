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
                width: 600px;
                height: 350px;
                position: absolute;
                top:50%;
                left:50%;
                transform: translate(-50%, -50%);
                display: inline-flex; 
            }
            .backbox{  
                background-color: #404040;
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
                background-color: #404040;
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
            .signup h2 {
                color: #35B729;
                font-size:22px;
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
            .nav-wrapper{
                background-color: #263238 ;
                font: italic
            }
          
            a:link
            {
                color:#35B729;
            }
            
            a:visited 
            {
                color: #35B729;
            }

            /* mouse over link */
            a:hover 
            {
                color:#35B729;
            }

            /* selected link */
            a:active 
            {
                color:#35B729;
            }
            
            @font-face {
                font-family: Gentlemanly;
                src: url(fonts/Gentlemanly.ttf);
            }
            div123 {
                font-family: Gentlemanly;
            }  
            
            @font-face {
                font-family: Blacksword;
                src: url(fonts/Blacksword.otf);
            }
            div1234 {
                font-family: Blacksword;
            } 

        </style>
       <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>

<script language="javascript">
function check()
{
  if(document.form1.email.value=="")
  {
    alert("Please Enter your Email Address");
	document.form1.email.focus();
	return false;
  }
  e=document.form1.email.value;
		f1=e.indexOf('@');
		f2=e.indexOf('@',f1+1);
		e1=e.indexOf('.');
		e2=e.indexOf('.',e1+1);
		n=e.length;

		if(!(f1>0 && f2==-1 && e1>0 && e2==-1 && f1!=e1+1 && e1!=f1+1 && f1!=n-1 && e1!=n-1))
		{
			alert("Please Enter valid Email");
			document.form1.email.focus();
			return false;
		}
  return true;
  }
  
</script>
    </head>
    <body background="images/background.jpg" height="100"  >

        <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="js/materialize.min.js"></script>

        <div class="imaage" style="margin-top: 16%; margin-left: 10%">
            <img height="auto" width="350px" src="images/logo.png" />
        </div>

        <div class="imaage" style="margin-top: 31%; margin-left: 14%; float: left; font-style: italic ; font-size: 30px; color: #ffffff; font-family: fantasy" >
            <font face="Quantify Bold v2.6" ></font>
            
            
        </div>

        <div class="container" style="margin-left: 20%;" >
            <div class="container">
                <div class="backbox">
                    <div class="loginMsg">
                        <div class="textcontent">
                            <p class="title">Don't have an account?</p>
                            <p> </p>
                            <button id="switch1">Sign Up</button>
                        </div>
                    </div>
                    <div class="signupMsg visibility">
                        <div class="textcontent">
                            <p class="title">Have an account?</p>
                            
                            <button id="switch2">LOG IN</button>
                        </div>
                    </div>
                </div>
                <!-- backbox -->

                <div class="frontbox">
                    <div class="login">
                        <h2>LOG IN</h2>
                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                        <div class="inputbox">
                            <input type="text" name="email" placeholder="  EMAIL" required>
                            <input type="password" name="password" placeholder="  PASSWORD" required>
                            <?php
                            if(isset($_POST['submit']))
                            {
                                include("database.php");
                                $email = $_POST['email'];
                                $_SESSION['email'] = $email;
                                $password = $_POST['password'];
                                $adminquery = mysqli_query($con,"select * from admin where email = '$email' and password='$password'");
                                if(mysqli_num_rows($adminquery)>0)
                                {
                                    echo "<script>window.location='admin.php';</script>";
                                }
                                else
                                {
                                    $teacherquery = mysqli_query($con,"select * from teacherdetails where email = '$email' and password='$password'");
                                    if(mysqli_num_rows($teacherquery)>0)
                                    {
                                        echo "<script>window.location='teacher.php';</script>";
                                    }
                                    else
                                    {
                                        $userquery = mysqli_query($con,"select * from userdetails where email = '$email' and password='$password'");
                                        if(mysqli_num_rows($userquery)>0)
                                        {
                                            echo "<script>window.location='login.php';</script>";
                                        }
                                        else
                                        {
                                            echo "<font color='red'><b>*Re-evaluate Your Credentials </b></font>";
                                        }
                                    }
                                }
                                
                                
                            }
                            ?>
                        </div>
                            <a href="forgetpass.php">FORGET PASSWORD?</a>
                        <br>
                        <input id="loginbutton" type="submit" name="submit" value="LOG IN" />
                        </form>
                    </div>


                    <div class="signup hide">
                        <h2>SIGN UP</h2>
                        <form action="signup.php" method="POST" name="form1" onsubmit="return check()">
                        <div class="inputbox">
                            <input type="text" name="firstname" placeholder="  FIRSTNAME" required>
                            <input type="text" name="email" placeholder="  EMAIL" required>
                            <input type="password" name="password" placeholder="  PASSWORD" required>
                        </div>
                        <input id="loginbutton" type="submit" name="submit" value="SIGN UP" />
                        </form>
                    </div>
                </div>
            </div>
            <!-- frontbox -->




        </div>
         <nav>
            <div class="nav-wrapper" >
                <a style="margin-top:0.3%;" href="" class="brand-logo"></a>
                <div1234><font style="margin-left: 1%; font-size: 30px; font-style: italic; font-weight: bold;">S</font></div1234>
                <div123><font style="font-size: 25px;">tudent</font></div123>
                <div1234><font style="margin-left: 1%; font-size: 30px; font-style: italic; font-weight: bold;">S</font></div1234>
                <div123><font style="font-size: 25px;">tack</font></div123>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a href="aboutus.php">About Us</a></li>
                </ul>
            </div>
        </nav>

        <script>
            var $loginMsg = $('.loginMsg'),
                    $login = $('.login'),
                    $signupMsg = $('.signupMsg'),
                    $signup = $('.signup'),
                    $frontbox = $('.frontbox');

            $('#switch1').on('click', function () {
                $loginMsg.toggleClass("visibility");
                $frontbox.addClass("moving");
                $signupMsg.toggleClass("visibility");

                $signup.toggleClass('hide');
                $login.toggleClass('hide');
            });

            $('#switch2').on('click', function () {
                $loginMsg.toggleClass("visibility");
                $frontbox.removeClass("moving");
                $signupMsg.toggleClass("visibility");

                $signup.toggleClass('hide');
                $login.toggleClass('hide');
            });

            /*setTimeout(function(){
             $('#switch1').click();
             },1000);
         
             setTimeout(function(){
             $('#switch2').click();
             },3000);*/
        </script>


    </body>

</html>
