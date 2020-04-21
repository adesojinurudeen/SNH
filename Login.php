
<?php include_once('lib/header.php');
    require_once('functions/alerts.php');


if(isset($_SESSION['LoggedIn']) && !empty($_SESSION['LoggedIn'])){
    //redirect to Dashboard
    header("Location: dashboard.php");
}

//include_once('lib/header.php');

?>

    <div class="container">  
        <div class="row col-6">
            <h3>Login</h3>
        </div>
        <div class="row col-6">
            <p>
                <?php print_alert();  ?>
            </p>

            <form method="POST" action="processLogin.php">
            
                <p> 
                    <label>Email</label><br>
                    <input 
                        <?php
                        if(isset($_SESSION['email'])){
                            echo "value=" . $_SESSION['email'];
                            
                        }
                        ?>
                    type="text" class="form-control" name="email" placeholder="Email" />
                </p>
                <p> 
                    <label>Password</label><br> 
                    <input type="password" class="form-control" name="password" placeholder="Password" />
                </p>
                        
                <p>
                    <button class="btn btn-sm btn-primary" type="submit">Login</button>
                </p>

                <p>
                <a class="p-2 text-primary" href="forget.php">Forget Password</a> <br>
                <a class="p-2 text-primary" href="register.php">You don't have an account, Register</a>
            </p>
            </form>
        </div>
    </div>
<?php include_once('lib/footer.php');?>