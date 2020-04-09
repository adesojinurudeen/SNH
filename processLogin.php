<?php session_start();

$errorCount = 0;

$email=$_POST['email'] !="" ? $_POST['email'] : $errorCount++;
$password=$_POST['password'] !="" ? $_POST['password'] : $errorCount++;

$_SESSION['email'] =$email;

if($errorCount>0){
    
    $session_error = "you have " . $errorCount . " error";
    
    if($errorCount > 1){
        $session_error .= "s";
    }

    $session_error  .= " in your form submission";
    $_SESSION["error"] = $session_error;
    
     header("Location: Login.php");
    }
else{
    //echo "No errors";

    $allusers = scandir("db/users/");
    $countAllusers= count($allusers);
 
    for ($counter = 0; $counter < $countAllusers; $counter++) {
     
        $currentuser = $allusers[$counter];

        if($currentuser== $email . ".json"){
         
         $userString= file_get_contents("db/users/" . $currentuser);
         $userObject= json_decode($userString);
         $passwordfromDB =$userObject->password;

         $passwordfromUser = password_verify($password, $passwordfromDB);
           
         if($passwordfromDB==$passwordfromUser){
            //redirect to dashboard
            $_SESSION['LoggedIn']=$userObject->id;
            $_SESSION['email']=$userObject->email;
            $_SESSION['fullname']=$userObject->first_name. " ". $userObject->last_name;
            $_SESSION['role']=$userObject->designation;

            header("Location: dashboard.php");      
            die();

            }
         
        }

   }

   $_SESSION["error"]= " Invalid Email or Password";
     header("Location: Login.php");
     die();

}
?>