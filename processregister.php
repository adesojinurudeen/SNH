<?php
print_r($_POST);
//collecting the data

$first_name=$_POST['first_name'];
$last_name=$_POST['last_name'];
$email=$_POST['email'];
$password=$_POST['password'];
$gender=$_POST['gender'];
$designation=$_POST['designation'];
$department=$_POST['department'];

$errorArray=[];
//verifying the data validation

if($first_name==""){
    $errorArray="first_name cannot be blank";
}

if($last_name==""){
    $errorArray="last_name cannot be blank";
}

if($email==""){
    $errorArray="email cannot be blank";
}

if($password==""){
    $errorArray="password cannot be blank";
}

if($gender==""){
    $errorArray="gender must be selected";
}

if($designation==""){
    $errorArray="you must identify your designation";
}

if($department==""){
    $errorArray="department cannot be blank";
}

print_r($errorArray);
//saving the data into database(folder)

//return back to the page, with status message
?>