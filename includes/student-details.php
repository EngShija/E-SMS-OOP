
<div class="modal fade" id="stddetails" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header bg-dark text-light">
                <h1 class="modal-title fs-5" id="exampleModalLabel">STUDENT DETAILS</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <div class="modal-body">
                    <span><h5>Full Name: </h5><p><?= " ". $student['first_name']. " ". $student['last_name'] ?></p></span>
                    <span><h5>Gender: </h5><p><?= " ". $student['gender'] ?></p></span>
                    <span><h5>Registration Number:</h5><p> <?= " ". $student['reg_no'] ?></p></span>
                    <span><h5>Current Class:</h5><p> <?= " ". $student['class'] ?></p></span>
        </div>
        <div class="modal-footer bg-dark">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>
    </div>
</div>
</div>
