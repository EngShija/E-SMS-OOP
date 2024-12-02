
                        
<?php if(count($student->get_students()) > 0) :?>
<div class="scrollTb">
<table class="table" id="tbId">
    <thead>
        <tr>
            <th>No</th>
            <th>Full Name</th>
            <th>Registration Number</th>
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
            <td><?=$student['gender'] ?></td>
            <td><?=$student['class'] ?></td>
            <td><a href="dashboard.php?updatestd=<?php echo $student['unique_id']; $student_id = $student['unique_id'] ?>"  data-bs-toggle="modal" data-bs-target="#editstd">Edit</a> <a href="controllers/delete-student.php?id=<?= $student['unique_id']?>">Delete</a> <a href="dashboard.php?addResult=<?= $student['unique_id'] ?>">results</a></td>
            <?php  include_once "edit-student.php"; 
            $_SESSION['id'] = $student_id;
            ?>
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





