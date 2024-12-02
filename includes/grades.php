<div class="d-flex justify-content-center mt-5 mb-5 login">
    <form action="controllers/grades-handler.php" method="POST" class=" col-sm-5 col-lg-5 col-xs-5 was-validated">
    <h4 class="text-center">ADD GRADES</h4>
    <a href='dashboard.php' class='close' data-dismiss='alert' aria-label='close'>&times;</a>

    <div class="myrow">
        <div class="form-group">
            <label for="from">From:</label>
                <input type="text" class="form-control" name="from" id="from" placeholder="Enter Minimum Marks" required autofocus> 
        </div>


        <div class="form-group">
            <label for="to">To:</label>
                <input type="text" class="form-control" name="to" id="to" placeholder="Enter Maximum Marks" required>
        </div>
    </div>
        <div class="myrow">
        <div class="form-group">
            <label for="grade">Grade:</label>
                <input type="text" class="form-control" name="grade" id="grade" placeholder="Enter Range Grade" required>
        </div>
        <div class="form-group">
            <label for="desc">Grade:</label>
                <input type="text" class="form-control" name="desc" id="desc" placeholder="Enter Grade Description" required>
        </div>
        </div>
        <div class="form-group">
                <button type="submit" class="form-control bg-dark text-light" name="submit" value="submit">Submit</button>
        </div>
    </form>
    </div>