<?php session_start();
        require_once('functions/user.php');
        require_once('functions/alerts.php');
        require_once('functions/redirect.php');
        require_once('functions/token.php');
        require_once('functions/email.php');
//collecting the data

$errorCount = 0;

if(!is_user_LoggedIn()){
    $token=$_POST['token'] !="" ? $_POST['token'] : $errorCount++;
    $_SESSION['token'] =$token;
}

$email=$_POST['email'] !="" ? $_POST['email'] : $errorCount++;
$password=$_POST['password'] !="" ? $_POST['password'] : $errorCount++;


$_SESSION['email'] =$email;

if($errorCount > 0){
   
   $session_error = "you have " . $errorCount . " errors";

   if($errorCount > 1){
    $session_error .= "s";
}

    $session_error  .= " in your form submission";

    set_alert('error',$session_error);


    redirect_to("reset.php");

}else{
        //if(is_user_LoggedIn()){
         //   $checktoken = true;
        //}else{
        //    $checktoken = find_token($email);
       // }
        
        $checktoken = is_user_LoggedIn()? true: find_token($email);

            if($checktoken){

                $userExists = find_user($email);
    
                if($userExists){
                                     
                    $userObject = find_user($email);

                     $userObject->password=password_hash($password, PASSWORD_DEFAULT);
            
                     unlink("db/users/" . $currentuser);
                     unlink("db/tokens/" . $currentuser); //file deleted or user data deleted

                     save_user($userObject);
                                                          
                     set_alert('message'."Password reset Successful, you can now login");

                     $subject = "password reset successful";
                     $message = "Your Account with snh has just been updated, your password has been changed. if you did not initiate password  change, please visit snh.org and reset your password immediately";
                     send_email($subject,$message,$email);

                      
                      redirect_to("Login.php");
                      return;
                    }
            
                
            }
           
            
    }
    set_alert('error',"password reset failed, token/email is invalid or expired");
    redirect_to("Login.php");
    
