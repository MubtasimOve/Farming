<?php
    session_start();
    if(isset($_COOKIE['astatus']) && isset($_SESSION['id']) && isset($_SESSION['pass']))
    {
    
?>

<html>
    <head>
        <title>Add Farmer</title>
    </head>
    <body style="padding-left: 450px;">
        <form action="../controller/adderfarmers.php" method="post" enctype="">
            <fieldset style="width:30%">
                <legend>Add Farmer</legend>
                <table>
                    <tr><td>User ID:</td></tr>
                    <tr><td><input type="text" name="id" id="addfarmer" value="" placeholder="F-001"/></td></tr>
                    
                    <tr><td><br> Personal Information</td></tr>
                   
                    <tr><td>Name:</td></tr>
                    <tr><td><input type="text" name="name" id="addfarmer" value="" placeholder="Enter your name"/></td></tr>
                    
                    <tr><td>Email:</td></tr>
                    <tr><td><input type="email" name="email" id="addfarmer" value="" placeholder="user@email.com"/></td></tr>
                    
                    <tr><td>Phone:</td></tr>
                    <tr><td><input type="number" name="phone" id="addfarmer" value="" placeholder="Phone number"/></td></tr>
                                                          
                    <tr><td>Date of Birth:</td></tr>
                    <tr><td><input type="date" name="dob" id="addfarmer" value=""/></td></tr>
                    
                    <tr><td>Gender:</td></tr>
                    <tr>
                        <td>
                            <input type="radio" name="gender" id="addfarmer" value="Male"/>Male
                            <input type="radio" name="gender" id="addfarmer" value="Female"/>Female
                        </td>
                    </tr>
                    <tr><td><br>Job Details</td></tr>

                    <tr><td>Number of fields</td></tr>
                    <tr><td><input type="number" name="nfields" id="addfarmer" placeholder="Fields incharge"/></td></tr>

                    <tr><td>Experience:</td></tr>
                    <tr><td><input type="number" name="epyears" id="addfarmer" placeholder="Years of experience"/> years</td></tr>

                    <tr><td>Salary:</td></tr>
                    <tr><td><input type="number" name="salary" id="addfarmer" placeholder="Salary amount"/></td></tr>
                    
                    <tr><td><input type="submit" name="submit" value="Submit"/><a href="farmer.php">Back</a></td></tr>
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
