<?php
$teachers = new User(new Database);
if(count($teachers->get_all_users()) > 0) :?>
<div class="scrollTb">
<table class="table" id="tbId">
    <thead>
        <tr>
            <th>S/N</th>
            <th>Full Name</th>
            <th>Subject(s) Tought</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    <?php                                           
    $i = 1;
foreach( $teachers->get_all_users() as $teacher) :?>
        <tr>
            <td><?= $i ?></td>
            <td><?=$teacher['first_name']. " ". $teacher['last_name'] ?></td>
            <td><?=$teacher['subject_tought'] ?></td>
            <td><?=$teacher['email_address'] ?></td>
            <td><a href="dashboard.php?updatestd=<?= $teacher['unique_id'] ?>">Edit</a> <a href="controllers/delete-student.php?id=<?= $teacher['unique_id']?>">Delete</a> <a href="dashboard.php?addResult=<?= $teacher['unique_id'] ?>">results</a></td>
        </tr>
        <?php $i++; endforeach; ?>
    </tbody>
</table>
</div>
<?php else: echo "<h5 class='text-center text-danger mt-5'>No Students Details Found!</h5>"; endif;?>