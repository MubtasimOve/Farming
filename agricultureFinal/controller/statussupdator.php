<?php
    session_start();

    if(isset($_COOKIE['astatus']) && isset($_SESSION['id']) && isset($_SESSION['pass']))
    { 

        $required = array('sID','status');
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
            $id = $_REQUEST['sID'];
            $status = $_REQUEST['status'];
            $a = array();
            
            $file = fopen('../model/TransactionList.txt','r');
            while(!feof($file))
            {
                $data = fgets($file);
                $user = explode("|",$data);

                if($user[0] == $id)
                {
                    $id_found = true;
                    switch($status)
                    {
                        case "Approved":
                            $newdata = str_replace($user[7],$status,$data);
                            array_push($a,$newdata);
                            break;
                        case "Denied":
                            $newdata = str_replace($user[7],$status,$data);
                            array_push($a,$newdata);
                            break;
                       
                    
                    }
                    
                }
                else
                {
                    array_push($a,$data);

                }
            }
            fclose($file);

            if(!$id_found)
            {
                echo "Order does not exist";
                echo "<br><a href='../view/tstatus.php'>Back</a>";
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
            echo "Please enter all details properly";
            echo "<br><a href='../view/editCus.php'>Back</a>";
            echo "<br><a href='../view/ahome.php'>Go Home</a>";
        }
    }
    else
    {
        echo "Invalid request";
        echo "<br><a href='../view/login.php'>Login</a>";
    }    
?>