<?php
    session_start();
    // echo "sdkfjbnkdgbn ";
    require_once('../model/farmerModel.php');

    $data = $_POST['data'];
    $dataarray = json_decode($data);

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
            $userupdate = updateData($dataarray);
            header('location: ../view/farmer.php');            
        }
        else
        {
            // echo $datauser->name;
            echo "Please enter all details properly";
            echo "<br><a href='../view/farmer.php'>Back</a>";
            echo "<br><a href='../view/ahome.php'>Go Home</a>";
        }
    
    }
    else
    {
        echo "Invalid request";
        echo "<br><a href='../view/login.php'>Login</a>";
    }    
?>