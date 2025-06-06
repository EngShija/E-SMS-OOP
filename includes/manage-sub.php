<script>
    $(document).ready(function() {
        $('#subTb').DataTable({
            paging: true,
            searching: true,
            ordering: true,
            pageLength: 10,
            lengthChange: true,
            language: {
                search: "<span style='color: #ffffff;'>Search:</span>",
                lengthMenu: "<span style='color: #ffffff;'>Show _MENU_ entries</span>",
                info: "<span style='color: #ffffff;'>Showing _START_ to _END_ of _TOTAL_ entries</span>",
                paginate: {
                    previous: "<span style='color: #ffffff;'>&laquo; Previous</span>",
                    next: "<span style='color: #ffffff;'>Next &raquo;</span>"
                }
            },
            initComplete: function() {
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

<?php $subject->setSchoolId($_SESSION[SCHOOL_ID]); if (count($subject->get_all_subjects()) > 0): ?>
    <h1 class="text-center">SUBJECTS</h1>
    <div class="scrollTb">
        <div class="d-flex justify-content-center">
        <table class="table table-striped table-dark table-bordered w-100" id="subTb">
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
                <?php $i++; endforeach; ?>
            </tbody>
        </table>
        </div>
    </div>
<?php else: ?>
    <h5 class='text-center text-danger mt-5'>No Subjects Present!</h5>
<?php endif; ?>