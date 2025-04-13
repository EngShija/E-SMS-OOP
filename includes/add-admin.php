<script>
    $(document).ready(function () {
        $('#usersTb').DataTable({
            paging: true,
            searching: true,
            ordering: true,
            pageLength: 10,
            scrollX: true,
            scrollCollapse: true,
            paging: false,
            lengthChange: true, // Enable the entry counter dropdown
            language: {
                search: "<span style='color: #ffffff;'>Search:</span>",
                lengthMenu: "<span style='color: #ffffff;'>Show _MENU_ entries</span>",
                info: "<span style='color: #ffffff;'>Showing _START_ to _END_ of _TOTAL_ entries</span>",
                paginate: {
                    previous: "<span style='color: #ffffff;'>&laquo; Previous</span>",
                    next: "<span style='color: #ffffff;'>Next &raquo;</span>"
                }
            },
            initComplete: function () {
                // Style pagination buttons
                $('.dataTables_paginate .paginate_button').addClass('btn btn-secondary mx-1');
                // Style the entry counter dropdown
                $('.dataTables_length label').addClass('text-light');
                $('.dataTables_length select').addClass('form-select form-select-sm');
                // Style the "Showing X to Y of Z entries" text
                $('.dataTables_info').addClass('text-light');
                $('.dataTables_filter input').addClass('form-control form-control-sm');
            }
        });
    });
</script>


<?php
$teachers = new User(new Database);
$teachers->setSchoolId($_SESSION[SCHOOL_ID]);
if (count($teachers->get_teachers()) > 0): ?>
    <h2 class="text-center">ADD ADMIN FROM TEACHERS</h2>
    <div class="scrollTb">
        <table class="table table-striped table-dark table-bordered" id="usersTb">
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
                foreach ($teachers->get_teachers() as $teacher): ?>
                    <tr>
                        <td><?= $i ?></td>
                        <td><?= $teacher['first_name'] . " " . $teacher['last_name'] ?></td>
                        <td><?= $teacher['email_address'] ?></td>
                        <td><?= $teacher['role'] ?></td>
                        <td>
                            <?php if ($teacher['unique_id'] == $_SESSION[CURRENT_USER]): ?>
                                <h3 class="text-secondary">You</h3>
                            <?php elseif ($teacher['role'] == 'admin'): ?>
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
endif; 
?>
