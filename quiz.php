<?php
session_start();
//include("user_nav.php");
include("database.php");
extract($_POST);
extract($_GET);
extract($_SESSION);
extract($_REQUEST);
ini_set('session.bug_compat_warn', 0);
//ini_set('session.bug_compat_42', 0);
mysqli_set_charset($con,"utf8");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
   
        

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Quiz</title>

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
//$tid=$_REQUEST['testid'];

$testid=$_SESSION['setid'];
$query="select * from mst_question";
$rs=mysqli_query($con,"select * from mst_question where set_id = $setid") or die(mysqli_error());
if(!isset($_SESSION['qn']))
{
	$_SESSION['qn']=0;
	mysqli_query($con,"delete from mst_useranswer where sess_id='" . session_id() ."'") or die(mysqli_error());
	$_SESSION['trueans']=0;
	
}
else
{	
		
		if( $_POST['submit']=='Next Question' && isset($ans))
		{
				mysqli_data_seek($rs,$_SESSION['qn']);
				$row= mysqli_fetch_row($rs);	
				mysqli_query($con,"insert into mst_useranswer(sess_id, set_id, que_des, ans1,ans2,ans3,ans4,true_ans,your_ans) values ('".session_id()."',$setid,'$row[2]','$row[3]','$row[4]','$row[5]', '$row[6]','$row[7]','$ans')") or die(mysqli_error());
				if($ans==$row[7])
				{
							$_SESSION['trueans']=$_SESSION['trueans']+1;
				}
				$_SESSION['qn']=$_SESSION['qn']+1;
		}
		else if($submit=='Skip')
		{
			mysqli_data_seek($rs,$_SESSION['qn']);
				$row= mysqli_fetch_row($rs);	
				mysqli_query($con,"insert into mst_useranswer(sess_id, set_id, que_des, ans1,ans2,ans3,ans4,true_ans,your_ans) values ('".session_id()."', $setid,'$row[2]','$row[3]','$row[4]','$row[5]', '$row[6]','$row[7]','0')") or die(mysqli_error());
				/*if($ans==$row[7])
				{
							$_SESSION['trueans']=$_SESSION['trueans']+1;
				}*/
				$_SESSION['qn']=$_SESSION['qn']+1;
			
		}
		else if($submit=='Get Result' && isset($ans))
		{
				mysqli_data_seek($rs,$_SESSION['qn']);
				$row= mysqli_fetch_row($rs);	
				mysqli_query($con,"insert into mst_useranswer(sess_id, set_id, que_des, ans1,ans2,ans3,ans4,true_ans,your_ans) values ('".session_id()."', $setid,'$row[2]','$row[3]','$row[4]','$row[5]', '$row[6]','$row[7]','$ans')") or die(mysqli_error());
				if($ans==$row[7])
				{
							$_SESSION['trueans']=$_SESSION['trueans']+1;
				}
				echo "<h1 align='center' class=head1><font color=purple> Result</font></h1>";
				$_SESSION['qn']=$_SESSION['qn']+1;
				echo "<table class='bordered centered' align='center' style=' background-color: #00acc1; border-radius: 15px; width: 350px;'><tr class=tot><td align='center'><font color=white><b>Total Question<td>". $_SESSION['qn']."</b></font>";
				echo "<tr class=tans><td align='center' style='border-top-right-radius: 15px; border-bottom-right-radius: 15px; background-color: #66bb6a;'><font color=white><b>True Answer<td>".$_SESSION['trueans']."</b></font>";
				$w=$_SESSION['qn']-$_SESSION['trueans'];
				echo "<tr class=fans><td align='center' style='border-top-right-radius: 15px; border-bottom-right-radius: 15px; border-bottom-left-radius: 15px; background-color: #ef5350;'><font color=white><b>Wrong Answer<td> ". $w."</b></font>";
				echo "</table>";
				mysqli_query($con,"insert into mst_result(email,set_id,test_date,score) values('$email',$setid,'".date("d/m/Y")."',$_SESSION[trueans])") or die(mysqli_error());
				if($_SESSION['trueans']>7)
                                {
                                echo "<h1 align=center><a href=review.php> Review Questions</a> </h1>";
                                }
                                echo "<h1 align=center><a href=login.php> End</a> </h1>";
				unset($_SESSION['qn']);
				unset($_SESSION['subid']);
				unset($_SESSION['testid']);
				unset($_SESSION['trueans']);
				exit;
		}
		else if($submit=='Skip/Get Result')
		{
				mysqli_data_seek($rs,$_SESSION['qn']);
				$row= mysqli_fetch_row($rs);	
				mysqli_query($con,"insert into mst_useranswer(sess_id, set_id, que_des, ans1,ans2,ans3,ans4,true_ans,your_ans) values ('".session_id()."', $setid,'$row[2]','$row[3]','$row[4]','$row[5]', '$row[6]','$row[7]','0')") or die(mysqli_error());
				/*if($ans==$row[7])
				{
							$_SESSION['trueans']=$_SESSION['trueans']+1;
				}*/
				echo "<h1 class=head1 align='center'><font color=purple> Result</font></h1>";
				$_SESSION['qn']=$_SESSION['qn']+1;
				echo "<table class='bordered centered' align=center  style=' background-color: #00acc1; border-radius: 15px; width: 350px;'><tr class=tot><td><font color=white><b>Total Question<td> $_SESSION[qn]</b></font>";
				echo "<tr class=tans><td style='border-top-right-radius: 15px; border-bottom-right-radius: 15px; background-color: #66bb6a;'><font color=white><b>True Answer<td>".$_SESSION['trueans']."</b></font>";
				$w=$_SESSION['qn']-$_SESSION['trueans'];
				echo "<tr class=fans><td style='border-top-right-radius: 15px; border-bottom-right-radius: 15px; border-bottom-left-radius: 15px; background-color: #ef5350;'><font color=white><b>Wrong Answer<td> ". $w."</b></font>";
				echo "</table>";
				mysqli_query($con,"insert into mst_result(email,set_id,test_date,score) values('$email',$setid,'".date("d/m/Y")."',$_SESSION[trueans])") or die(mysqli_error());
				if($_SESSION['trueans']>7)
                                {
                                echo "<h1 align=center><a href=review.php> Review Questions</a> </h1>";
                                }
                                echo "<h1 align=center><a href=login.php> End</a> </h1>";
				unset($_SESSION['qn']);
				unset($_SESSION['subid']);
				unset($_SESSION['testid']);
				unset($_SESSION['trueans']);
				exit;
		}
}

//echo $testid;
$rs=mysqli_query($con,"select * from mst_question where set_id=$setid") or die(mysqli_error());
//echo "<br>rows:".mysqli_num_rows($rs);
if($_SESSION['qn']>mysqli_num_rows($rs)-1)
{
	unset($_SESSION['qn']);
	echo "<h1 class=head1>No questions available in this Set</h1>";
	echo "Please <a href=login.php> Start Again</a>";
	
	exit;
}
mysqli_data_seek($rs,$_SESSION['qn']);
$row= mysqli_fetch_row($rs);
//echo "<div style='margin-top: 200px; margin-left: 700px; border-radius: 20px; font-size: 30px; background-color: #f9fbe7; width: auto;'>";
echo "<form name=myfm method=post action='' style='margin-left: 100px; margin-top: 150px; font-size: 25px;'>";
//echo "<table width=100> <tr> <td width=30>&nbsp;<td> <table border=1>";
echo "<table>";
$n=$_SESSION['qn']+1;
echo "<tr><td><b>Que ".  $n .": $row[2]</b></td></tr>";
echo "<tr><td><b><input class='with-gap' type='radio' id='test1' name=ans value=1><label for='test1' style='color: black; font-size: 20px; margin-left: 90px;'>$row[3]</label></a></td></tr>";
echo "<tr><td><b><input class='with-gap' type='radio' id='test2' name=ans value=2><label for='test2' style='color: black; font-size: 20px; margin-left: 90px;'>$row[4]</label></b></td></tr>";
echo "<tr><td><b><input class='with-gap' type='radio' id='test3' name=ans value=3><label for='test3' style='color: black; font-size: 20px; margin-left: 90px;'>$row[5]</label></b></td></tr>";
echo "<tr><td><b><input class='with-gap' type='radio' id='test4' name=ans value=4><label for='test4' style='color: black; font-size: 20px; margin-left: 90px;'> $row[6]</label></b></td></tr>";

//echo "<tr><td class=style8><font color=blue><b><input type=radio name=ans value=4>$row[6]</b></font>";

if($_SESSION['qn']<mysqli_num_rows($rs)-1)
{
echo "<tr><td><button class='btn waves-effect waves-light' name=submit value='Next Question'>Next Question</button>    <button class='btn waves-effect waves-light' name=submit value='Skip'>Skip</button></td></tr></table></form>";
}
else
{
echo "<tr><td><button class='btn waves-effect waves-light' name=submit value='Get Result'>Get Result</button>    <button class='btn waves-effect waves-light' name=submit value='Skip/Get Result'>Skip/Get Result</button></td></tr></table></form>";
}
//echo "</table></table>";
?>
</body>
</html>