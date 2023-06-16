<html>
    <head>
        <title>
            Login
        </title>
        <script defer src="../asset/LoginScript.js"></script>
        <link rel="stylesheet" href="../asset/loginStyle.css">
    </head>
    <body>
        <!-- <div id="name">WELCOME TO AGROSEED LIMITED</div>  -->
        <div class="center">
        WELCOME TO AGROSEED LIMITED
            <!-- <fieldset> -->
                <p class="title">Login</p>
                <!-- <div id="error"></div> -->
                <form id="loginform" method='post' action="../controller/logincheck.php" enctype="" onsubmit="return LoginValid(this)">
                    <table>
                        <tr><td>Username</td></tr>
                        <tr><td><input type="text" name="username" id="userid" value=""/></td></tr>
                        <tr><td>Password</td></tr>
                        <tr><td><input type="password" name="password" id="pass" value="" placeholder="Password"/></td></tr>
                        <!-- <tr><td><input type="submit" name="submit" class="submitButton" value="Submit"> -->
                        <tr><td><a href="../view/reg.php">Register</a></tr><div id="message" style="color:#e60000"></div></td>
                    </table>
                    <button type="submit">
                        <span class="state">Log in</span>
                    </button>
                </form>
            <!-- </fieldset> -->
        </div>
    
    </body>
</html>