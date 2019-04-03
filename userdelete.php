<?php
session_start();
$email = $_SESSION['email'];
//echo $email;
//echo $id;
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
 
       <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
        
        <link rel="stylesheet" type="text/css" href="ss.css">
    </head>

 
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="js/materialize.min.js"></script>
    <body background="images/background.jpg" height="100"  >
        <div class="container">
            <div class="container">
                <div class="frontbox" style="margin-right: 150px; border-style: solid; border-width: 2px; border-radius: 15px; border-color:#01579b ">
                    <div class="login">
                        <div class="inputbox">
                            <?php
                            echo "<h2>$email <br> Are you Sure You want to delete your Account</h2>";
                            ?>
                            <br><br><br>
                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                                <input type="submit" name="yes" value="YES" style="border-style: solid; border-width: 2px; border-color: green;"/>
                                <input type="submit" name="no" value="NO" style="border-style: solid; border-width: 2px; border-color: red;" />
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
<?php
if(isset($_POST['yes']))
{
    include("database.php");
    //$id = $_REQUEST['id'];
    $query = mysqli_query($con,"delete from userdetails where email='$email'");
    if($query)
    {
        echo" <script>
        var x=window.confirm('Account deleted successfully!');
        if(x){
            window.location='index.php';
        }
        else{
            window.location='index.php';
        }
        
        </script>";
        //echo "account successfully deleted";
    session_destroy();
    }
    else
    {
        echo mysqli_error($con);
    }
    
}
else if(isset($_POST['no']))
{
    echo "<script>window.location='login.php?email=$email';</script>";
}
?>

