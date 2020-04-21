<?php require_once('alerts.php'); require_once('redirect.php'); 

 function send_email(
     $subject ="",
     $message = "",
     $email = ""
     ){

        
        $headers = "From: noReply@snh.org" . "\r\n" .
        "CC: ade@snh.org";

        $try = mail($email,$subject,$message,$headers);

        if($try){
            //send a success message
            set_alert('message', "password reset has been sent to your mail: " . $email);
           header("Location: Login.php");
        }
        else {
            set_alert('error', "something went wrong, we could not send password reset to: " . $email);
            header("Location: forget.php"); 
        }
    }
?>