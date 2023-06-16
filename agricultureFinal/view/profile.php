<?php
    session_start();
    // include("../asset/editProfile.js");
    require_once("../model/regModel.php");
    if(isset($_COOKIE['astatus']) && isset($_SESSION['id']) && isset($_SESSION['pass']))
    {       

        $userdata = fetchData($_SESSION['id']);        

    
?>
<html>
    <head>
        <title>User Profile</title>
        <script defer src="../asset/ProfileEdit.js"></script>
        <link rel="stylesheet" href="../asset/TableStyle.css">
        
    </head>
    <body>
        <a href="../view/ahome.php">Go Home</a>
        <table border="1px" style="width:40%">

            <tr><th colspan="2">Profile <div id="editButton"><input type="button" name="edit" id="editb" value="edit" onclick="EditOpt()"/></div></th></tr>
            <tr style="height: 30px;">
                <td style="width: 50%;">Name:</td>
                <td>
                    <div id="namediv">
                        <?php echo $userdata[2]; ?>
                    </div>
                </td>
            </tr>

            <tr style="height: 30px;">
                <td>ID:</td>
                <td><?php echo $userdata[0]; ?></td>
            </tr>

            <tr style="height: 30px;">
                <td>Email:</td>
                <td>
                    <div id="emaildiv">
                        <?php echo $userdata[3]; ?>
                    </div>
                </td>
            </tr>

            <tr style="height: 30px;">
                <td>Date Of Birth:</td>
                <td>
                    <div id="dobdiv">
                        <?php echo $userdata[6]; ?>
                    </div>
                </td>
            </tr>

            <tr style="height: 30px;">
                <td>Gender:</td>
                <td>
                    <div id="genderdiv">
                        <?php echo $userdata[7]; ?>
                    </div>
                </td>
            </tr>

            <tr style="height: 30px;">
                <td>Address:</td>
                <td>
                    <div id="addressdiv">
                        <?php echo $userdata[5]; ?>
                    </div>
                </td>
            </tr>

            <tr style="height: 30px;">
                <td>Phone:</td>
                <td>
                    <div id="phonediv">
                        <?php echo $userdata[4]; ?>
                    </div>
                </td>
            </tr>

            <tr style="height: 30px;">
                <td>Degree:</td>
                <td>
                    <div id="degreediv">
                        <?php echo $userdata[8]; ?>
                    </div>
                </td>
            </tr>

            <tr style="height: 30px;">
                <td>Years of experience:</td>
                <td>
                    <div id="epdiv">
                        <?php echo $userdata[9]; ?>
                    </div>
                    years
                </td>
            </tr>

            <tr style="height: 30px;">
                <td>Skills:</td>
                <td>
                    <div id="skillsdiv">
                        <?php echo $userdata[10]; ?>
                    </div>
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
