<?php
require_once __DIR__ . "/../models/Users.php";
$user = new User(new Database());
$users = $user->get_user_by_id($_SESSION['user_id']);
$email = $users['email_address'];
$role = $user->user_role($email)
?>
<div class="offcanvas offcanvas-start bg-dark text-light" tabindex="-1" id="offcanvasExample"
    aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasExampleLabel"><img class="logo" src="assets/images/logo.jpg"
                height="50" width="50" style="border-radius: 50%"></img><?="  "?>SMS</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <nav class="list-group col-md-3 col-lg-2 d-md-block mb-5">
            <div class="dropdown mt-3">
                <a class="text-light" href="dashboard.php">DASHBOARD</a>
            </div>

            <div class="dropdown mt-3">
                <button class="btn dropdown-toggle text-light" type="button" data-bs-toggle="dropdown">
                    STUDENTS
                </button>
                <ul class="dropdown-menu">

                    <li><a href="dashboard.php?addstd" class="add-student list-group-item list-group-item-action"
                            data-bs-toggle="modal" data-bs-target="#addStudent">Add Student</a></li>
                    <li><a href="dashboard.php?managestd" class="list-group-item list-group-item-action">Manage
                            Students</a></li>
                    <li><a href="dashboard.php?addresult" class="list-group-item list-group-item-action">Add Results</a>
                    </li>
                    <li><a href="dashboard.php?addprt" class="list-group-item list-group-item-action">Add Student
                            Parent</a></li>
                </ul>
            </div>


            <div class="dropdown mt-3">
                <button class="btn dropdown-toggle text-light" type="button" data-bs-toggle="dropdown">
                    SUBJECTS
                </button>
                <ul class="dropdown-menu">
                    <a href="dashboard.php?addsub" class="list-group-item list-group-item-action">Add Subject</a>
                    <a href="dashboard.php?managesub" class="list-group-item list-group-item-action">Manage Teachers</a>
                    </li>
                </ul>
            </div>

            <div class="dropdown mt-3">
                <button class="btn dropdown-toggle text-light" type="button" data-bs-toggle="dropdown">
                    EXAMINATIONS
                </button>
                <ul class="dropdown-menu">
                    <a href="dashboard.php?addstd" class="add-student list-group-item list-group-item-action"
                        data-toggle="modal" data-target="#modelId">Add Examination Timetable</a>
                    <a href="dashboard.php?managestd" class="list-group-item list-group-item-action">Manage Exams</a>
                    </li>
                </ul>
            </div>


            <div class="dropdown mt-3">
                <button class="btn dropdown-toggle text-light" type="button" data-bs-toggle="dropdown">
                    RESULTS
                </button>
                <ul class="dropdown-menu">
                    <a href="dashboard.php?adddoc" class="add-student list-group-item list-group-item-action"
                        data-toggle="modal" data-target="#modelId">Add Result Document</a>
                    <a href="dashboard.php?addrst" class="list-group-item list-group-item-action">Add Results</a>
                    </li>
                </ul>
            </div>

            <div class="dropdown mt-3">
                <button class="btn dropdown-toggle text-light" type="button" data-bs-toggle="dropdown">
                    CLASSES
                </button>
                <ul class="dropdown-menu">
                    <a href="dashboard.php?addcls" class="list-group-item list-group-item-action">Add Class</a>
                    <a href="dashboard.php?managecls" class="list-group-item list-group-item-action">Manage Classes</a>
                    </li>
                </ul>
            </div>

            <?php if ($role['role'] == 'admin') : ?>
            <div class="dropdown mt-3">
                <button class="btn dropdown-toggle text-light" type="button" data-bs-toggle="dropdown">
                    TEACHERS
                </button>
                <ul class="dropdown-menu">
                    <li><a href="dashboard.php?addtch" class="list-group-item list-group-item-action">Add Teacher</a>
                    </li>
                    <li><a href="dashboard.php?managetch" class="list-group-item list-group-item-action">Manage
                            Teachers</a>
                    </li>
                </ul>
            </div>

            <div class="dropdown mt-3">
                <button class="btn dropdown-toggle text-light" type="button" data-bs-toggle="dropdown">
                    ADMINS
                </button>
                <ul class="dropdown-menu">
                    <a href="dashboard.php?addad" class="list-group-item list-group-item-action">Add Admin</a>
                    <a href="dashboard.php?managead" class="list-group-item list-group-item-action">Manage Admin</a>
                    </li>
                </ul>
            </div>

            <div class="dropdown mt-3">
                <button class="btn dropdown-toggle text-light" type="button" data-bs-toggle="dropdown">
                    PAYMENTS
                </button>
                <ul class="dropdown-menu">
                    <a href="#" class="list-group-item list-group-item-action">Add Payment details</a>
                    <a href="#" class="list-group-item list-group-item-action">Pending payments</a>
                    <a href="#" class="list-group-item list-group-item-action">Completed payments</a>
                    </li>
                </ul>
            </div>

            <div class="dropdown mt-3">
                <button class="btn dropdown-toggle text-light" type="button" data-bs-toggle="dropdown">
                    INVOICES
                </button>
                <ul class="dropdown-menu">
                    <a href="dashboard.php?addad" class="list-group-item list-group-item-action">Create Invoice</a>
                    <a href="dashboard.php?managead" class="list-group-item list-group-item-action">Manage invoices</a>
                    </li>
                </ul>
            </div>

            <div class="dropdown mt-3">
                <button class="btn dropdown-toggle text-light" type="button" data-bs-toggle="dropdown">
                    SETTINGS
                </button>
                <ul class="dropdown-menu">
                    <a href="dashboard.php?manage" class="add-student list-group-item list-group-item-action"
                        data-toggle="modal" data-target="#modelId">System Management</a>
                    <a href="dashboard.php?grade" class="list-group-item list-group-item-action">Accademic Grades</a>
                    <a href="dashboard.php?auth" class="list-group-item list-group-item-action">User Authentication</a>
                    </li>
                </ul>
            </div>

            <?php endif ?>
        </nav>
    </div>
</div>
<?php
include_once "add-student.php";