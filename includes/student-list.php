<?php
if(isset($_SESSION['deleted']) && $_SESSION['deleted'] === 'student'){
    sweetAlert('Deleted', 'Student details deleted successfully!', 'warning');
    unset($_SESSION['deleted']);
}
?>
                        
<?php if(count($student->get_students()) > 0) :?>
    <h1 class="text-center">STUDENTS</h1>
<div class="scrollTb">
<table class="table table-striped table-dark" id="tbId">
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
            <td><?=$student['first_name']. " ". $student['last_name'] ?></td>
            <td><?=$student['reg_no'] ?></td>
            <td><?=$student['reg_date'] ?></td>
            <td><?=$student['gender'] ?></td>
            <td><?=$student['class'] ?></td>
            <td><a href="dashboard.php?updatestd=<?= $student['unique_id'] ?>" Class="btn btn-success">Manage</a>
            <?php if($role['role'] == 'admin') :?>
            <a href="dashboard.php?deleteid=<?= $student['unique_id']?>" class="btn btn-danger">Delete</a>
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
    <h5 class='text-center text-danger mt-5'>No Students Details Found!</h5> 
    
<?php endif;?>





