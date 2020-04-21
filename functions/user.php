<?php  require_once('alerts.php'); require_once('token.php'); //require_once('user.php');
   function is_user_LoggedIn(){

        if(isset($_SESSION['LoggedIn']) && !empty($_SESSION['LoggedIn'])){
            return true;
        }
        return false;
    }

    function is_token_set(){
        return is_token_set_in_get() || is_token_set_in_session();
    }

    function is_token_set_in_session(){
        return isset($_SESSION['token']);
    }

    function is_token_set_in_get(){
        return isset($_GET['token']);
    }

    function find_User($email = ""){
        //check the database if the user exist
        if(!$email){
            set_alert('error', 'User Email not set');
            die();
        }
        $allusers = scandir("db/users/");
        $countAllusers= count($allusers);

        for ($counter = 0; $counter < $countAllusers; $counter++) {
     
            $currentuser = $allusers[$counter];
    
            if($currentuser== $email . ".json"){
             
             $userString= file_get_contents("db/users/" . $currentuser);
             $userObject= json_decode($userString);
             
              return $userObject;
             
            }  
        }
            return false;
    }

    function save_user($userObject){
    file_put_contents("db/users/". $userObject['email'] . ".json" , json_encode($userObject));
    }

?>