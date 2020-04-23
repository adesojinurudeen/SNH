<?php  include_once('lib/header.php'); 
require_once('functions/alerts.php');
require_once('functions/user.php');
require_once('functions/email.php');
require_once('functions/token.php');

 //TO DO: fix session error message display on login page

 if(!is_user_LoggedIn() && !is_token_set()){
    $_SESSION["error"] = "you are  not authorized to view that page";
    header("Location: Login.php");
 }

 //check if token matches the set email in our database

 ?>

     <h3> Reset Password</h3>
    <p>Reset password associated with your account : [email]</p>

    <form action="processreset.php" method="POST" >  

        <p>
            <?php print_alert();?>
        </p>
            <?php if(!is_user_LoggedIn()) { ?>
        <input 
            <?php
                if(is_token_set_in_session()){
                   echo "value='" . $_SESSION['token'] . "'";
                }else{
                    echo "value='" . $_GET['token'] . "'";
                }
            ?>
            
            type="hidden" name="token"/>
            <?php } ?>
        <p>
            <label>Email</label><br>
            <input

                <?php
                     if(isset($_SESSION['email'])){
                           echo "value=" . $_SESSION['email'];
                        }
                ?>
            
             type="text" name="email" placeholder="Email" />
        </p>
    
        <p> 
            <label>Enter New Password</label><br> 
            <input type="password" name="password" placeholder="Password" />
        </p>
        <p>
            <button type="submit">Reset password</button>
        </p>
    
    </form>

<?php include_once('lib/footer.php'); ?>