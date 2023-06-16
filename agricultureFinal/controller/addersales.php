<?php
    session_start();
    require_once('../model/salesModel.php');

    $data = $_POST['data'];
    $userdata = json_decode($data);

    if(isset($_COOKIE['astatus']) && isset($_SESSION['id']) && isset($_SESSION['pass']))
    { 

        // Required field names
        // $required = array('id', 'name','email' ,'phone', 'dob','gender','distribution','degree','education','epyears','salary');
        //$id_found = false;
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


        if ($error)
        {
            echo "Please enter valid details";
            echo "<br><a href='../view/addSalesManager.php'>Back</a>";
            echo "<br><a href='../view/ahome.php'>Go Home</a>";
        }
        else
        {
            addManager($userdata);
        }

        //fclose($file);
    }
    else
    {
        echo "Invalid request";
        echo "<br><a href='../view/login.php'>Login</a>";
    } 
        
?>