<?php include_once('lib/header.php'); require_once('functions/alerts.php');
if(!isset($_SESSION['LoggedIn'])){
    //redirect to Dashboard
    header("Location: Login.php");
}

?>
 <div class="container">
 <div class="row col-6">        
     <h3>Patients Appointment Form</h3>
 </div>
 <!--<div class="row col-6">
     <p><strong>Patients appointment form</strong></p>
 </div>-->
 <div class="row col-6">
     <p>All fields are required</p>
 </div>
<div class="row col-6">
<form method="POST" action="processbookappointment.php">
     <p>
         <?php print_alert(); ?>
     </p>

     <p> 
         <label class="label" for="Appointment Date">Appointment Date</label><br>
         <input 
         <?php
             if(isset($_SESSION['Appointment Date'])){
                 echo "value=" . $_SESSION['Appointment Date'];
                 
             }
         ?>
        
         type="date" id="appointment date" class="form-control" name="appointment date" placeholder="appointment Date" />
     </p>
     <p> 
         <label class="label" for="Appointment TIme">Appointment Time</label><br> 
         <input
         <?php
             if(isset($_SESSION['Appointment Time'])){
                 echo "value=" . $_SESSION['Appointment Time'];
                 
             }
         ?>

         type="time" id="Appointment Time" class="form-control" name="Appointment Time" placeholder="Appointment Time" />
     </p>
     <p> 
         <label class="label" for="Appointment nature">Appointment Nature</label><br>
         <input 
         <?php
             if(isset($_SESSION['Appointment Nature'])){
                 echo "value=" . $_SESSION['Appointment Nature'];
                 
             }
         ?>
         type="text" id="Appointment nature" class="form-control" name="Appointment Nature" placeholder="Appointment Nature" />
     </p>
     <p> 
         <label class="label" for="initial complain">Initial Complain</label><br> 
         <input type="text" class="form-control" name="initial complain" placeholder="initial complain" />
     </p>
     <p> 
         <label class="label" for="department to visit">Department to visit</label> <br>
         <select class="form-control" name="department to visit" >
             <option value="">Select</option>
             <option
             <?php
             if(isset($_SESSION['department to visit']) && $_SESSION['department to visit'] == 'suggery'){
                 echo "selected";
                 
             }
             ?>
             >surgery</option>
             <option
             <?php
             if(isset($_SESSION['department to visit']) && $_SESSION['department to visit'] == 'damatology'){
                 echo "selected";
                 
             }
             ?>
         >Damatology</option>
         <option
             <?php
             if(isset($_SESSION['department to visit']) && $_SESSION['department to visit'] == 'gynecology'){
                 echo "selected";
                 
             }
             ?>
         >gynecology</option>
         <option
             <?php
             if(isset($_SESSION['department to visit']) && $_SESSION['department to visit'] == 'physciotherapy'){
                 echo "selected";
                 
             }
             ?>
         >physcioteraphy</option>
         <option
             <?php
             if(isset($_SESSION['department to visit']) && $_SESSION['department to visit'] == 'Nephrology'){
                 echo "selected";
                 
             }
             ?>
         >nephrology  </option>
         <option
             <?php
             if(isset($_SESSION['department to visit']) && $_SESSION['department to visit'] == 'dentistry'){
                 echo "selected";
                 
             }
             ?>
         >Dentistry  </option>
         <option
             <?php
             if(isset($_SESSION['department to visit']) && $_SESSION['department to visit'] == 'others'){
                 echo "selected";
                 
             }
             ?>
         >Others 
         <input type="text" class="form-control" name="initial complain" placeholder="please, specify" />
          </option>
         </select>
     </p>
    
     <p>
         <button class="btn btn-sm btn-success" type="submit">Book Appointment</button>
     </p>
     
 </form>
</div>
</div>
<?php include_once('lib/footer.php');?>