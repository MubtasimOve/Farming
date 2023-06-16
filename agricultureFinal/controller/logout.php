<?php
    
    session_start();    
    setcookie('astatus', 'alogin', time()-10, '/');
    session_unset();
    session_destroy();
    header('location: ../view/login.php');
?>