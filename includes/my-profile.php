<?php
require_once __DIR__. "/../config/autoloader.php";
require_once __DIR__. "/../config/incidences.php";
require_once __DIR__. "/../config/constants.php";
require_once __DIR__ . "/../includes/functions.php";
$user = new User(new Database());
$parent = new studentParent(new Database());
$users = $user->get_user_by_id($_SESSION['user_id']) ?: $parent->get_parent_by_id($_SESSION['user_id']);
?>

<div class="d-flex justify-content-center">
    <div class="card bg-dark text-light text-center mb-3 mt-3" style="max-width:fit-content; ">
        <div class="card-body">

            <h2 class="card-title">
            <a class="navbar-brand" href="dashboard.php?profileImage"><img src="uploads/<?= $users['profile_image'] ?>" height="50" width="50" class="rounded-circle"></a>
                <?= $users['first_name']. "'s". " Profile"?>
            </h2>
            <table class="table table-striped table-bordered table-dark card-item" id="tbId">
                <thead>
                    <tr>
                        <th>Full Name: </th>
                        <td><?= $users['first_name']. " ". $users['last_name'] ?></t>
                    </tr>
                    <tr>
                        <th>Gender: </th>
                        <td><?= $users['email_address'] ?></t>
                    </tr>
                    <tr>
                        <th>Email Address: </th>
                        <td><?= $users['gender'] ?></td>
                    </tr>

                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>

