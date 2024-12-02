<!-----ADD TEACHER--->
<div class="d-flex justify-content-center mt-5 mb-5 login">
    <form action="controllers/add-teacher-handler.php" method="POST" class=" col-sm-5 col-lg-5 col-xs-5 was-validated">
    <h4 class="text-center">ADD TEACHER</h4>
    <a href='dashboard.php' class='close' data-dismiss='alert' aria-label='close'>&times;</a>

    <div class="myrow">
        <div class="form-group">
            <label for="fname">First Name:</label>
                <input type="text" class="form-control" name="fname" id="fname" placeholder="Enter First Name" required autofocus> 
        </div>

        <div class="form-group">
            <label for="lname">Last Name:</label>
                <input type="text" class="form-control" name="lname" id="lname" placeholder="Enter Last Name" required>
        </div>
    </div>

    <div class="myrow">
        <div class="form-group">
            <label for="gender">Gender:</label>
                <select class="form-control" name="gender" id="gender">
                <option value="">Select Your Gender:</option>
                  <option value="male">Male</option>
                  <option value="female">Female</option>
                </select>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="Enter Email Address" required>
        </div>
        </div>

        <div class="myrow">
        <div class="form-group">
            <label for="phone">Subject Tought:</label>
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject Tought" required>
        </div>
    
        <div class="form-group">
            <label for="pass">Password:</label>
                <input type="password" class="form-control" name="password" id="pass" placeholder="Enter Parent Relationship" required>
        </div>
    </div>
    <div class="form-group">
                <button type="submit" class="form-control bg-dark text-light">Submit</button>
        </div>

    </form>
    </div>