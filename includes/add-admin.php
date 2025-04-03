<?php
$teachers = new User(new Database);
if (count($teachers->get_all_users()) > 0): ?>
    <h2 class="text-center">ADD ADMIN FROM TEACHERS</h2>
    <div class="scrollTb">
        <table class="table table-striped table-dark table-bordered" id="tbId">
            <thead>
                <tr>
                    <th>S/N</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                foreach ($teachers->get_teachers_exept_current($_SESSION['user_id']) as $teacher): ?>
                    <tr>
                        <td><?= $i ?></td>
                        <td><?= $teacher['first_name'] . " " . $teacher['last_name'] ?></td>
                        <td><?= $teacher['email_address'] ?></td>
                        <td><?= $teacher['role'] ?></td>
                        <td>
                            <?php if ($teacher['role'] == 'admin'): ?>
                                <a class="btn btn-danger"
                                    onclick="warningAlert('Are you sure you want to remove <?= strtoupper($teacher['first_name'] . ' ' . $teacher['last_name']) ?> as an admin?', 'controllers/remove-admin.php?id=<?= $teacher['unique_id'] ?>')">Remove
                                    Admin</a>
                            <?php else: ?>
                                <a class="btn btn-primary"
                                    onclick="warningAlert('Are you sure you want to make <?= strtoupper($teacher['first_name'] . ' ' . $teacher['last_name']) ?> an admin?', 'controllers/make-admin.php?id=<?= $teacher['unique_id'] ?>')">Make
                                    Admin</a>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php $i++; endforeach; ?>
            </tbody>
        </table>
    </div>
<?php else:
    echo "<h5 class='text-center text-danger mt-5'>No Teachers Details Found!</h5>";
endif; ?>