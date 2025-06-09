<?php
require_once __DIR__ . '/../config/autoloader.php';
require_once __DIR__."/../includes/functions.php";

$student = new Student(new Database());

$class->setSchoolId($_SESSION[SCHOOL_ID]);

if (isset($_SESSION['deleted']) && $_SESSION['deleted'] === 'student') {
    sweetAlert('Deleted', 'Student details deleted successfully!', 'success');
    unset($_SESSION['deleted']);
}
?>
<script>
    $(document).ready(function() {
        $('#studentTb').DataTable({
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
                // Add form-control class to the search input
                $('.dataTables_filter input').addClass('form-control form-control-sm');
            }
        });
    });
</script>
<h3 class="text-center text-light">STUDENTS</h3>
<?php if (isset($_SESSION['success'])): ?>
  <div class="alert alert-success"><?= $_SESSION['success']; unset($_SESSION['success']); ?></div>
<?php endif; ?>
<?php if (isset($_SESSION['error'])): ?>
  <div class="alert alert-danger"><?= $_SESSION['error']; unset($_SESSION['error']); ?></div>
<?php endif; ?>
<div class="scrollTb">
<table class="table table-striped table-dark table-bordered" id="studentTb">
    <thead>
        <tr>
            <th>No</th>
            <th>Full Name</th>
            <th>Registration Number</th>
            <th>Registration Date</th>
            <th>Gender</th>
            <th>Class</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    <?php
    $student->setSchoolId($_SESSION[SCHOOL_ID]);
    $students = $student->get_students($school->getSchoolId());
    $i = 1;
    foreach ($students as $student) : ?>
        <tr>
            <td><?= $i ?></td>
            <td><a href="dashboard.php?updatestd=<?= $student['unique_id'] ?>" class="text-light text-decoration-none"><?= strtoupper($student['first_name'] . " " . $student['middle_name'] . " " . $student['last_name']) ?></a></td>
            <td><?= $student['reg_no'] ?></td>
            <td><?= $student['reg_date'] ?></td>
            <td><?= $student['gender'] ?></td>
            <?php $classDetails = $class->get_class_by_id($student['class_id']) ?>
            <td><?= strtoupper($classDetails['class_name']) ?></td>
            <td>
                <a href="dashboard.php?updatestd=<?= $student['unique_id'] ?>" class="btn btn-success">Manage</a>
                <a class="btn btn-danger" onclick="confirmDelete('<?= $student['first_name'] . ' ' . $student['middle_name'] . ' ' . $student['last_name'] ?>', 'controllers/delete-student.php?deleteid=<?= $student['unique_id'] ?>')">Delete</a>
            </td>
        </tr>
    <?php $i++; endforeach; ?>
    </tbody>
</table>

</div>





