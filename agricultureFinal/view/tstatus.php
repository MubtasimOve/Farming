<?php
    session_start();
    if(isset($_COOKIE['astatus']) && isset($_SESSION['id']) && isset($_SESSION['pass']))
    {
    
?>
<html>
    <head><title>Transactions</title></head>
    <body>
        <a href="../view/ahome.php">Go Home</a>

        <table border="1px" style="width:85%">
            <tr><th colspan="9">List of Transactions</th></tr>
            <tr>
                <th>Order ID</th><th>Product ID</th><th>Crop Name</th><th>Unit Price</th><th>Customer ID</th><th>Crop Status</th>
                <th>Amount Ordered</th><th>Status</th><th>Price</th>
            </tr>
            <?php
                $file = fopen('../model/TransactionList.txt','r');
        
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
                    <form action="../view/tstatus.php" method="post">
                        <input type="Submit" value="Update Status">
                    </form>
                </td>
                <td>
                    <form action="../view/tremove.php" method="post">
                        <input type="Submit" value="Remove transaction">
                    </form>
                </td>
        </table>

        <fieldset style="width:82.5%">
            <legend>Update Status</legend>
            <form action="../controller/statussupdator.php" method="post">
                <table>
                    
                    <tr>
                        <td>ID: </td>
                        <td><input type="text" name="sID" id="edit" placeholder="Enter ID to Update"/></td>
                    </tr>
                    <tr>
                        <td>Status: </td>
                        <td><input type="radio" name="status" value="Approved">Approved
                        <input type="radio" name="status" value="Denied">Denied</td>
                    </tr>
                    <tr><td><input type="submit" value="Update"></td></tr>
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
