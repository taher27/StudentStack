 <?php
 session_start();
 include("./teacher_nav.php");
 include("database.php");
            $testid = $_REQUEST['testid'];
            $setname = $_REQUEST['setname'];
            $sql2 = mysqli_query($con,"insert into quizset (test_id,set_name,total_que) values ($testid,'$setname','10')") or die (mysqli_error($con));
                            if($sql2)
                            {
                                echo "<script>";
                                echo "var x=window.confirm('New Set ADDED successfully');
                                        if (x)
                                        {
                                            window.location='teacher_add_quiz_set.php?testid=$testid';
                                        }
                                        else
                                        {
                                            window.location='teacher_add_quiz_set.php?testid=$testid';
                                        }
                                     ";
                                echo "</script>";
                            }              
          ?>


