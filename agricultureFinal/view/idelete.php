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
            <legend>Delete Crop</legend>
            <form action="../controller/ideletor.php" method="post">
                <table>
                    
                    <tr>
                        <td>ID: </td>
                        <td><input type="text" name="delID" id="edit" placeholder="Enter ID to delete"/></td>
                    </tr>
                    <tr><td><input type="Submit" name="submit" value="Remove"></td></tr>
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
