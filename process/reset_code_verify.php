<?php
require_once '../config.php';



if(isset($_GET['reset_code'])){
    
    $code = filter_input(INPUT_GET, 'reset_code', FILTER_SANITIZE_STRING);
    
    if(checkUserByCode($code)){
        $_SESSION['reset_code'] = $code;
        redirect('reset_password.php');
        exit();
        
    }else{
        
        setMsg('msg_notify', 'Invalid Reset Code.', 'warning');
       
    }

}else{
    setMsg('msg_notify', 'Reset password code empty.', 'warning');
    
}

 redirect('login.php');
 exit();


