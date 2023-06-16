<?php
    session_start();

    if(isset($_COOKIE['astatus']) && isset($_SESSION['id']) && isset($_SESSION['pass']))
    { 

        // Required field names
        $required = array('id', 'name','email' ,'phone', 'dob','gender', 'nfields', 'epyears');
        //$id_found = false;
        // Loop over field names, make sure each one exists and is not empty
        $error = false;
        foreach($required as $field) 
        {
            if (empty($_POST[$field])) 
            {
                echo $field;
                $error = true;
                break;
            }
        }   


        if ($error)
        {
            
            echo "Please enter valid details";
            echo "<br><a href='../view/addfarmer.php'>Back</a>";
            echo "<br><a href='../view/ahome.php'>Go Home</a>";
        }
        else
        {
            //personal info
            $id = $_REQUEST["id"];
            $name = $_REQUEST["name"];
            $email = $_REQUEST["email"];
            $phone = $_REQUEST["phone"];
            $dob = $_REQUEST["dob"];
            $gender = $_REQUEST["gender"];
            //job details
            //$degree = $_REQUEST["degree"];
            $experience = $_REQUEST["epyears"]." years";
            $nfields = $_REQUEST["nfields"];
            $salary = $_REQUEST["salary"];           

            $file = fopen('../model/farmerList.txt','a');

            $user = $id."|".$name."|"."Farmer"."|".$gender."|".$phone."|".$email."|".$dob."|".$experience."|".$nfields."|".$salary."\r\n";
            
            fwrite($file,$user);
            header('location: ../view/farmer.php');
            fclose($file);
        }

        //fclose($file);
    }
    else
    {
        echo "Invalid request";
        echo "<br><a href='../view/login.php'>Login</a>";
    } 
        
?>