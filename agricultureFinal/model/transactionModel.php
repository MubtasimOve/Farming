<?php
    require_once('db.php');
    if(isset($_COOKIE['astatus']) && isset($_SESSION['id']) && isset($_SESSION['pass']))
    {
    function viewTransactions()
    {
        $conn = getconnection();
        $sql = "SELECT * FROM transactionlist";
        $result = mysqli_query($conn, $sql); 
        $count = mysqli_num_rows($result);   

        if($count > 0)
            {
                while ($user = mysqli_fetch_row($result))
                {
                    // $user = $result->fetch_array();
                    echo "<tr style='text-align: center'>";
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
            echo "<br><a href='../view/ahome.php'>Login</a>";
        }


    }

    function netAccounts()
    {
        $data = array();
        // $conn = getconnection();
        // $sql = "SELECT SUM(price) FROM transactionlist WHERE orderStatus = 'Approved';";
        // $result = mysqli_query($conn, $sql); 

        // $row = $result->fetch_all();
        $data['netincome'] = netIncome();
        $data['netcost'] = netCost();
        $data['netprofit'] = $data['netincome'] - $data['netcost'];
        // print_r($data); 
        return $data;
        



    }

    function netIncome()
    {
        $conn = getconnection();
        $sql = "SELECT SUM(price) FROM transactionlist WHERE orderStatus = 'Approved';";
        $result = mysqli_query($conn, $sql); 

        $row = $result->fetch_all();
        $data = $row[0][0];

        return $data;

    }

    function netCost()
    {
        $conn = getconnection();
        $sql = "SELECT SUM(salary) AS farmersalary FROM farmerlist UNION SELECT SUM(salary) AS salesalary FROM saleslist;";
        $result = mysqli_query($conn, $sql); 
        $row = $result->fetch_all();
        $data = $row[0][0]+$row[1][0];

        return $data;

    }



}
else
{
    echo "Invalid request";
    echo "<br><a href='../view/login.php'>Login</a>";
}
?>