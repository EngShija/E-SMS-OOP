<div class="modal fade" id="addcls" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
    <form action="controllers/add-class-handler.php" method="POST"
    class=" col-sm-5 col-lg-5 col-xs-5">
        <div class="modal-content">
            <div class="modal-header bg-dark text-light">
                <h1 class="modal-title fs-5 text-center" id="exampleModalLabel">ADD CLASS</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <div class="modal-body login">
                    <div class="error-text">

                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="className" id="className" placeholder="Enter Class Name" required autofocus>
                        <label for="className">Class Name:</label>
                    </div>

                </div>
                <div class="modal-footer bg-dark">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    <div class="button">
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>