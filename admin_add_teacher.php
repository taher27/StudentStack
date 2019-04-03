<?php
session_start();
include 'admin_nav.php';
include ("database.php");

$sql = mysqli_query($con,"select * from subject");
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
                height: 650px;
                position: absolute;
                top:51%;
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
 
        </style>
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
 
        
        "<div class='container' style='margin-left: 20%;' >
            <div class='container'>
                <!-- backbox -->
 
                <div class='frontbox' style="height: 640px;">
                    <div class='login'>
                        <h2 style="margin: 1px;">ADD TEACHER</h2>
                        
                        <form name="form1" action='<?php echo $_SERVER['PHP_SELF'] ?>' method='POST'  onsubmit="return check()">
                        <div class='inputbox'>
                            <input type='text' name='firstname' placeholder='  FIRSTNAME' required>  
                            <input type='text' name='lastname' placeholder='  LAST NAME' required>
                            <input type='text' name='email' placeholder='  E-MAIL' required>
                            <input type='text' name='password' placeholder='  PASSWORD' required>
                            <input type='text' name='dateofbirth' placeholder='  DOB(DD/MM/YYYY)' required>
                            <p style="margin: 1px;">
                                <label style='font-size: 15px;'>GENDER: </label>
                                <input class='with-gap' name='gender' type='radio' id='test3'value='male' required  />
                                <label for='test3'>MALE</label>
                                <input class='with-gap' name='gender' type='radio' id='test4' value='female' required  />
                                <label for='test4'>FEMALE</label>
                              </p>
                            <br>
                            <input type='text' name='mobileno' placeholder='  MOBILE NUMBER' required>
                             
                            <select name='subject' class='browser-default' required>
                              <option value='' disabled selected>SELECT COURSE</option>";
                                  <?php
                                  while($row1 = mysqli_fetch_row($sql))
                                  {
                                     echo "<option value='$row1[0]'>$row1[1]</option>";
                                  }
                                  ?>
                           </select>
 
                        <input id='loginbutton' type='submit' name='submit' value='PROCEED' />
                        
                    </div>
                            </form>
                </div>
            </div>
            </div>
        <?php
        if(isset($_POST['submit']))
        {
        $email = strtolower($_POST['email']);
        $sql2 = mysqli_query($con, "select * from teacherdetails where email='$email'");
        if(mysqli_num_rows($sql2)>0)
        {
            echo "<script>";
            echo "alert('This user already exists');";
            echo "</script>";
        }
        else
        {
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $password = $_POST['password'];
            $gender = $_POST['gender'];
            $dateofbirth = $_POST['dateofbirth'];;
            $subject = $_POST['subject'];
            $mobile = $_POST['mobileno'];
            
            $insertquery = mysqli_query($con, "insert into teacherdetails (firstname,lastname,email,password,subject,approval,gender,dateofbirth,mobile) values ('$firstname','$lastname','$email','$password','$subject',2,'$gender','$dateofbirth','$mobile')") or die(mysqli_error($con));
            if($insertquery)
            {
                echo "<script>";
                echo "alert('Teacher Account created successfully');";
                echo "</script>";
            }
        }
        }
        ?>
    </body>
</html>


