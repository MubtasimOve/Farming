<?php

    require_once('../model/regModel.php');
    require_once('../model/UserModel.php');
    // Required field names
    $id = $_REQUEST["id"];
    $required = array('id', 'password', 'conpassword', 'name','email' ,'phone', 'address','dob','gender','degree','epyears','skills');
    // $iderror = false;
    // Loop over field names, make sure each one exists and is not empty
    $error = false;
    $ierror = false;
    foreach($required as $field) 
    {
        if (empty($_POST[$field])) 
        {
            $error = true;
            break;
        }
    }  
    
    // check id error
    $ierror = userCheck($id);


    if($ierror)
    {
        echo "Chosen ID already exist.";
        echo "<br><a href='../view/reg.php'>Try Again?</a>";
        echo "<br><a href='../view/login.php'>Login</a>";
    }
    else
    {

        if ($error)
        {
            echo "Please enter valid details";
            echo "<br><a href='../view/reg.php'>Try Again?</a>";
            echo "<br><a href='../view/login.php'>Login</a>";
        }
        else
        {
            //personal info
            $id = $_REQUEST["id"];
            $pass = $_REQUEST["password"];
            $cpass = $_REQUEST["conpassword"];
            $name = $_REQUEST["name"];
            $email = $_REQUEST["email"];
            $phone = $_REQUEST["phone"];
            $address = $_REQUEST["address"];
            $dob = $_REQUEST["dob"];
            $gender = $_REQUEST["gender"];
            //job details
            $degree = $_REQUEST["degree"];
            $experience = $_REQUEST["epyears"];
            $listofskills = $_REQUEST["skills"];

            if ($pass != $cpass)
            {
                echo "Password does not match";
            }
            else
            {
                $skills = '';
                foreach($listofskills as $item)
                {
                    if ($item == null)
                    {
                        continue;
                    }
                    else
                    {
                        $skills = $skills." ".$item;
        
                    }
                    
                }

                $user = [$id,$pass,$name,$email,$phone,$address,$dob,$gender,$degree,$experience,$skills];
                // $logindata = $id."|".$pass."|".$name."\r\n";
                // $userskills = $id."|".$name."|".$skills."\r\n";

                $reg = registration($user);
                if($reg)
                    header("location: ../view/login.php");
                else
                    echo "registration unsuccessfull";
                
            }            
        }
    }
?>