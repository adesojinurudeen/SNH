<?php session_start();

//collecting the data

$errorCount = 0;

if(!$_SESSION['LoggedIn']){
    $token=$_POST['token'] !="" ? $_POST['token'] : $errorCount++;
    $_SESSION['token'] =$token;
}

$email=$_POST['email'] !="" ? $_POST['email'] : $errorCount++;
$password=$_POST['password'] !="" ? $_POST['password'] : $errorCount++;


$_SESSION['email'] =$email;

if($errorCount>0){
   
   $session_error = "you have " . $errorCount . " errors";

   if($errorCount > 1){
    $session_error .= "s";
}

$session_error  .= " in your form submission";
$_SESSION["error"]=$session_error;

header("Location: reset.php");

}else{
    
    $allusertokens = scandir("db/tokens/");
    $countAllusertokens= count($allusertokens);

    for ($counter = 0; $counter < $countAllusertokens; $counter++) {
     
        $currenttokenfile = $allusertokens[$counter];

        if($currenttokenfile==$email . ".json"){
            //now check if the token in the current file is the same as $token
           $tokenContent = file_get_contents("db/tokens/".$currenttokenfile);

           $tokenObject= json_decode($tokenContent);
           $tokenfromDB=$tokenObject->token;

           if($_SESSION['LoggedIn']){
               $checktoken= true;
              // echo "log in position 1";
            }
               
            else{
                $checktoken=$tokenfromDB==$token;
            }
           // die();

            if($checktoken){
                 $allusers = scandir("db/users/");
                 $countAllusers= count($allusers);
 
                      
                 for ($counter = 0; $counter < $countAllusers; $counter++) {
     
                    $currentuser = $allusers[$counter];
            
                    if($currentuser== $email . ".json"){
                     
                     $userString= file_get_contents("db/users/" . $currentuser);
                     $userObject= json_decode($userString);

                     $userObject->password=password_hash($password, PASSWORD_DEFAULT);
            
                     unlink("db/users/" . $currentuser); //file deleted or user data deleted

                     file_put_contents("db/users/".$email . ".json" , json_encode($userObject));
                                                          
                     $_SESSION["message"] .= "Password reset Successful, you can now login" .$first_name;

                     /**
                      * inform user of password reset
                      */
                     $subject = "password reset successful";
                     $message = "Your Account with snh has just been updated, your password has been changed.
                      if you did not initiate password  change, please visit snh.org and reset your password immediately";
                     $headers = "From: noReply@snh.org" . "\r\n" .
                     "CC: ade@snh.org";

                     $try = mail($email,$subject,$message,$headers);

                     /**
                      * inform user of password reset ends
                      */
                        
                      header("Location: Login.php");
                      die();
                    }
                }
                
            }
           
        }
    
    }

    $_SESSION["error"] = "password reset failed, token/email is invalid or expired";
    header("Location: Login.php");
    
}
