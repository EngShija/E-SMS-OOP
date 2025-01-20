<?php
require_once __DIR__ . "/../includes/functions.php";
require_once __DIR__ . "/../models/Subject.php";
$subject = new Subject(new Database());
?>

<div class="modal fade" id="addSub" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
    <form action="controllers/add_sub_handler.php" method="POST"
    class=" col-sm-5 col-lg-5 col-xs-5">
        <div class="modal-content">
            <div class="modal-header bg-dark text-light">
                <h1 class="modal-title fs-5" id="exampleModalLabel">ADD SUBJECT</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <div class="modal-body login">
                    <div class="error-text">

                    </div>

                    <div class="form-floating mb-3">
                        <input type="subname" class="form-control" name="subname" id="subname" placeholder="Enter Subject Name" required autofocus>
                        <label for="subname">Subject Name:</label>
                    </div>

                    <div class="form-floating mb-3">
                          <select class="form-control" name="category" id="category">
                              <option>Select Sbject Category</option>
                              <?php foreach ($subject->get_all_subject_categories() as $category) : ?>
                                  <option value="<?= $category['category'] ?>"><?= $category['category'] ?></option>
                              <?php endforeach; ?>
                          </select>
                          <label for="category">Subject Category</label>
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