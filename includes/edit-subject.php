<?php
require_once __DIR__ . "/../includes/functions.php";
require_once __DIR__ . "/../models/Subject.php";
$subject = new Subject(new Database());
$mySubject = $subject->get_subject_by_id($_GET['subid']); 
$_SESSION['subid'] = $_GET['subid'];
?>

<div class="modal fade" id="editSub" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
    <form action="controllers/edit-subject-handler.php" method="POST"
    class=" col-sm-5 col-lg-5 col-xs-5">
        <div class="modal-content">
            <div class="modal-header bg-dark text-light">
                <h1 class="modal-title fs-5" id="exampleModalLabel">EDIT SUBJECT GETAILS</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <div class="modal-body login">
                    <div class="error-text">

                    </div>

                    <div class="form-floating mb-3">
                        <input type="subname" class="form-control" name="subname" id="subname" placeholder="Enter Subject Name" value="<?= $mySubject['sub_name'] ?>" required autofocus>
                        <label for="subname">Subject Name:</label>
                    </div>

                    <div class="form-floating mb-3">
                          <select class="form-control" name="subcategory" id="subcategory">
                              <option value="<?= $mySubject['category'] ?>"><?= $mySubject['category'] ?></option>
                              <?php foreach ($subject->get_all_subject_categories() as $category) : ?>
                                  <option value="<?= $category['category'] ?>"><?= $category['category'] ?></option>
                              <?php endforeach; ?>
                          </select>
                          <label for="exam">Subject Category</label>
                      </div>

                </div>
                <div class="modal-footer bg-dark">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    <div class="button">
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>