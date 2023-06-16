<?php
    session_start();
    if(isset($_COOKIE['astatus']) && isset($_SESSION['id']) && isset($_SESSION['pass']))
    {
    
?>

<html>
    <head>
        <title>Add Manager</title>
    </head>
    <body style="padding-left: 450px;">
        <form action="../controller/addersales.php" method="post" enctype="">
            <fieldset style="width:30%">
                <legend>Add Sales Manager</legend>
                <table>
                    <tr><td>User ID:</td></tr>
                    <tr><td><input type="text" name="id" id="addsales" value="" placeholder="S-001"/></td></tr>
                    
                    <tr><td><br> Personal Information</td></tr>
                   
                    <tr><td>Name:</td></tr>
                    <tr><td><input type="text" name="name" id="addsales" value="" placeholder="Enter your name"/></td></tr>
                    
                    <tr><td>Email:</td></tr>
                    <tr><td><input type="email" name="email" id="addsales" value="" placeholder="user@email.com"/></td></tr>
                    
                    <tr><td>Phone:</td></tr>
                    <tr><td><input type="number" name="phone" id="addsales" value="" placeholder="Phone number"/></td></tr>
                                                          
                    <tr><td>Date of Birth:</td></tr>
                    <tr><td><input type="date" name="dob" id="addsales" value=""/></td></tr>
                    
                    <tr><td>Gender:</td></tr>
                    <tr>
                        <td>
                            <input type="radio" name="gender" id="addsales" value="Male"/>Male
                            <input type="radio" name="gender" id="addsales" value="Female"/>Female
                        </td>
                    </tr>
                    <tr><td><br>Job Details</td></tr>
                    <tr><td>Distribution:</td></tr>
                    <tr><td><input type="text" name="distribution" id="addsales" value="" placeholder="Region Incharge"/></td></tr>
                    <tr>
						<td>Degree:                  
							<select name="degree" id="addsales">
                                <option value="">Choose Degree</option>
								<option value="Marketing">Marketing</option>	
								<option value="Business">Business</option>	
								<option value="IPE">IPE</option>
                                <option value="BBA">BBA</option>
                                <option value="Agro Science">Agro Science</option>
							</select>
						</td>
					</tr>

                    <tr>
						<td>Educaion:                  
							<select name="education" id="addsales">
                                <option value="">Choose Education</option>
								<option value="Bachelors">Bachelors</option>	
								<option value="Masters">Masters</option>
                                <option value="Diploma">Diploma</option>	
							</select>
						</td>
					</tr>

                    <tr><td>Experience:</td></tr>
                    <tr><td><input type="number" name="epyears" id="addsales" value="" placeholder="Years of experience"/> years</td></tr>
                    <tr><td>Salary:</td></tr>
                    <tr><td><input type="number" name="salary" id="addsales" value=""/></td></tr>
                    

                    
                    <tr><td><input type="submit" name="submit" value="Submit"/><a href="sales_manager.php">Back</a></td></tr>
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
