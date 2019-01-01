<?php
session_start();

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'burger');



define('URLROOT', 'http://trimax.tk');



define('APPROOT', dirname(__FILE__));



require_once 'functions.php';



$objDB = objDB();



$restricted_pages = [
    
    'profile.php',
    'change_password.php',
    'edit_profile.php',
    'logout.php',
     
];



$public_pages = [
    'login.php',
    'register.php',
    'forget_password.php',
];


 

if(!isUserLoggedIn() && in_array($_SERVER['REQUEST_URI'], $restricted_pages, true)){
    setMsg('msg_notify', 'You need to login before accessing this page', 'warning');
    redirect('login.php');
    exit();
}


if(isUserLoggedIn() && in_array($_SERVER['REQUEST_URI'], $public_pages, true)){
    setMsg('msg_notify', 'You need to logout before accessing this page', 'warning');
    redirect('profile.php');
    exit();
}



if(isset($_SESSION['user']) || isset($_COOKIE['user'])){
    $user = isset($_COOKIE['user']) ? unserialize($_COOKIE['user']) : $_SESSION['user'];
}else{
    $user = '';
}

