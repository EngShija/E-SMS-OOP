<?php
require_once __DIR__ . "/../models/Database.php";
require_once __DIR__ . "/../includes/functions.php";

$database = new Database();

$login_history = $database->get_login_history($_SESSION['user_id'])
?>

<script>
    function clearLoginHst(url){
       let corfirm = confirm('Are you sure you want to clear login history? ');
       if(corfirm){
        window.location = url;
       }
       else{
        return false;
       }
    }
    </script>

<div class="d-flex justify-content-center">
    <div class="card text-center mb-3 mt-3" style="width: 30rem;">
        <div class="card-body">

            <h2 class="card-title">
                Login History
            </h2>
            <?php if(count($login_history) > 0) :?>
            <a href="#" onclick="clearLoginHst('controllers/clear-login-history.php')" class="text-decoration-none text-danger">Clear History</a>
            <table class="table table-striped table-bordered card-item" id="tbId">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Login Time Stamp</th>
                        <th>Login Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($login_history as $history): ?>
                        <tr>
                            <td>
                                <?= $i ?>
                            </td>
                                <td>
                                <?= $history['login_time'] ?>
                            </td>
                
                            <td>
                                <?= $history['status'] ?>
                            </td>
                        </tr>
                        <?php
                        $i++;
                    endforeach;
                    ?>
                </tbody>
            </table>
            <?php else :?>
                <h5 class="text-danger">No login history available for this account!</h5>
            <?php endif ?>