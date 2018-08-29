<?php 
    include_once('./includes/connect.php');
session_start();
    
        if (isset($_SESSION['username']))
        {
                unset($_SESSION['username']);
                
        }

session_destroy();
redirect("admin_login.php");