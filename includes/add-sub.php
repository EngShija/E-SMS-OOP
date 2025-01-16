<?php
require_once __DIR__ . "/../includes/functions.php";
require_once __DIR__ . "/../models/Subject.php";
$subject = new Subject(new Database());
?>

<div class="modal fade" id="addSub" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-dark text-light">
                <h1 class="modal-title fs-5" id="exampleModalLabel">ADD SUBJECT</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="controllers/add_sub_handler.php" method="POST"
                class=" col-sm-5 col-lg-5 col-xs-5">
                <div class="modal-body login">
                    <div class="error-text">

                    </div>

                    <div class="form-group">
                        <label for="subname">Subject Name:</label>
                        <input type="subname" class="form-control" name="subname" id="subname" placeholder="Enter Subject Name" required autofocus>
                    </div>

                    <div class="form-group">
                          <label for="exam">Subject Category</label>
                          <select class="form-control" name="exam" id="exam">
                              <option>Select Sbject Category</option>
                              <?php foreach ($subject->get_all_subject_categories() as $category) : ?>
                                  <option value="<?= $category['category'] ?>"><?= $category['category'] ?></option>
                              <?php endforeach; ?>
                          </select>
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