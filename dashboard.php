<?php include_once('lib/header.php');

require_once('functions/alerts.php'); 
require_once('functions/redirect.php');
require_once('functions/token.php'); 
require_once('functions/user.php');

if(!isset($_SESSION['LoggedIn'])){
    //redirect to Dashboard
   redirect_to("Login.php");
   die();
}


?>
<div>
    <div>
        <h3>Dashboard</h3>

        Welcome, <?php echo $_SESSION['fullname'] ?> You are logged in as (<?php echo 
        $_SESSION['role'] ?>). and your ID is <?php echo $_SESSION['LoggedIn'] ?>
    </div>
    <div>
    <a class="btn btn-bg btn-outline-secondary" href="billpayment.php">Bill Payment</a>
    </div>
    <div>
        <a class="btn btn-bg btn-outline-secondary" href="bookappointment.php">Patients Appointment Form                    </a>
    </div>
</div>
<?php include_once('lib/footer.php');?>