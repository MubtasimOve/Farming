<?php
    // session_start();
    require_once('db.php');
    if(isset($_COOKIE['astatus']) && isset($_SESSION['id']) && isset($_SESSION['pass']))
    {
        function viewCustomers()
        {
            $conn = getconnection();
            $sql = "SELECT * FROM customerlist";
            $result = mysqli_query($conn, $sql); 
            $count = mysqli_num_rows($result);   

            if($count > 0)
                {
                    while ($user = mysqli_fetch_row($result))
                    {
                        // $user = $result->fetch_array();
                        echo "<tr style='text-align: center' class = 'data'>";
                            for($i = 0; $i<count($user); $i++)
                            {
                                //echo "<br>";
                                echo "<td>".$user[$i]."</td>";
                            }
                        echo "</tr>";
                    }
                }
            else
            {
                echo "could not fetch array";
            }


        }
    }
    else
    {
        echo "Invalid request";
        echo "<br><a href='../view/login.php'>Login</a>";
    }
?>