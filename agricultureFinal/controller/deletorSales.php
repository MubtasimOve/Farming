<?php
    session_start();
    require_once('../model/salesModel.php');
    $id = $_POST["ID"];

    if(isset($_COOKIE['astatus']) && isset($_SESSION['id']) && isset($_SESSION['pass']))
    { 

        
        // Loop over field names, make sure each one exists and is not empty
        $error = false;
        if($id == null)
        {
            $error = true;
        }

        if(!$error)
        {
            $delete = deleteManager($id);
        }
        else
        {
            echo "Please enter ID to delete";
            echo "<br><a href='../view/delSalesManager.php'>Back</a>";
            echo "<br><a href='../view/ahome.php'>Go Home</a>";
        }
    }
    else
    {
        echo "Invalid request";
        echo "<br><a href='../view/login.php'>Login</a>";
    }    
?>