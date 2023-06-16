<?php
    session_start();
    require_once('../model/inventoryModel.php');
    if(isset($_COOKIE['astatus']) && isset($_SESSION['id']) && isset($_SESSION['pass']))
    {
    
?>
<html>
    <head><title>Inventory</title></head>
    <body>
        <a href="../view/ahome.php">Go Home</a>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> 
        <script defer src="../asset/InventoryScript.js"></script>
        <link rel="stylesheet" href="../asset/TableStyle.css">
        <table border="1px" style="width:85%" id="table">
            <tr>
                <th colspan="9">List of Crops

                <div id="editUser">
                <table>
                        <tr>
                            <td>
                                <button id="updatebutton" onclick="updateInventory()">
                                    Update Details
                                </button>
                            </td>

                            <td>
                                <input type="button" value="Add Product" onclick="addProduct()">
                            </td>

                            <td>
                                <button id="deletebutton" onclick="deleteInventory()">Delete Product</button>
                                                         
                            </td>

                        </tr>
                 </table>
                </div>
                </th>
            </tr>
            <tr>
                <th>Product ID</th><th>Crop Name</th><th>Unit Price</th><th>Crop Status</th>
                <th>Stock</th>
            </tr>
            <?php

                viewInventory();
            
            ?>
        </table>
        <div id="edit"></div>

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
