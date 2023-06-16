<?php
    session_start();
    require_once('../model/transactionModel.php');
    if(isset($_COOKIE['astatus']) && isset($_SESSION['id']) && isset($_SESSION['pass']))
    {
        // $t_file = fopen('../model/TransactionList.txt','r');
        
        // $netsales = 0;
        $data = netAccounts();
        // echo $data;
        // $netprofit = $netsales - $netcost;
        

    
?>
<html>
    <head>
        <title>Accounts</title>
        <link rel="stylesheet" href="../asset/TableStyle.css">
    </head>

    <body>
        <a href="../view/ahome.php">Go Home</a>

        <table border="1px" style="width:40%">
            <tr><th colspan="2">Monthly Acounts Data</th></tr>
            
            <tr style="height: 30px;">
                <td>Net Sales:</td>
                <td><?php echo $data['netincome']; ?></td>
            </tr>

            <tr style="height: 30px;">
                <td>Net Cost:</td>
                <td><?php echo $data['netcost']; ?></td>
            </tr>

            <tr style="height: 30px;">
                <td>Net Profit:</td>
                <td><?php echo $data['netprofit']; ?></td>
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
