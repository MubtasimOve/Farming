<?php
    session_start();
    if(isset($_COOKIE['astatus']) && isset($_SESSION['id']) && isset($_SESSION['pass']))
    {
    
?>
<html>
    <head><title>Inventory</title></head>
    <body>
        <a href="../view/ahome.php">Go Home</a>

        <table border="1px" style="width:85%">
            <tr><th colspan="9">List of Crops</th></tr>
            <tr>
                <th>Product ID</th><th>Crop Name</th><th>Unit Price</th><th>Crop Status</th>
                <th>Stock</th>
            </tr>
            <?php
                $file = fopen('../model/inventoryList.txt','r');
        
                $userdata = array();
                while(!feof($file))
                {
                    $data = fgets($file);
                    $user = explode("|",$data);
                    
                    
                    if($data != null)
                    {
                        echo "<tr style='text-align: center'>";
                            for($i = 0; $i<count($user); $i++)
                            {
                                echo "<td>".$user[$i]."</td>";
                            }
                        echo "</tr>";
                    }
                    
                }
                fclose($file);
            
            ?>
        </table>
        <br>
        <table>
            <tr>
                <td>
                    <form action="../view/iupdate.php" method="post">
                        <input type="Submit" value="Update Crop">
                    </form>
                </td>

                <td>
                    <form action="../view/iadd.php" method="post">
                        <input type="Submit" value="Add Crops">
                    </form>
                </td>

                <td>
                    <form action="../view/idelete.php" method="post">
                        <input type="Submit" value="Remove Crop">
                    </form>
                </td>
                <td>
                    <form action="../view/icstatus.php" method="post">
                        <input type="Submit" value="Update Status">
                    </form>
                </td>
            </tr>
        </table>

        <fieldset style="width:82.5%">
            <legend>Update Crop</legend>
            <form action="../controller/iupdator.php" method="post">
                <table>
                    
                    <tr>
                        <td>ID: </td>
                        <td><input type="text" name="changeID" id="edit" placeholder="Enter ID to update"/></td>
                    </tr>
                    <tr>
                        <td>Detail to Update: </td>
                        <td>
                        <select name="heading" id="edit">
                                <option value="">Choose Value</option>
								<option value="Name">Name</option>	
								<option value="Price">Price</option>
                                <option value="Status">Status</option>
                                <option value="Stock">Stock</option>
							</select>
                        </td>
                    </tr>
                    <tr>
                        <td>Change to: </td>
                        <td><input type="text" name="toChange" id="edit" placeholder="Type new data"/></td>
                    </tr>
                    <tr><td><input type="Submit" name="submit" value="Apply changes"></td></tr>
                </table>
            </form>
        </fieldset>

    </body>
</html>
<?php
    }
    else
    {
        echo "Invalid request";
        echo "<br><a href='../view/login.php'>Login</a>";
    }
?>