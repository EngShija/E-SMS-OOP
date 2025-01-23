<?php
$myStudent = $student->get_student_by_id($_GET['deleteid']);

if(!isset($_GET['deleteid'])){
    redirect_to('dashboard.php?managestd');
}
?>

<div class="d-flex justify-content-center">
    <div class="card text-center mb-3 mt-3" style="width: 20rem;">
        <div class="card-body">       
            <h5 class="mb-0 text-dange">Delete <strong  class="text-black"><?= strtoupper($myStudent['first_name']). " ". strtoupper($myStudent['last_name']) ?></strong></h5>
            <p class="mb-0">Are You Sure? <br> You can not undo this action!</p>
            <div class="modal-footer flex-nowrap p-0">
            <button type="button" class="btn btn-lg btn-link fs-6 text-decoration-none col-6 py-3 m-0 rounded-0 border-end" data-bs-dismiss="modal"><a href="dashboard.php?managestd">Cancel</a></button>
        <button type="button" class="btn btn-lg btn-link fs-6 text-decoration-none col-6 py-3 m-0 rounded-0 "><strong ><a href="controllers/delete-student.php?deleteid=<?= $myStudent['unique_id']?>" class="text-danger">Delete</a></strong></button>
      </div>
            </div>
        </div>
    </div>
