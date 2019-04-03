<?php
    session_start();
?>
<html>
    <style>
/* General button style (reset) */
.btn {
	border: none;
	font-family: inherit;
	font-size: inherit;
	color: inherit;
	background: none;
	cursor: pointer;
	padding: 25px 80px;
	display: inline-block;
	margin: 19px 40px;
	text-transform: uppercase;
	letter-spacing: 1px;
	font-weight: 700;
	outline: none;
	position: relative;
-webkit-transition: all 0.3s;
	-moz-transition: all 0.3s;
	transition: all 0.3s;
}

.btn:after {
	content: '';
	position: absolute;
	z-index: -1;
	-webkit-transition: all 0.3s;
	-moz-transition: all 0.3s;
	transition: all 0.3s;
}

/* Button 1 */
.btn-1 {
	border: 3px solid #000;
        color: #000;
        background: #fff;
}

/* Button 1a */
.btn-1a:hover,
.btn-1a:active {
	color: #fff;
            background:#263238 ;
}

    </style>
    <body background="images/background.jpg" height="100">
    <center>
            <form action="index.php">
               <button style="top: 150px" class="btn btn-1 btn-1a" id="myButton"><a>Click here to Login Again</a></button>
               <?php   
               session_destroy();
               ?>   
            </form>
    </center>
    </body>
</html>
