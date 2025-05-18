<script>
    $(document).ready(function() {
        $('#tchTb').DataTable({
            paging: true,
            searching: true,
            ordering: true,
            pageLength: 10,
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

<?php
$teachers = new User(new Database);
$teachers->setSchoolId($_SESSION[SCHOOL_ID]);
$all_teachers = $teachers->get_teachers();

if(count($all_teachers) > 0) :?>
<h1 class="text-center">TEACHERS</h1>

<div class="scrollTb">
<table class="table table-striped table-dark table-bordered" id="tchTb">
    <thead>
        <tr>
            <th>S/N</th>
            <th>Full Name</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    <?php                                           
    $i = 1;
    foreach($all_teachers as $teacher) :?>
        <tr>
            <td><?= $i ?></td>
            <td><?=$teacher['first_name']. " ". $teacher['last_name'] ?></td>
            <td><?=$teacher['email_address'] ?></td>
            <?php if($teacher['unique_id'] == $_SESSION[CURRENT_USER]) : ?>
                <td><h3 class="text-secondary">You</h3></td>
                <?php else: ?>
            <td><a href="?managetch=<?= $teacher['unique_id'] ?>" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#updatetch" onclick="editTeacher('<?= $teacher['unique_id'] ?>')">Edit</a> 
            <a  class="btn btn-danger" onclick="confirmDelete('<?=$teacher['first_name']. ' ' . $teacher['last_name'] ?>', 'controllers/delete-teacher.php?id=<?= $teacher['unique_id']?>')">Delete</a>
            <?php endif; ?>
        </tr>
        <?php $i++; endforeach; ?>
    </tbody>
</table>
</div>

<?php else: echo "<h5 class='text-center text-danger mt-5'>No Teachers Details Found!</h5>";
echo $teachers->getSchoolId();
echo $_SESSION[CURRENT_USER];
endif;
include_once "update-teacher.php";
?>