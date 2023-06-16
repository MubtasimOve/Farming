<?php
    require_once('db.php');
       
        function viewFarmer()
        {
            $conn = getconnection();
            $sql = "SELECT * FROM farmerlist ";
            $result = mysqli_query($conn, $sql); 
            $count = mysqli_num_rows($result);

            if($count > 0)
                {
                    while ($user = mysqli_fetch_row($result))
                    {
                        // $user = $result->fetch_array();
                        echo "<tr style='text-align: center' class='data'>";
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

            // $conn = getconnection();
            // $sql = "SELECT * FROM farmerlist ";
            // $result = mysqli_query($conn, $sql); 
            // $count = mysqli_num_rows($result);

            // $tabledata = mysqli_fetch_all($result);
            // print_r($tabledata[1]);
            
        }
    
        function updateData($userdata)
        {
            // $years = $userdata->epyears.' years';
            $conn = getconnection();
		    $sql = "UPDATE farmerlist 
                SET 
                name='{$userdata->name}',
                type='{$userdata->type}',
                gender='{$userdata->gender}',
                email='{$userdata->email}',
                phone='{$userdata->phone}',
                dob='{$userdata->dob}',
                NoOfFields='{$userdata->fields}',
                experience='{$userdata->epyears}',
                salary='{$userdata->salary}' 
                where F_ID='{$userdata->id}';";
            $result = mysqli_query($conn, $sql); 
            // $count = mysqli_num_rows($result);
        }

    function dropFarmer($id)
    {
        $conn = getconnection();
        $sql = "DELETE FROM farmerlist WHERE F_ID='{$id}';";
        $result = mysqli_query($conn, $sql);
    }

?>