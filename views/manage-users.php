<?php
include_once __DIR__ . "/../models/Database.php";
include_once __DIR__ . "/../models/Users.php";
include_once __DIR__ . "/../includes/functions.php";

$database = new Database();
$user = new User($database);
$users = $user->get_all_users();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Users</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Manage Users</h2>
        <?php if (isset($_GET['success'])): ?>
            <div class="alert alert-success">User role updated successfully!</div>
        <?php elseif (isset($_GET['error'])): ?>
            <div class="alert alert-danger">Failed to update user role.</div>
        <?php endif; ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?= $user['id'] ?></td>
                        <td><?= $user['email_address'] ?></td>
                        <td><?= $user['role'] ?></td>
                        <td>
                            <?php if ($user['role'] != 'admin'): ?>
                                <form action="../controllers/make-admin.php" method="POST">
                                    <input type="hidden" name="user_id" value="<?= $user['id'] ?>">
                                    <button type="submit" class="btn btn-primary">Make Admin</button>
                                </form>
                            <?php else: ?>
                                <form action="../controllers/remove-admin.php" method="POST">
                                    <input type="hidden" name="user_id" value="<?= $user['id'] ?>">
                                    <button type="submit" class="btn btn-danger">Remove Admin</button>
                                </form>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
