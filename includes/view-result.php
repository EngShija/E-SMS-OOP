 
  <!-- RESULTS -->
  <?php
    include_once "models/Database.php";
    include_once "models/Subject.php";
    include_once "models/Exam.php";
    include_once "config/constants.php";
    $subject = new Subject(new Database());
    $exam = new Exam(new Database());
    $exam->setSchoolId($_SESSION[SCHOOL_ID])
    ?>
  <div class="modal fade" id="result" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
      <form action="controllers/view-results-handler.php" method="POST"
      class=" col-sm-5 col-lg-5 col-xs-5">
          <div class="modal-content">
              <div class="modal-header bg-dark text-light">
                  <h1 class="modal-title fs-5 text-center" id="exampleModalLabel">VIEW RESULTS</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
                  <div class="modal-body login">
                      <div class="error-text">

                      </div>


                      <div class="form-floating mb-3">
                          <select class="form-control" name="exam" id="exam">
                              <option>Select Exam type</option>
                              <?php foreach ($exam->get_all_exams() as $myExam) : ?>
                                  <option value="<?= $myExam['exam_name'] ?>"><?= $myExam['exam_name'] ?></option>
                              <?php endforeach; ?>
                          </select>
                          <label for="exam">Exam Type:</label>
                      </div>


                      <div class="form-floating mb-3">
                          <select class="form-control" name="yos" id="exam">
                              <option>Select Year of Study</option>
                              <?php $i = 2020; ?>
                              <?php while ($i <= date('Y')) : ?>
                                  <option value="<?= $i ?>"><?= $i ?></option>
                              <?php $i++;
                                endwhile ?>
                          </select>
                          <label for="exam">Year Of Study:</label>
                      </div>
                  </div>
                  <div class="modal-footer bg-dark">
                      <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                      <div class="button">
                          <button type="submit" class="btn btn-success"  data-bs-toggle="modal" data-bs-target="#resultopt" name="viewresult">Submit</button>
                      </div>
                  </div>
              </form>
          </div>
      </div>
  </div>

