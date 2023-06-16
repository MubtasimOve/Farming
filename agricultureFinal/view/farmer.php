<?php
    session_start();
    require_once('../model/farmerModel.php');
    if(isset($_COOKIE['astatus']) && isset($_SESSION['id']) && isset($_SESSION['pass']))
    {
    
?>
<html>
    <head><title>Farmer List</title></head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> 
    <script defer src="../asset/FarmerScript.js"></script>
    <link rel="stylesheet" href="../asset/TableStyle.css">
    <body>
        <a href="../view/ahome.php">Go Home</a>

        <table border="1px" style="width:85%" id="table">
            <tr>
                <th colspan="10">
                Farmer list
                <div id="editUser">
                <table>
                        <tr>
                            <td>
                                <button id="updatebutton" onclick="updateFarmer()">
                                    Update Details
                                </button>
                            </td>

                            <td>
                                <input type="button" value="Add Farmer" onclick="addFarmer()">
                            </td>

                            <td>
                                <button id="deletebutton" onclick="deleteFarmer()">Delete Farmer</button>
                                                         
                            </td>

                        </tr>
                 </table>
                </div>
                </th>
            </tr>
            <tr>
                <th>ID</th><th>Name</th><th>User Type</th><th>Gender</th><th>Phone Number</th>
                <th>Email</th><th>Date of Birth</th><th>Experience</th><th>Number of Fields</th><th>Salary</th>
            </tr>
            <?php

                viewFarmer();
            
            ?>
        </table>
        <br>
        
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
