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
                width: 650px;
                height: 400px;
                position: absolute;
                top:50%;
                left: 28%;
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
             
            #submitbutton{
                background-color: #43a047;
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
            #submitbutton:hover{
                background-color: #66bb6a;
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
 
        </style>
       <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
 
    </head>
    <body background="images/background.jpg" height="100"  >
 
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="js/materialize.min.js"></script>
 
        <div class="container" style="margin-left: 20%;" >
            <div class="container">
                <!-- backbox -->
 
                <div class="frontbox">
                    <div class="login">
                        <h2>FORGET PASSWORD</h2>
                            <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
                                <input type="text" name="email" placeholder="Enter Email"><br>
                                <p><?php
                                    include("database.php");
                                    if(isset($_POST['submit']))
                                        {
                                        $email=$_POST['email'];
                                        $sql=mysqli_query($con,"select * from userdetails where email ='$email'");
                                        if(mysqli_num_rows($sql)<1)
                                        {
                                            echo "*User not exist";
                                        }
                                        else
                                        {
                                         $row= mysqli_fetch_row($sql);
                                         echo "Your Password is: ".$row[3];
                                         echo "<br>";
                                         echo "<a href='index.php'>Click here</a> to login.....";
                                        }
                                        }
                                    ?>
                                    </p>
                                 
                            <input id="submitbutton" type="submit" name="submit" value="SUBMIT">
                            </form>
                    </div>
                </div>
            </div>
        </div>
             
            <script>
                 
        </script>
 
 
    </body>
 
</html>