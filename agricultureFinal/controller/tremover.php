<?php
    session_start();

    if(isset($_COOKIE['astatus']) && isset($_SESSION['id']) && isset($_SESSION['pass']))
    { 

        $required = array('delID');
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
            $id = $_REQUEST['delID'];
    
            $a = array();
            
            $file = fopen('../model/TransactionList.txt','r');


        
            while(!feof($file))
            {
                $data = fgets($file);
                $user = explode("|",$data);


                if($user[0] == $id)
                {                    
                    $newdata = str_replace($data,'',$data);
                    $id_found = true;
                }
                else
                {
                    array_push($a,$data);

                }
            }
            fclose($file);
            if(!$id_found)
            {
                echo "Please enter Valid ID to delete";
                echo "<br><a href='../view/tremove.php'>Back</a>";
                echo "<br><a href='../view/ahome.php'>Go Home</a>";
            }
            else
            {
                //print_r($a);
                $write = fopen('../model/TransactionList.txt','w');
                //fwrite($write);
                $updated = '';
                foreach($a as $item)
                {
                    $updated = $updated.$item;
                }
                echo $updated;
                fwrite($write,$updated);
                fclose($write);
                //$_SESSION['pass'] = $npass;
                header('location: ../view/transaction.php');
            }
        }
        else
        {
            echo "Please enter ID to delete";
            echo "<br><a href='../view/tremove.php'>Back</a>";
            echo "<br><a href='../view/ahome.php'>Go Home</a>";
        }
    }
    else
    {
        echo "Invalid request";
        echo "<br><a href='../view/login.php'>Login</a>";
    }    
?>