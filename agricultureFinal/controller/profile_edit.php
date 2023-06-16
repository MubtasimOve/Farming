<?php
    session_start();
    require_once("../model/regModel.php");
    require_once("../model/UserModel.php");

    $dataarray = $_POST["data"];
    $userdata = json_decode($dataarray);

    if(isset($_COOKIE['astatus']) && isset($_SESSION['id']) && isset($_SESSION['pass']))
    { 

        // $required = array('heading','toChange');
        $id_found = false;
        // Loop over field names, make sure each one exists and is not empty
        $error = false;
        foreach($userdata as $field) 
        {
            if (empty($field)) 
            {
                $error = true;
                break;
            }
        }

        if(!$error)
        {
            // echo $datauser->name;
            $userupdate = updateData($userdata, $_SESSION['id']);
            // header('location: ../view/profile.php');            
        }
        else
        {
            // echo $datauser->name;
            echo "Please enter all details properly";
            echo "<br><a href='../view/profile.php'>Back</a>";
            echo "<br><a href='../view/ahome.php'>Go Home</a>";
        }
    }
    else
    {
        echo "Invalid request";
        echo "<br><a href='../view/login.php'>Login</a>";
    }    
?>