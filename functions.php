<?php

function objDB(){
    
    $objDB = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    
    if($objDB->connect_error){
      die("Connection not established");
    }
    
    return $objDB;
}



function upload_image($image){
    
  if(!is_dir(APPROOT.'/images')){
       mkdir(APPROOT.'/images');
  }

  if($image['error']==4){
      die('image file not uploaded');
  }
  
  if($image['type']!='image/png'){
       die('Only, png image files are allowed');
  }
    
  $image_info = pathinfo($image['name']);
  extract($image_info);
  $image_convention = $filename . time() . ".$extension";

  if(move_uploaded_file($image['tmp_name'], APPROOT . "/images/" . $imageConvention)){
      return $image_convention;
  }else{
      return false;
  }  
    
}


function cTime($timestamp){
    return date('j F, Y', $timestamp);
}



function checkUserByEmail($email){
    
    $objDB = objDB();
    
     $stmt = $objDB->prepare(
            'SELECT * FROM users WHERE email=?'
     );
    
     
     $stmt->bind_param('s', $email);
    
    
     $stmt->execute();
    
     
    
     $stmt->store_result();
    
     
     return $stmt->num_rows;
}



function checkUserByUsername($username){
    
    $objDB = objDB();
    
   
     $stmt = $objDB->prepare(
            'SELECT * FROM users WHERE username=?'
     );
    
     $stmt->bind_param('s', $username);
    
     $stmt->execute();
    
     $stmt->store_result();
    
     return $stmt->num_rows;
}




function checkUserActivation($username){
    
    $objDB = objDB();
    
    
     $stmt = $objDB->prepare(
            'SELECT * FROM users WHERE username=? AND is_active=1'
     );
    
     $stmt->bind_param('s', $username);
    
     $stmt->execute();
    
     $stmt->store_result();
    
     return $stmt->num_rows;
}


function redirect($file){
    header("Location:".URLROOT.'/'.$file); 
}



function setMsg($name, $value, $class = 'success'){
    if(is_array($value)){
        $_SESSION[$name] = $value;
    }else{
        $_SESSION[$name] = "<div class='alert alert-$class text-center'>$value</div>";
    }

}


function getMsg($name){
    if(isset($_SESSION[$name])){
        $session=$_SESSION[$name];
        unset($_SESSION[$name]);
        return $session;
    }
}


function getUserById($user_id){
    
    $objDB = objDB();
    
    
     $stmt = $objDB->prepare(
            'SELECT * FROM users WHERE id=?'
     );
    
     $stmt->bind_param('i', $user_id);
    
     $stmt->execute();
    
    
     $result = $stmt->get_result();
    
     return $result->fetch_object();
}



function verifyUserAccount($code){
    
    $objDB = objDB();
    
  
     $stmt = $objDB->prepare(
            "UPDATE users SET is_active = 1 , reset_code = '' WHERE reset_code = ?"
     );
    
     $stmt->bind_param('s', $code);
    
     $stmt->execute();
    
     $stmt->store_result();
    
     return $stmt->affected_rows;
}



function checkUserByCode($code){
    
    $objDB = objDB();
    
    
     $stmt = $objDB->prepare(
            'SELECT * FROM users WHERE reset_code = ?'
     );
    
     $stmt->bind_param('s', $code);
    
     $stmt->execute();
    
     $stmt->store_result();
    
     return $stmt->num_rows;
}


function isUserLoggedIn(){
    if(isset($_SESSION['user']) || isset($_COOKIE['user'])){
        return true;
    }else{
        return false;
    }
}





 
function send_mail($detail=array()){


    if(!empty($detail['to']) && !empty($detail['message']) && !empty($detail['subject']) && !empty($detail['from'])){
        $mail = new PHPMailer(true); 
        //$mail->SMTPDebug = 2;                                 // Enable verbose debug output
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'your-smtp-host';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'username-smtp';                 // SMTP username
        $mail->Password = 'password-smtp';                           // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                    // TCP port to connect to

        //Recipients
        $mail->setFrom('no-reply@proteinwriter.com', $detail['from']);
        $mail->addAddress($detail['to'], '');     // Add a recipient

        //Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = $detail['subject'];
        $mail->Body    = $detail['message'];
        //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            if(!$mail->send()) {
              return false;
            } else {
                return true;
            }

    }else{

        die('Your Mail Handler requires four main paramters');

    }
   


}
