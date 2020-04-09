<?php include_once('lib/header.php');

if(!isset($_SESSION['LoggedIn'])){
    //redirect to Dashboard
    header("Location: login.php");
}


?>
<h3>Dashboard</h3>

Welcome, <?php echo $_SESSION['fullname'] ?> You are logged in as (<?php echo 
$_SESSION['role'] ?>). and your ID is <?php echo $_SESSION['LoggedIn'] ?>

<?php include_once('lib/footer.php');?>