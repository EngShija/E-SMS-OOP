<?php
include_once __DIR__ . "/../models/Database.php";
include_once __DIR__ . "/../models/Class.php";
require_once __DIR__ . "/../includes/functions.php";
require_once __DIR__. "/../models/Subject.php";
require_once __DIR__. "/../models/Exam.php";

$class = new StudentClass(new Database());

$subject = new Subject(new Database());

$exam = new Exam(new Database());

$exam->setSchoolId(SCHOOL_ID);

?>

<div class="modal fade" id="addtmt" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form action="controllers/add-timetable-handler.php" method="POST" class=" col-sm-5 col-lg-5 col-xs-5">
            <div class="modal-content">
                <div class="modal-header bg-dark text-light">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">ADD TIMETABLE</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body login">
                    <div class="error-text">

                    </div>
<div class="row">
                    <div class="form-floating mb-3 col-sm-6">
                        <select class="form-control dropdown-toggle" name="class" id="class">
                            <option>Select Class</option>
                            <?php foreach ($class->get_all_classes() as $myClass): ?>
                                <option value="<?= $myClass['class_name'] ?>"><?= $myClass['class_name'] ?></option>
                            <?php endforeach; ?>
                        </select>
                        <label for="class">Class:</label>
                    </div>

                    <div class="form-floating mb-3 col-sm-6">
                        <select class="form-control" name="subject" id="subject">
                            <option>Select Subject</option>
                            <?php foreach ($subject->get_all_subjects() as $mySubject): ?>
                                <option value="<?= $mySubject['sub_name'] ?>"><?= $mySubject['sub_name'] ?></option>
                            <?php endforeach; ?>
                        </select>
                        <label for="subject">Subject:</label>
                    </div>
                    </div>
                    <div class="row">
                    <div class="form-floating mb-3 col-sm-6">
                        <select class="form-control" name="type" id="type">
                            <option>Select type</option>
                            <option value="Exam">Examination</option>
                            <option value="Class">Class</option>
                        </select>
                        <label for="type">Timetable type</label>
                    </div>
                    
                    <div class="form-floating mb-3 col-sm-6">
                        <select class="form-control" name="day" id="day">
                            <option>Select Day</option>
                            <option value="Monday">Monday</option>
                            <option value="Tuesday">Tuesday</option>
                            <option value="Wednesday">Wednesday</option>
                            <option value="Thursday">Thursday</option>
                            <option value="Friday">Friday</option>
                            <option value="Saturday">Saturday</option>
                            <option value="Sunday">Sunday</option>
                        </select>
                        <label for="day">Day</label>
                    </div>
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

                    <div class="row">
                        <div class="form-group mb-3 col-sm-6">
                            <label for="ttime">From:</label>
                            <input type="time" name="start_time" id="ttime" class="form-control">
                        </div>
                        <div class="form-group mb-3 col-sm-6">
                            <label for="etime">To:</label>
                            <input type="time" name="end_time" id="etime" class="form-control">
                        </div>
                    </div>

                    <div class="row">
                    <div class="form-group mb-3 col-sm-6">
                            <label for="date">Exam/Test Date: <span class="text-warning">(for normal class Timetable, leave this field blank)</span></label>
                            <input type="date" name="date" id="date" class="form-control">
                        </div>

                        <div class="form-group mb-3 col-sm-6">
                        <label for="exam">Exam Type: <span class="text-warning">(for normal class Timetable, leave this field blank)</span></label>
                          <select class="form-control" name="exam" id="exam">
                              <option>Select Exam Type</option>
                              <?php foreach ($exam->get_all_exams() as $myExam) : ?>
                                  <option value="<?= $myExam['exam_name'] ?>"><?= $myExam['exam_name'] ?></option>
                              <?php endforeach; ?>
                          </select>
                      </div>
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