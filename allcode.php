<?php
session_start();

if(isset($_POST['logout_btn']))
{
    // session_destroy();
    unset($_SESSION['auth']);
    unset($_SESSION['auth_role']);
    unset($_SESSION['auth_role']);
    
    $_SESSION['message'] = "Logged out successfully";
    header("Location: home.php");
    exit(0);
}

?>