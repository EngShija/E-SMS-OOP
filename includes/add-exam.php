
  <div class="modal fade" id="addexm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
    <form action="controllers/add-exam-handler.php" method="POST"
    class=" col-sm-5 col-lg-5 col-xs-5">
        <div class="modal-content">
            <div class="modal-header bg-dark text-light">
                <h1 class="modal-title fs-5" id="exampleModalLabel">ADD EXAM</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

                <div class="modal-body login">
                    <div class="error-text">

                    </div>

                    <div class="form-floating">
                        <input type="text" class="form-control" name="exam" id="exam" placeholder="Enter Exam Type" required autofocus>
                        <label for="exam">Exam Type:</label>
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

