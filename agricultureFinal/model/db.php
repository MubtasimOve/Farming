<?php 
    // session_start();
// if(isset($_COOKIE['astatus']) && isset($_SESSION['id']) && isset($_SESSION['pass']))
// {

   $dbserver = "localhost";
   $dbuser = "root";
   $dbpass = "";
   $dbname = "webtechfinal";


    function getconnection(){
        global $dbname;
        global $dbserver;
        global $dbpass;
        global $dbuser;

        return  $conn = mysqli_connect($dbserver, $dbuser, $dbpass, $dbname);
    }
// }
// else
// {
//     echo "Invalid request";
//     echo "<br><a href='../view/login.php'>Login</a>";
// }
?>