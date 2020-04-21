<?php  require_once('user.php');
//TO DO: TOKEN
function generate_token(){
    $token= "";

      $alphabets=['a','b','c','d','e','f','g','h','A','B','C','D','E','F','G','H'];
      
      for($i=0; $i<26; $i++){
          $index=mt_rand(0,count($alphabets)-1);
          $token .= $alphabets[$index];
        } 

        return $token;
}

    function find_token($email = ''){
        $allusertokens = scandir("db/tokens/");
         $countAllusertokens= count($allusertokens);

        for ($counter = 0; $counter < $countAllusertokens; $counter++) {
     
            $currenttokenfile = $allusertokens[$counter];

            if($currenttokenfile==$email . ".json"){
            
              $tokenContent = file_get_contents("db/tokens/".$currenttokenfile);

             $tokenObject= json_decode($tokenContent);
             //$tokenfromDB=$tokenObject->token;

             return $tokenObject;
            }
        }

            return false;
    }
?>