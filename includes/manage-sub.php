<?php if (count($subject->get_all_subjects()) > 0): ?>
    <h1 class="text-center">SUBJECTS</h1>
    <div class="scrollTb">
        <div class=" d-flex justify-content-center">
        <table class="table table-striped table-dark" id="tbId">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Subject Name</th>
                    <th>Subject Category</th>
                    <th>Actions</th>

                </tr>
            </thead>

            <tbody>
                <?php
                $i = 1;
                foreach ($subject->get_all_subjects() as $subjects): ?>
                    <tr>
                        <td><?= $i ?></td>
                        <td><?= $subjects['sub_name'] ?></td>
                        <td><?= $subjects['category'] ?></td>
                        <td><a href="dashboard.php?subid=<?= $subjects['id'] ?>"  class="btn btn-success" >Edit</a>
                            <?php if ($role['role'] == 'admin'): ?>
                                <a href="controllers/delete-subject.php?subid=<?= $subjects['id'] ?>"  class="btn btn-danger">Delete</a>
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
    <h5 class='text-center text-danger mt-5'>No Subjects Present!</h5>

<?php endif; ?>