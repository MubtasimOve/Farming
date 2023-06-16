<?php
    session_start();
    require_once('../model/salesModel.php');
    if(isset($_COOKIE['astatus']) && isset($_SESSION['id']) && isset($_SESSION['pass']))
    {
    
?>
<html>
    <head>
        <title>Manager List</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> 
        <script defer src="../asset/ManagerScript.js"></script>
        <link rel="stylesheet" href="../asset/TableStyle.css">
    </head>
    <body>
        <a href="../view/ahome.php">Go Home</a>

        <table border="1px" style="width:85%" id="table">
            <tr>
                <th colspan="12">Sales Manager 
                <div id="editUser">
                <table>
                        <tr>
                            <td>
                                <button id="updatebutton" onclick="updateSales()">
                                    Update Details
                                </button>
                            </td>

                            <td>
                                <input type="button" value="Add Manager" onclick="addManager()">
                            </td>

                            <td>
                                <button id="deletebutton" onclick="deleteManager()">Delete Manager</button>
                                                         
                            </td>

                        </tr>
                 </table>
                </div>
                </th>
            </tr>
            <tr>
                <th>ID</th><th>Name</th><th>User Type</th><th>Distribution</th><th>Gender</th><th>Phone Number</th>
                <th>Email</th><th>Date of Birth</th><th>Experience</th><th>Education</th><th>Degree</th><th>Salary</th>
            </tr>
            <?php

                viewSales();
                
            
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
