<?php session_start(); require_once('functions/alert.php');

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

    header("Location: forget.php");}
else{    //count all users
    $allusers = scandir("db/users/");
    $countAllusers= count($allusers);

    for ($counter = 0; $counter < $countAllusers; $counter++) 
    {
        $currentuser = $allusers[$counter];

      if($currentuser==$email . ".json") {
         //send the email and redirect to the reset password page

         /**
        *generating token code starts
       */
      $token= "";

      $alphabets=['a','b','c','d','e','f','g','h','A','B','C','D','E','F','G','H'];
      
      for($i=0; $i<26; $i++){
          $index=mt_rand(0,count($alphabets)-1);
          $token .= $alphabets[$index];
        } 
        
        /**
       * 
       * code generating ends here
       */

        $subject = "password reset link";
        $message = "A password reset has been initiated from your account, if you did not request for reset, 
        please, ignore this message, otherwise, visit: localhost/snh/reset.php?token=". $token;
        $headers = "From: noReply@snh.org" . "\r\n" .
        "CC: ade@snh.org";

        file_put_contents("db/tokens/" .$email . ".json" , json_encode(['token'=>$token]));
    
        $try = mail($email,$subject,$message,$headers);

         
        if($try){
                //send a success message
                $_SESSION["message"] = "password reset has been sent to your mail: " . $email;
               header("Location: Login.php"); }
            else {
            //display error message
              $_SESSION["error"] = "something went wrong, we could not send password reset to: " . $email;
               header("Location: forget.php"); }
        die();
        }
    }
   $_SESSION["error"] = "email provided not registered with us" . $email;
   header("Location: forget.php");
}
?>