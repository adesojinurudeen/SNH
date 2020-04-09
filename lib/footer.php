<?php  ?>

<p>
            <a href="index.php">Home</a> |
            <?php if(!isset($_SESSION['LoggedIn'])){ ?>
            <a href="Login.php">Login</a> |
            <a href="register.php">Register</a> |
            <a href="forget.php">Forget Password</a>|
            <?php }else{ ?>

            <a href="logout.php">Logout</a> |
            <a href="reset.php">Reset Password</a>
            <?php } ?>
        </p>
</body>
</html>