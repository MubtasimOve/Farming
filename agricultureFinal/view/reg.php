<html>
    <head>
        <title>Registration</title>
        <!-- <link rel="stylesheet" href="../asset/TableStyle.css"> -->
    </head>
    <!-- <body style="padding-left: 420px;"> -->
    <body>
        <form action="../controller/regcheck.php" method="post" enctype="">
            <fieldset style="width:43%">
                <legend>Admin Registration</legend>
                <table>
                    <tr><td>User ID:</td></tr>
                    <tr><td><input type="text" name="id" id="login" value="" placeholder="A-001"/></td></tr>
                    
                    <tr><td><br> Personal Information</td></tr>
                   
                    <tr><td>Name:</td></tr>
                    <tr><td><input type="text" name="name" id="login" value="" placeholder="Enter your name"/></td></tr>
                    
                    <tr><td>Email:</td></tr>
                    <tr><td><input type="email" name="email" id="login" value="" placeholder="user@email.com"/></td></tr>
                    
                    <tr><td>Phone:</td></tr>
                    <tr><td><input type="number" name="phone" id="login" value="" placeholder="Phone number"/></td></tr>
                    
                    <tr><td>Address:</td></tr>
                    <tr><td><textarea name="address" id="login" cols="21" rows="3" placeholder="Address"></textarea></td></tr>
                    
                    <tr><td>Date of Birth:</td></tr>
                    <tr><td><input type="date" name="dob" id="login" value=""/></td></tr>
                    
                    <tr><td>Gender:</td></tr>
                    <tr>
                        <td>
                            <input type="radio" name="gender" id="login" value="Male"/>Male
                            <input type="radio" name="gender" id="login" value="Female"/>Female
                        </td>
                    </tr>
                    <tr><td><br>Job Details</td></tr>
                    <tr>
						<td>Degree:                  
							<select name="degree" id="login">
                                <option value="">Choose Degree</option>
								<option value="Agriculture">            Agriculture</option>	
								<option value="Biology">                Biology</option>	
								<option value="Environmental Sciences"> Environmental Sciences</option>
                                <option value="Chemistry">              Chemistry</option>
                                <option value="Business Management">    Business Management</option>
                                <option value="Marketing">              Marketing</option>	
							</select>
						</td>
					</tr>
                    <tr><td>Experience:</td></tr>
                    <tr><td><input type="number" name="epyears" id="login" value="" placeholder="Years of experience"/> years</td></tr>
                    <tr><td>Skills:</td></tr>
                </table>
					<table>
                        <tr>	
                            <td ><input type="checkbox" name="skills[]" value="Data"> Data </td>
                            <td ><input type="checkbox" name="skills[]" value="Inventory"> Inventory</td>
                            <td ><input type="checkbox" name="skills[]" value="Technical"> Technical</td>
                        <tr>
                            <td ><input type="checkbox" name="skills[]" value="Management"> Management</td>
                            <td ><input type="checkbox" name="skills[]" value="Leadership"> Leadership</td>
                            <td ><input type="checkbox" name="skills[]" value="IT"> IT</td>
                        </tr>
                            <td>
                                <input type="checkbox" name="skills[]" value="Finance"> Finance
                            </td>
                        </tr>
                    </table>
                    <table>
                    <tr><td>Password:</td></tr>
                    <tr><td><input type="password" name="password" id="login" value="" placeholder="Enter your password"/></td></tr>
                    
                    <tr><td>Confirm password:</td></tr>
                    <tr><td><input type="password" name="conpassword" id="login" value="" placeholder="Re-enter your password"/></td></tr>
                    
                    <tr><td><input type="submit" name="submit" value="Submit"/><a href="login.php">Login</a></td></tr>
                    </table>
                
            </fieldset>

        </form>
    </body>
</html>