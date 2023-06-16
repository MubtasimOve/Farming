<?php
    session_start();
    require_once('../model/farmerModel.php');

    if(isset($_COOKIE['astatus']) && isset($_SESSION['id']) && isset($_SESSION['pass']))
    { 
        $id = $_POST['ID'];

        $required = array('ID');
        $id_found = false;
        // Loop over field names, make sure each one exists and is not empty
        $error = false;
        foreach($required as $field) 
        {
            if (empty($_POST[$field])) 
            {
                $error = true;
                break;
            }
        }

        if(!$error)
        {
            // echo $id;
            dropFarmer($id);
            header('location: ../view/farmer.php');
        }
        else
        {
            echo "Please select ID to delete";
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