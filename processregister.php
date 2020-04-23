<?php session_start();
require_once('functions/user.php');
require_once('functions/alerts.php');

//collecting the data

$errorCount = 0;

//verifying the data validation

$first_name=$_POST['first_name'] != "" ? $_POST['first_name'] : $errorCount++;
$last_name=$_POST['last_name'] !="" ? $_POST['first_name'] : $errorCount++;
$email=$_POST['email'] !="" ? $_POST['email'] : $errorCount++;
$password=$_POST['password'] !="" ? $_POST['password'] : $errorCount++;
$gender=$_POST['gender'] !="" ? $_POST['gender'] : $errorCount++;
$designation=$_POST['designation'] !="" ? $_POST['designation'] : $errorCount++;
$department=$_POST['department'] !="" ? $_POST['department'] : $errorCount++;

$_SESSION['first_name'] = $first_name;
$_SESSION['last_name'] = $last_name;
$_SESSION['email'] = $email;
$_SESSION['gender'] = $gender;
$_SESSION['designation'] = $designation;
$_SESSION['department'] = $department;


if($errorCount > 0){
    
    $session_error = "you have " . $errorCount . " error" ;
        
   if($errorCount > 1){
      $session_error .= "s";
    }

    $session_error  .= " in your form submission";
    $_SESSION["error"] = $session_error;

    header("Location: register.php");


} else{

    //count all users
   // $allusers = scandir("db/users/");
    //$countAllusers= count($allusers);
    
    $newUserId = ($countAllusers-1);

    $userObject= [
        "id"=>$newUserId,
        "first_name"=>$first_name,
        "last_name"=>$last_name,
        "email"=>$email,
        "password"=>password_hash($password, PASSWORD_DEFAULT), //password hashing
        "gender"=>$gender,
        "designation"=>$designation,
        "department"=>$department
    ];

    //check if the user already exists.
     $userExists = find_user($email);
    

      if($userExists){
          $_SESSION["error"] = "Registration failed, user already exist";
          header("Location: register.php");
          die();
      }
    
    }
        //save to database
    
    save_user($userObject);
    $_SESSION["message"] = "Registration Successful, you can now login" . $first_name;
    header("Location: Login.php");



?>