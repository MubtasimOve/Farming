<?php
    session_start();
    require_once('../model/inventoryModel.php');
    $id = $_POST['ID'];

    if(isset($_COOKIE['astatus']) && isset($_SESSION['id']) && isset($_SESSION['pass']))
    { 
        if($id != null)
        {
            $delete = deleteProduct($id);
        }
        else
        {
            echo "Please select ID to delete";
            echo "<br><a href='../view/idelete.php'>Back</a>";
            echo "<br><a href='../view/ahome.php'>Go Home</a>";
        }
    }
    else
    {
        echo "Invalid request";
        echo "<br><a href='../view/login.php'>Login</a>";
    }    
?>