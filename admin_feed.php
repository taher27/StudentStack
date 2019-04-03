<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include 'admin_nav.php';
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
      
      
      
 
      <div>
            <div class='row' style='margin-left: 350px;  margin-top: 100px;'>
                <div class='col s6 m3 '>
                    <a href="admin_add_feed.php">
			<div  class='card'>
				<div  class='card-image'>
                                    <img src='images/card4.png' style='height: 150px; border-radius: 15px;'>
                                    <span class='card-title'><h5><center>Add Feeds</center></span>
				</div>
			</div>
                    </a>
		</div>			
                <div class='col s6 m3 '>
                    <a href="admin_delete_feed.php">
			<div  class='card'>
				<div  class='card-image'>
                                    <img src='images/card4.png' style='height: 150px; border-radius: 15px;'>
                                    <span class='card-title'><h5><center>Remove Feeds</center></span>
				</div>
			</div>
                    </a>
		</div>
              </div>
      </div>
      
      
      
       
     
     
     
     
      
    </body>
</html>