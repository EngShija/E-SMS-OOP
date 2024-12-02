 <div class="d-flex justify-content-center mt-5 mb-5 login">
    <form action="controllers/add-student-handler.php" method="POST" class=" col-sm-5 col-lg-5 col-xs-5 was-validated">
    <h4 class="text-center">ADD CLASS</h4>
    <a href='dashboard.php' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
        <div class="form-group">
            <label for="classname">Class Name:</label>
                <input type="classname" class="form-control" name="classname" id="classname" placeholder="Enter Class Name" required autofocus> 
        </div>
        <div class="form-group">
                <button type="submit" class="form-control bg-dark text-light">Submit</button>
        </div>
    </form>
    </div>

    <script>
        $('div{1:div|body}').scrollspy({
            target: '#navId'
        });
    </script>