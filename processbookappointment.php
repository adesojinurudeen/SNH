<?php session_start();


require_once('functions/alerts.php'); 
require_once('functions/redirect.php');
require_once('functions/token.php'); 
require_once('functions/user.php');   

$errorCount = 0;

$email=$_POST['email'] !="" ? $_POST['email'] : $errorCount++;
$password=$_POST['password'] !="" ? $_POST['password'] : $errorCount++;

$_SESSION['email'] = $email;

if($errorCount > 0){
    
    $session_error = "you have " . $errorCount . " error";
    
    if($errorCount > 1){
        $session_error .= "s";
    }

    $session_error  .= " in your appointment form";
    
    set_alert('error'. $session_error);
    
    redirect_to("Login.php");
    
}else{
    //echo "No errors";

  /*  $currentuser = find_User($email);

        if($currentuser){
         
            $userString= file_get_contents("db/users/" . $currentuser->email . ".json");
            $userObject= json_decode($userString);
            $passwordfromDB =$userObject->password;

            $passwordfromUser = password_verify($password, $passwordfromDB);
            
            if($passwordfromDB==$passwordfromUser){
            //redirect to dashboard
            $_SESSION['LoggedIn']=$userObject->id;
            $_SESSION['email']=$userObject->email;
            $_SESSION['fullname']=$userObject->first_name. " ".$userObject->last_name;
            $_SESSION['role']=$userObject->designation;

            redirect_to("dashboard.php");      
            die();

            }*/
         
        }

   set_alert('error', " Invalid Email or Password" );
   redirect_to("bookappointment.php");
   die();

//}
?>