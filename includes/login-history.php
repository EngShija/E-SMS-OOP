<?php
require_once __DIR__ . "/../models/Database.php";
require_once __DIR__ . "/../includes/functions.php";

$database = new Database();

$login_history = $user->get_login_history($_SESSION['user_id'])
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

<script>
    $(document).ready(function() {
        $('#hstTb').DataTable({
            paging: true,
            searching: true,
            ordering: true,
            pageLength: 10,
            lengthChange: true,
            scrollCollapse: true,
            scrolY:true,
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

<div class="d-flex justify-content-center">
    <div class="card bg-dark text-light text-center mb-3 mt-3" style="max-width:fit-content; ">
        <div class="card-body">

            <h2 class="card-title">
                Login History
            </h2>
            <?php if(count($login_history) > 0) :?>
            <a href="#" onclick="clearLoginHst('controllers/clear-login-history.php')" class="text-decoration-none text-danger">Clear History</a>
            <table class="table table-striped table-bordered table-dark card-item" id="hstTb">
                <thead>
                    <tr>
                        <th>Login Time Stamp</th>
                        <th>User Email</th>
                        <th>IP address</th>
                        <th>Browser</th>
                        <th>Platform</th>
                        <th>Device Type</th>
                        <th>Login Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($login_history as $history): ?>
                    <?php $users = $user->get_user_by_id($history['user_id']) ?>
                        <tr>
                                <td>
                                <?= $history['login_time'] ?>
                            </td>

                                <td>
                                <?= $users['email_address'] ?>
                            </td>

                            <td>
                                <?= $history['ip_address'] ?>
                            </td>

                            <td>
                                <?= $history['browser'] ?>
                            </td>

                            <td>
                                <?= $history['platform'] ?>
                            </td>

                            <td>
                                <?= $history['device_type'] ?>
                            </td>
                
                            <td>
                                <?= $history['login_status'] ?>
                            </td>
                        </tr>
                        <?php
                    endforeach;
                    ?>
                </tbody>
            </table>
            <?php else :?>
                <h5 class="text-danger">No login history available for this account!</h5>
            <?php endif ?>
        </div>
    </div>