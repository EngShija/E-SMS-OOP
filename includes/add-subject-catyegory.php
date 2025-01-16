<div class="modal fade" id="subcat" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-dark text-light">
                <h1 class="modal-title fs-5" id="exampleModalLabel">ADD SUBJECT</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="controllers/add_category_handler.php" method="POST"
                class=" col-sm-5 col-lg-5 col-xs-5">
                <div class="modal-body login">
                    <div class="error-text">

                    </div>

                    <div class="form-group">
                        <label for="subcat">Subject Category:</label>
                        <input type="text" class="form-control" name="subcat" id="subcat" placeholder="Enter Subject Category" required autofocus>
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