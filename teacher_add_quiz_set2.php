<?php
session_start();
include 'teacher_nav.php';
include ("database.php");
//$email = $_SESSION['email'];
$setid = $_REQUEST['setid'];
//echo $email."<br>".$setid;
$sql = mysqli_query($con, "select * from quizset where set_id = $setid");
$row = mysqli_fetch_row($sql);
$sql2 = mysqli_query($con, "select * from quizlevel where test_id = $row[1]");
$row2 = mysqli_fetch_row($sql2);
$sql3 = mysqli_query($con,"select * from mst_question where set_id = $setid");
$totalquestions = mysqli_num_rows($sql3);
if($totalquestions>=10)
{
    echo "<script>";
        echo "var x=window.confirm('This Set already has 10 questions, You cannot add more questons to this set');
              if (x)
              {
              window.location='teacher_add_quiz_set.php?testid=$row[1]';
              }
              else
              {
                window.location='teacher_add_quiz_set.php?testid=$row[1]';
              }
              ";
        echo "</script>";
}
?>
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
 
        <link rel="stylesheet" type="text/css" href="ss.css">
       <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
 
    </head>
    <body background="images/background.jpg" height="100"  >
 
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="js/materialize.min.js"></script>
 
        
        <div class='container1' style='margin-left: 20%;' >
            <div class='container1'>
                <!-- backbox -->
 
                <div class='frontbox1' style="height: 95%; margin-top: 15px;">
                    <div class='login1'>
                        <font color="blue">ADD QUESTION</font><br>
                        <h2><?php echo strtoupper($row2[2])." ".strtoupper($row[2]); ?></h2>
                        <div class='inputbox1'>
                            <?php
                            echo "<form action='' method='POST'>
                            <label>Total Questions : $totalquestions</label>
                            <textarea rows='5' cols='20' name='question' placeholder='  Question' required></textarea>
                            <input type='text' name='option1' placeholder='  Option1' required>
                            <input type='text' name='option2' placeholder='  Option2' required>
                            <input type='text' name='option3' placeholder='  Option3' required>
                            <input type='text' name='option4' placeholder='  Option4' required>
                            <input type='number'  name='trueans' placeholder='  Correct Option Number' required>
                        <input id='loginbutton1' type='submit' name='submit' value='ADD' />
                        </form>";
                              ?>
                            
                              <?php
if(isset($_POST['submit']))
{
    $question = $_POST['question'];
    $option1 = $_POST['option1'];
    $option2 = $_POST['option2'];
    $option3 = $_POST['option3'];
    $option4 = $_POST['option4'];
    $trueans = $_POST['trueans'];
    //echo $question.$option1.$option2.$option3.$option4.$trueans;
    
    $insertquery = mysqli_query($con, "insert into mst_question (set_id,que_desc,ans1,ans2,ans3,ans4,true_ans) values ($setid,'$question','$option1','$option2','$option3','$option4',$trueans)") or die(mysqli_error($con));
    if($insertquery)
    {
        
        //echo "Question inserted successfully";
        echo "<script>";
        echo "var x=window.confirm('Question INSERTED successfully');
              if (x)
              {
              window.location='teacher_add_quiz_set2.php?setid=$setid';
              }
              else
              {
                window.location='teacher_add_quiz_set2.php?setid=$setid';
              }
              ";
        echo "</script>";
        
    }
    else
    {
        mysqli_error($con);
    }
}
?>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </body>
</html>
