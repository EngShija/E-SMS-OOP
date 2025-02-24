<?php
if(isset($_SESSION['deleted']) && $_SESSION['deleted'] === 'student'){
    sweetAlert('Deleted', 'Student details deleted successfully!', 'success');
    unset($_SESSION['deleted']);
}
?>
                        
<?php if(count($student->get_students()) > 0) :?>
    <h3 class="text-center">STUDENTS</h3>
<div class="scrollTb">
<table class="table table-striped table-dark table-responsive" id="tbId">
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
    $i = 1;
foreach( $student->get_students() as $student) :?>
        <tr>
            <td><?= $i ?></td>
            <td><a href="dashboard.php?updatestd=<?= $student['unique_id'] ?>" class="text-light text-decoration-none"><?= strtoupper($student['first_name']. " ". $student['middle_name']. " ". $student['last_name']) ?></a></td>
            <td><?=$student['reg_no'] ?></td>
            <td><?=$student['reg_date'] ?></td>
            <td><?=$student['gender'] ?></td>
            <td><?= strtoupper($student['class']) ?></td>
            <td><a href="dashboard.php?updatestd=<?= $student['unique_id'] ?>" Class="btn btn-success">Manage</a>
            <?php if($role['role'] == 'admin') :?>
            <a class="btn btn-danger" onclick="confirmDelete('<?= strtoupper($student['first_name']. ' '. $student['middle_name']. ' '. $student['last_name']) ?>', 'controllers/delete-student.php?deleteid=<?= $student['unique_id']?>')">Delete</a>
                <?php endif ?>
        </td>

        </tr>
        
        <?php
        $i++; endforeach;
        ?>
    </tbody>
</table>
</div>
<?php else: ?>
    <h5 class='text-center text-danger mt-2'>No Students Details Found!</h5> 
    
<?php endif;?>



