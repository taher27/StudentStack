<?php


session_start();
extract($_POST);
extract($_SESSION);
include("database.php");
//echo "<h1>Review Test</h1>";
	if(isset($_POST['Finish']))
	{	
		echo "hello";
		mysqli_query($con,"delete from mst_useranswer where sess_id='".session_id()."'");
		unset($_SESSION['qn']);
		//header("location:index.php");
		echo "<script type='text/javascript'>  window.location='index.php' </script>";
		exit;
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Review Questions</title>
<!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      
</head>
    <body bgcolor="#c1e4fa">
      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
    
      <?php
echo "<center><h2 style='display: inline;'><font color=purple>Review Test</font></h1></center>";
if(!isset($_SESSION['qn']))
{
	$_SESSION['qn']=0;
}
else if($submit=='Next Question')
{
	$_SESSION['qn'] = $_SESSION['qn']+1;
}
else if($submit=='Finish')
{
	//echo "hi";
	mysqli_query($con,"delete from mst_useranswer where sess_id='".session_id()."'");
	unset($_SESSION['qn']);
	//header("location:index.php");
	echo "<script type='text/javascript'>  window.location='login.php' </script>";
	exit;
}

		$sql=mysqli_query($con,"select * from mst_useranswer where sess_id='".session_id()."'") or die(mysqli_error());
		mysqli_data_seek($sql,$_SESSION['qn']);
		$row = mysqli_fetch_row($sql);
		
		echo "<form action='review.php' method='post' style='margin-top: 20px; margin-left: 400px; '>";
		echo "<table align='center'>";
		//$n = $_SESSION['qn']+1;
		//echo "<tr><td><font color=red><b>Que : ".$n." $row[2]</b></font></td></tr>";
		echo "<tr><td><h4 style='display: inline;'><font color=red><b>Que : $row[2]</b></font></h2></td></tr>";
		echo "<tr><td><h5 style='display: inline;'><font color=blue><b>1. $row[3]</b></font></h3></td></tr>";
		echo "<tr><td><h5 style='display: inline;'><font color=blue><b>2. $row[4]</b></font></h3></td></tr>";
		echo "<tr><td><h5 style='display: inline;'><font color=blue><b>3. $row[5]</b></font></h3></td></tr>";
		echo "<tr><td><h5 style='display: inline;'><font color=blue><b>4. $row[6]</b></font></h3></td></tr>";
		if($row[8]==0)
		{
			echo "<tr><td><h5><font color=brown><b>You Skipped this Question </b></font></h3></td></tr>";
			echo "<tr><td><h5><font color=green><b>Correct answer is option : $row[7] </b></font></h3></td></tr>";
		}
		else
		{
			echo "<tr><td><h5><font color=brown><b>Your answer is option : $row[8] </b></font></h3></td></tr>";
			echo "<tr><td><h5><font color=green><b>Correct answer is option : $row[7] </b></font></h3></td></tr>";
		}
		
		
			/*if($row[7]==$row[8])
			{
				$result=mysqli_query($con,"select * from correctimage");
				if(mysqli_num_rows($result)>0)
				{
					while($row=mysqli_fetch_array($result))
					{
						//echo "<tr><td><img height='50' width='50' src='correctimagedisplay.php? id=".$row['id']."'></td></tr>";
						echo '<tr><td><img height=50 width=50 src="data:image/png;base64,'.base64_encode( $row['image'] ).'"/></td></tr>';
					}
				
				}
			}*/
			/*else
			{
				$result=mysqli_query($con,"select * from wrongimage");
				if(mysqli_num_rows($result)>0)
				{
					while($row=mysqli_fetch_array($result))
					{
						//echo "<tr><td><img height='50' width='50' src='wrongimagedisplay.php? id=".$row['id']."'></td></tr>";
						echo '<tr><td><img height=50 width=50 src="data:image/png;base64,'.base64_encode( $row['image'] ).'"/></td></tr>';
					}
				}
			}*/
		
		
		if($_SESSION['qn']<mysqli_num_rows($sql)-1)
		{
			echo "<tr><td><button class='btn waves-effect waves-light' name='submit' value='Next Question'>Next Question</button></td></tr>";
		}
		else
		{
			echo "<tr><td><button class='btn waves-effect waves-light' name=submit value='Finish'>Finish</button></td></tr>";
		}
		echo "</table>";
		echo "</form>";
	
	
?>    
</body>
</html>
