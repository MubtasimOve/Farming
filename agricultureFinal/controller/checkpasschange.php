<?php
    session_start();
    require_once("../model/UserModel.php");

    if(isset($_COOKIE['astatus']) && isset($_SESSION['id']) && isset($_SESSION['pass']))
    { 
        $cpass = $_REQUEST['currpassword'];
        $npass = $_REQUEST['newpassword'];
        $nconpass = $_REQUEST['newconpassword'];
        $a = array();
        if($cpass == $_SESSION['pass'])
        {
            if($npass == $nconpass)
            {
                $isValid = changePass($nconpass);
                if (!$isValid)
                {
                    echo "Password change unsuccessful";
                    echo "<a href='../view/passchange.php'>Try Again?</a><br>";
                    echo "<a href='../view/ahome.php>Home</a>'";
                }
                else
                {
                    $_SESSION['pass'] = $nconpass;
                    header('location: ../view/ahome.php');
                }

            }
            else
            {?>
                <html>
                Password Does not match <br>
                <a href="../view/passchange.php">Try Again?</a><br>
                <a href="../view/ahome.php">Home</a>
                </html>
            <?php
            }

        }
        else
        {
           ?>
           <html>
                Password invalid <br>
                <a href="../view/passchange.php">Try Again?</a><br>
                <a href="../view/home.php">Home</a>
           </html>

           <?php          
        
        }
    }
    else
    {
        echo "Invalid request";
        echo "<br><a href='../view/login.php'>Login</a>";
    }    
?>