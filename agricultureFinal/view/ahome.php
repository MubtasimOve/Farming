<?php
     session_start();
     if(isset($_COOKIE['astatus']) && isset($_SESSION['id']) && isset($_SESSION['pass']))
     {
// $username = $_REQUEST['name'];
    
?>
<html>
<head><title>Home</title></head>
<link rel="stylesheet" href="../asset/TableStyle.css">
<body>
    <center>
    <table>
    <tr>
        <td><a href="../view/profile.php"> View Profile</a></td>
        <td><a href='../view/passchange.php'>Change Password </a></td>
        <td><a href="../controller/logout.php">Logout</a></td>
        <!-- <td><a href="profile.php"> View Profile</a>&nbsp;</td> -->
</tr>
    </table>
    <h1>Welcome, <?php echo $_SESSION['name']; ?></h1><br>
    <table>
        
        <tr style="text-align: center">            
            <td><a href="farmer.php">View Farmers</a></td>
            <td><a href="sales_manager.php">View Sales Managers</a></td>
            <td><a href="customers.php">View Customers</a></td>
        </tr>
        <tr style="text-align: center">
            <td><a href="transaction.php">Transaction List</a></td>
            <td><a href="inventory.php">Inventory</a></td>
            <td><a href="accounts.php">Accounts</a></td>
        </tr>
        
    </table>
    </center>
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