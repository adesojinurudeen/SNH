<?php session_start(); 
require_once('functions/token.php');
require_once('functions/alerts.php');
require_once('functions/redirect.php');
require_once('functions/email.php');
require_once('functions/user.php');



$errorCount = 0;

$email=$_POST['email'] !="" ? $_POST['email'] : $errorCount++;
$_SESSION['email'] =$email;

if($errorCount>0){

    $session_error = "you have " . $errorCount . " errors" ;
        
    if($errorCount > 1){
        $session_error .= "s";
    }

    $session_error  .= " in your form submission";
      set_alert('error',$session_error);

    header("Location: forget.php");
}else{   
    $allusers = scandir("db/users/");
    $countAllusers= count($allusers);

    for ($counter = 0; $counter < $countAllusers; $counter++) 
    {
        $currentuser = $allusers[$counter];

      if($currentuser==$email . ".json") {
        
        $token = generate_token();
        
        $subject = "password reset link";
        $message = "A password reset has been initiated from your account, if you did not request for reset, please, ignore this message, otherwise, visit: localhost/snh/reset.php?token=". $token;
        
        "CC: ade@snh.org";

        file_put_contents("db/tokens/" .$email . ".json" , json_encode(['token'=>$token]));
    
        send_email($subject,$message,$email);
        die();
        }
    }
    set_alert('error', "Email provided not registered with us" . $email);
   redirect_to("forget.php");
}
?>