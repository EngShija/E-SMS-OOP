<script>
    $(document).ready(function() {
        $('#examTb').DataTable({
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

<?php if (count($exam->get_all_exams()) > 0): ?>
    <h1 class="text-center">EXAMINATIONS</h1>
    <div class="scrollTb">
        <div class=" d-flex justify-content-center">
        <table class="table table-striped table-dark" id="examTb">
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