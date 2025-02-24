  <!-- RESULTS -->
  <?php
    include_once "models/Database.php";
    include_once "models/Subject.php";
    include_once "models/Exam.php";
    $subject = new Subject(new Database());
    $exam = new Exam(new Database());
    ?>
  <div class="modal fade" id="addrst" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
      <form action="controllers/add-results-handler.php" method="POST"
      class=" col-sm-5 col-lg-5 col-xs-5">
          <div class="modal-content">
              <div class="modal-header bg-dark text-light">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">ADD RESULTS</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
                  <div class="modal-body login">
                      <div class="error-text">

                      </div>


                      <div class="form-floating mb-3">
                          <select class="form-control" name="exam" id="exam">
                              <option>Select Exam Type</option>
                              <?php foreach ($exam->get_all_exams() as $myExam) : ?>
                                  <option value="<?= $myExam['exam_name'] ?>"><?= $myExam['exam_name'] ?></option>
                              <?php endforeach; ?>
                          </select>
                          <label for="exam">Exam Type:</label>
                      </div>


                      <div class="form-floating mb-3">
                          <select class="form-control" name="yos" id="exam">
                              <option>Select Year Of Study</option>
                              <?php $i = date('Y') - 1; ?>
                              <?php while ($i <= date('Y')) : ?>
                                  <option value="<?= $i ?>"><?= $i ?></option>
                              <?php $i++;
                                endwhile ?>
                          </select>
                          <label for="exam">Year Of Study:</label>
                      </div>

                      <div class="form-floating mb-3">
                          <select class="form-control" name="subject" id="subject">
                              <option>Select Subject</option>
                              <?php foreach ($subject->get_all_subjects() as $mySubject) : ?>
                                  <option value="<?= $mySubject['sub_name'] ?>"><?= $mySubject['sub_name'] ?></option>
                              <?php endforeach; ?>
                          </select>
                          <label for="subject">Subject Name:</label>
                      </div>

                      <div class="form-floating mb-3">
                          <input type="number" class="form-control" name="marks" id="marks" placeholder="Enter Marks Scored" required autofocus>
                          <label for="marks">Marks Scored:</label>
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