<?php
session_start();

// destroy login sessions
if(isset($_SESSION['user_id'])){
    session_destroy();
    
    header("Location: login.php");
}

?>