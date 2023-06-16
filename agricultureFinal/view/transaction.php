<?php
    session_start();
    require_once('../model/transactionModel.php');
    if(isset($_COOKIE['astatus']) && isset($_SESSION['id']) && isset($_SESSION['pass']))
    {
    
?>
<html>
    <head><title>Transactions</title></head>
    <body>
        <a href="../view/ahome.php">Go Home</a>
        <link rel="stylesheet" href="../asset/TableStyle.css">

        <table border="1px" style="width:85%">
            <tr><th colspan="9">List of Transactions</th></tr>
            <tr>
            <th>Order ID</th><th>Product ID</th><th>Crop Name</th><th>Unit Price</th><th>Customer ID</th><th>Crop Status</th>
                <th>Amount Ordered</th><th>Status</th><th>Price</th>
            </tr>
            <?php
                viewTransactions();
            
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
            </tr>
        </table>
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
