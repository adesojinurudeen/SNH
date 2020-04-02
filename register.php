<?php include_once('lib/header.php');?>
    Register Form Here
    <p><strong>Welcome, please Register</strong></p>
    <p>All fields are required</p>
    
    <form method="POST" action="processregister.php">
        <p> 
            <label>First Name</label><br>
            <input type="text" name="first_name" placeholder="First Name" required/>
        </p>
        <p> 
            <label>Last Name</label><br> 
            <input type="text" name="last_name" placeholder="Last Name" required/>
        </p>
        <p> 
            <label>Email</label><br>
            <input type="text" name="email" placeholder="Email" required/>
        </p>
        <p> 
            <label>Password</label><br> 
            <input type="password" name="password" placeholder="Password" required/>
        </p>
        <p> 
            <label>Gender</label> <br>
            <select name="gender" required>
                <option value="">select</option>
                <option>Male</option>
                <option>Female</option>
            </select>
        </p>
        <p> 
            <label>Designation</label><br>
            <select name="designation" required>
                <option value="">Select one</option>
                <option>Medical Team (MT)</option>
                <option>Patients</option>
            </select>
        </p>
        <p> 
            <label>Department</label><br>
            <input type="text" name="department" placeholder="Department" required />
        </p>

        <p>
            <button type="submit">Register</button>
        </p>
    </form>
    <?php include_once('lib/footer.php');?>