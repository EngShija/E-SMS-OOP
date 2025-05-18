<script>
    $(document).ready(function() {
        $('#classTb').DataTable({
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
                $('.dataTables_filter input').addClass('form-control form-control-sm');
            }
        });
    });
</script>

<?php $room->setSchoolId($_SESSION[SCHOOL_ID]); if (count($room->get_all_rooms()) > 0): ?>
    <h1 class="text-center">ROOMS</h1>
    <div class="scrollTb">
        <div class="d-flex justify-content-center">
        <table class="table table-striped table-dark table-bordered w-100" id="classTb">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Room Name</th>
                    <th>Room capacity</th>
                    <?php if ($role['role'] == 'admin'): ?>
                    <th>Actions</th>
                    <?php endif ?>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                foreach ($room->get_all_rooms() as $rooms): ?>
                    <tr>
                        <td><?= $i ?></td>
                        <td><?= strtoupper($rooms['room_name']) ?></td>
                        <td><?= strtoupper($rooms['capacity']) ?></td>
                        <?php if ($role['role'] == 'admin'): ?>
                        <td><a href="dashboard.php?roomId=<?= $rooms['id'] ?>"  class="btn btn-success" >Edit</a>
                                <a class="btn btn-danger" onclick="confirmDelete('<?= strtoupper($rooms['room_name']) ?>', 'controllers/delete-class.php?subid=<?= $rooms['id'] ?>')">Delete</a>
                            <?php endif ?>
                        </td>
                    </tr>
                <?php $i++; endforeach; ?>
            </tbody>
        </table>
        </div>
    </div>
<?php else: ?>
    <h5 class='text-center text-danger mt-5'>No Subjects Present!</h5>
<?php endif; ?>