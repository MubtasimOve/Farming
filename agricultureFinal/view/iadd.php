<html>
    <head>
        <title>Add Farmer</title>
    </head>
    <body >
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

        <form action="../controller/iadder.php" method="post" enctype="">
            <fieldset style="width:30%">
                <legend>Add Crop</legend>
                <table>
                    <tr><td>Crop ID:</td></tr>
                    <tr><td><input type="text" name="id" id="iadd" value="" placeholder="P-001"/></td></tr>
                    
                    <tr><td>Name:</td></tr>
                    <tr><td><input type="text" name="name" id="iadd" value="" placeholder="Enter crop name"/></td></tr>
                    
                    <tr><td>Price:</td></tr>
                    <tr><td><input type="number" name="price" id="iadd" value="" placeholder="Unit Price of crop"/></td></tr>
                    
                    <tr><td>Crop Status:</td></tr>
                    <tr>
                        <td>
                            <input type="radio" name="status" id="iadd" value="Healthy"/>Healthy
                            <input type="radio" name="status" id="iadd" value="Unhealthy"/>Unhealthy
                        </td>                        
                    </tr>
                                                          
                    <tr><td>Stock:</td></tr>
                    <tr><td><input type="number" name="stock" id="iadd" value=""/></td></tr>
                    <tr><td><input type="Submit" name="submit" id="iadd" value="Add Crop"></td></tr>
                </table>
                
            </fieldset>

        </form>
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