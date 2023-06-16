<?php
    session_start();
    require_once('../model/inventoryModel.php');

    $data = $_POST['data'];
    $dataarray = json_decode($data);

    if(isset($_COOKIE['astatus']) && isset($_SESSION['id']) && isset($_SESSION['pass']))
    { 
        $error = false;
        foreach($required as $field) 
        {
            if (empty($field)) 
            {
                $error = true;
                break;
            }
        }   


        if ($error)
        {
            echo "Please enter valid details";
            echo "<br><a href='../view/iadd.php'>Back</a>";
            echo "<br><a href='../view/ahome.php'>Go Home</a>";
        }
        else
        {
           $add = addProduct($dataarray);
        }

        //fclose($file);
    }
    else
    {
        echo "Invalid request";
        echo "<br><a href='../view/login.php'>Login</a>";
    } 
        
?>