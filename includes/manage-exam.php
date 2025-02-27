<?php if (count($exam->get_all_exams()) > 0): ?>
    <h1 class="text-center">SUBJECTS</h1>
    <div class="scrollTb">
        <div class=" d-flex justify-content-center">
        <table class="table table-striped table-dark" id="tbId">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Exam type</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                <?php
                $i = 1;
                foreach ($exam->get_all_exams() as $exams): ?>
                    <tr>
                        <td><?= $i ?></td>
                        <td><?= strtoupper($exams['exam_name']) ?></td>
                        <td><a href="dashboard.php?examid=<?= $exams['id'] ?>"  class="btn btn-success" >Edit</a>
                            <?php if ($role['role'] == 'admin'): ?>
                                <a class="btn btn-danger" onclick="confirmDelete('<?= strtoupper($exams['exam_name']) ?>', 'controllers/delete-exam.php?examid=<?= $exams['id'] ?>')">Delete</a>
                            <?php endif ?>
                        </td>

                    </tr>

                    <?php
                    $i++;
                endforeach;
                ?>
            </tbody>
        </table>
        </div>
    </div>
<?php else: ?>
    <h5 class='text-center text-danger mt-5'>No Exams Found!</h5>

<?php endif; ?>