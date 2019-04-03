<?php
session_start();
include 'teacher_nav.php';
include ("database.php");
$email = $_SESSION['email'];
$sql = mysqli_query($con, "select * from teacherdetails where email = '$email'") or die(mysqli_error($con));
$row = mysqli_fetch_row($sql);
$subid = $row[5];
$_SESSION['subid'] = $subid;
//echo $subid;
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
 
        
        <div class='container' style='margin-left: 20%;' >
            <div class='container'>
                <!-- backbox -->
 
                <div class='frontbox' style="margin-right: 400px;">
                    <div class='login'>
                        <font color="blue">ADD TUTORIAL (PDF)</font><br>
                        <div class='inputbox'>
                            <?php
                            echo "<form action='' method='POST'>
                            <textarea rows='5' cols='20' name='tutorialname' placeholder='  Tutorial Name' required></textarea>
                            <br><br>
                            <textarea rows='5' cols='20' name='tutorialpath' placeholder='  Tutorial Link' required></textarea>
                        <input id='loginbutton1' type='submit' name='submit' value='ADD' />
                        </form>";
                              ?>
                            
                              <?php
if(isset($_POST['submit']))
{
    $tutorialname = $_POST['tutorialname'];
    $tutorialpath = $_POST['tutorialpath'];
    $insertquery = mysqli_query($con, "insert into tutorial_doc (sub_id,doc_name,doc_path) values ($subid,'$tutorialname','$tutorialpath')") or die(mysqli_error($con));
    if($insertquery)
    {
        
        //echo "Question inserted successfully";
        echo "<script>";
        echo "alert('Tutorial INSERTED successfully');";
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
