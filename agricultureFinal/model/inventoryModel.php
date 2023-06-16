<?php
    require_once('db.php');
if(isset($_COOKIE['astatus']) && isset($_SESSION['id']) && isset($_SESSION['pass']))
    {        
        function viewInventory()
        {
            $conn = getconnection();
            $sql = "SELECT * FROM inventory";
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
        }

        function updateInventory($userdata)
        {
            $conn = getconnection();
		    $sql = "UPDATE inventory 
                SET 
                cname='{$userdata->name}',
                unitPrice='{$userdata->price}',
                cstatus='{$userdata->status}',
                stock='{$userdata->stock}'
                where productId='{$userdata->id}';"; 
            $result = mysqli_query($conn, $sql); 
            // $count = mysqli_num_rows($result);
            
            if($result)
                {
                    return true;
                }
            else
            {
                echo "could not execute query";
                return false;
            }
        }

        function deleteProduct($id)
        {
            $conn = getconnection();
            $sql = "DELETE FROM inventory WHERE productId='{$id}';";
            $result = mysqli_query($conn, $sql);
        }

        function addProduct($userdata)
        {
            $conn = getconnection();
            $sql = "INSERT INTO inventory 
            VALUES( 
            '{$userdata->id}',
            '{$userdata->name}',
            '{$userdata->price}',
            '{$userdata->status}',
            '{$userdata->stock}');";
            $result = mysqli_query($conn, $sql); 
        }
















    }

else
{
    echo "Invalid request";
    echo "<br><a href='../view/ahome.php'>Home</a>";
}
?>