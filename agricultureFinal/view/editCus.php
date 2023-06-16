<?php
    session_start();
    if(isset($_COOKIE['astatus']) && isset($_SESSION['id']) && isset($_SESSION['pass']))
    {
    
?>
<html>
    <head><title>Customers</title></head>
    <body>
        <a href="../view/ahome.php">Go Home</a>

        <table border="1px" style="width:85%">
            <tr><th colspan="8">Customers List</th></tr>
            <tr>
                <th>ID</th><th>Name</th><th>User Type</th><th>Gender</th><th>Phone Number</th>
                <th>Email</th><th>Date of Birth</th><th>Total Expenditure</th>
            </tr>
            <?php
                $file = fopen('../model/customerList.txt','r');
        
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
                    <form action="../view/editCus.php" method="post">
                        <input type="Submit" value="Update details">
                    </form>
                </td>
                <td>
                    <form action="../view/delCus.php" method="post">
                        <input type="Submit" value="Delete Customer">
                    </form>                            
                </td>

            </tr>
        </table>

        <fieldset style="width:82.5%">
            <legend>Update User</legend>
            <form action="../controller/editorCus.php" method="post">
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
								<option value="Phone number"> Phone number</option>
                                <option value="Email">Email</option>
                                <option value="DOB">DOB</option>
                                <option value="Expenditure">Total Expenditure</option>	
							</select>
                        </td>
                    </tr>
                    <tr>
                        <td>Change to: </td>
                        <td><input type="text" name="toChange" id="edit" placeholder="Type new data"/></td>
                    </tr>
                    <tr><td><input type="Submit" name="submit" value="Apply changes"></td></tr>
                </table>
            
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
