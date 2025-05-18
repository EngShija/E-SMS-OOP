<?php
include_once __DIR__ . "/../models/Database.php";
include_once __DIR__ . "/../models/Class.php";
require_once __DIR__ . "/../includes/functions.php";
require_once __DIR__. "/../models/Subject.php";
require_once __DIR__. "/../models/Exam.php";

$class = new StudentClass(new Database());

$subject = new Subject(new Database());

$exam = new Exam(new Database());

$class->setSchoolId(SCHOOL_ID);


?>

<div class="modal fade" id="classTmt" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form action="views/class-timetable.php" method="POST" class=" col-sm-5 col-lg-5 col-xs-5">
            <div class="modal-content">
                <div class="modal-header bg-dark text-light">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">ADD TIMETABLE</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body login">
                    <div class="error-text">

                    </div>
                    <div class="form-floating mb-3">
                        <select class="form-control dropdown-toggle" name="class" id="class">
                            <option>Select Class</option>
                            <?php foreach ($class->get_all_classes() as $myClass): ?>
                                <option value="<?= $myClass['class_name'] ?>"><?= $myClass['class_name'] ?></option>
                            <?php endforeach; ?>
                        </select>
                        <label for="class">Class:</label>
                    </div>

                    <div class="form-floating mb-3">
                          <select class="form-control" name="yos" id="yos">
                              <option>Select Year Of Study</option>
                              <?php $i = 2020; ?>
                              <?php while ($i <= date('Y')) : ?>
                                  <option value="<?= $i ?>"><?= $i ?></option>
                              <?php $i++;
                                endwhile ?>
                          </select>
                          <label for="yos">Year Of Study:</label>
                      </div>
                      </div>
                <div class="modal-footer bg-dark">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    <div class="button">
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>