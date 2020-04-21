<?php include_once('lib/header.php'); require_once('functions/alerts.php');
if(isset($_SESSION['LoggedIn']) && !empty($_SESSION['LoggedIn'])){
    //redirect to Dashboard
    header("Location: dashboard.php");
}

?>
    <div class="container">
        <div class="row col-6">        
            <h3>Register</h3>
        </div>
        <div class="row col-6">
            <p><strong>Welcome, please Register</strong></p>
        </div>
        <div class="row col-6">
            <p>All fields are required</p>
        </div>
     <div class="row col-6">
        <form method="POST" action="processregister.php">
            <p>
                <?php print_alert(); ?>
            </p>

            <p> 
                <label class="label" for="first name">First Name</label><br>
                <input 
                <?php
                    if(isset($_SESSION['first_name'])){
                        echo "value=" . $_SESSION['first_name'];
                        
                    }
                ?>
                type="text" id="first name" class="form-control" name="first_name" placeholder="First Name" />
            </p>
            <p> 
                <label class="label" for="last name">Last Name</label><br> 
                <input
                <?php
                    if(isset($_SESSION['last_name'])){
                        echo "value=" . $_SESSION['last_name'];
                        
                    }
                ?>

                type="text" id="last name" class="form-control" name="last_name" placeholder="Last Name" />
            </p>
            <p> 
                <label class="label" for="email">Email</label><br>
                <input 
                <?php
                    if(isset($_SESSION['email'])){
                        echo "value=" . $_SESSION['email'];
                        
                    }
                ?>
                type="text" id="email" class="form-control" name="email" placeholder="Email" />
            </p>
            <p> 
                <label class="label" for="password">Password</label><br> 
                <input type="password" class="form-control" name="password" placeholder="Password" />
            </p>
            <p> 
                <label class="label" for="gender">Gender</label> <br>
                <select class="form-control" name="gender" >
                    <option value="">Select</option>
                    <option
                    <?php
                    if(isset($_SESSION['gender']) && $_SESSION['gender'] == 'Male'){
                        echo "selected";
                        
                    }
                    ?>
                    >Male</option>
                    <option
                    <?php
                    if(isset($_SESSION['gender']) && $_SESSION['gender'] == 'Female'){
                        echo "selected";
                        
                    }
                    ?>
                >Female</option>
                </select>
            </p>
            <p> 
                <label class="label" for="designation">Designation</label><br>
                <select class="form-control" name="designation" >
                    <option value="">Select one</option>
                    <option
                    <?php
                    if(isset($_SESSION['designation']) && $_SESSION['designation'] == 'Medical Director(MD)'){
                        echo "selected";
                        
                    }
                    ?>
                    >Medical Director(MD)</option>
                    <option
                    <?php
                    if(isset($_SESSION['designation']) && $_SESSION['designation'] == 'Medical Team (MT)'){
                        echo "selected";
                        
                    }
                    ?>
                    >Medical Team (MT)</option>
                    <option
                    <?php
                    if(isset($_SESSION['designation']) && $_SESSION['designation'] == 'Patient'){
                        echo "selected";
                        
                    }
                    ?>
                    >Patient</option>
                </select>
            </p>
            <p> 
                <label class="label" for="department">Department</label><br>
                <input 
                    <?php
                    if(isset($_SESSION['department'])){
                        echo "value=" . $_SESSION['department'];
                        
                    }
            ``   ?>

                type="text" id="department" class="form-control" name="department" placeholder="Department" />
            </p>

            <p>
                <button class="btn btn-sm btn-success" type="submit">Register</button>
            </p>
            <p>
                <a class="p-2 text-primary" href="forget.php">Forget Password</a> <br>
                <a class="p-2 text-primary" href="Login.php">Already have an account, Login</a>
            </p>
            
        </form>
     </div>
  </div>
    <?php include_once('lib/footer.php');?>