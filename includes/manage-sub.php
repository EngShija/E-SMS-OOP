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
                    <?php if ($role['role'] == 'admin'): ?>
                    <th>Actions</th>
                    <?php endif ?>

                </tr>
            </thead>

            <tbody>
                <?php
                $i = 1;
                foreach ($subject->get_all_subjects() as $subjects): ?>
                    <tr>
                        <td><?= $i ?></td>
                        <td><?= strtoupper($subjects['sub_name']) ?></td>
                        <td><?= strtoupper($subjects['category']) ?></td>
                        <?php if ($role['role'] == 'admin'): ?>
                        <td><a href="dashboard.php?subid=<?= $subjects['id'] ?>"  class="btn btn-success" >Edit</a>
                                <a class="btn btn-danger" onclick="confirmDelete('<?= strtoupper($subjects['sub_name']) ?>', 'controllers/delete-subject.php?subid=<?= $subjects['id'] ?>')">Delete</a>
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