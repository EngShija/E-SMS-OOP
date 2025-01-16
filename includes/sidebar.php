<?php
require_once __DIR__ . "/../models/Users.php";
$user = new User(new Database());
$users = $user->get_user_by_id($_SESSION['user_id']) ?:  $parent->get_parent_by_id($_SESSION['user_id']);
$email = $users['email_address'];
$role = $user->user_role($email) ?: $parent->user_role($email);
?>
<div class="offcanvas offcanvas-start bg-dark text-light" tabindex="-1" id="offcanvasExample"
    aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasExampleLabel"><img class="logo" src="assets/images/logo.jpg"
                height="50" width="50" style="border-radius: 50%"></img><?= "  " ?>SMS</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <nav class="list-group col-md-3 col-lg-2 d-md-block mb-5">
            <div class="dropdown mt-3">
                <a class="text-light" href="dashboard.php"></a>
            </div>

            <?php if($role['role'] == 'admin' || $role['role'] == 'teacher'): ?>

            <div class="dropdown mt-3">
                <button class="btn dropdown-toggle text-light" type="button" data-bs-toggle="dropdown">
                    <i><img src="assets/images/user.svg" alt=""></i> STUDENTS
                </button>
                <ul class="dropdown-menu">

                    <li><a href="dashboard.php?addstd" class="add-student list-group-item list-group-item-action"
                            data-bs-toggle="modal" data-bs-target="#addStudent">Add Student</a></li
                    <li><a href="dashboard.php?managestd" class="list-group-item list-group-item-action">Manage
                            Students</a></li>

                </ul>
            </div>


            <div class="dropdown mt-3">
                <button class="btn dropdown-toggle text-light" type="button" data-bs-toggle="dropdown">
                <i><img src="assets/images/book-open.svg" alt=""></i>  SUBJECTS
                </button>
                <ul class="dropdown-menu">
                    <li><a href="dashboard.php?addsub" class="add-student list-group-item list-group-item-action"
                            data-bs-toggle="modal" data-bs-target="#addSub">Add Subject</a></li>
                    <li><a href="dashboard.php?addsub" class="add-student list-group-item list-group-item-action"
                            data-bs-toggle="modal" data-bs-target="#subcat">Add Subject Category</a></li>
                    <a href="dashboard.php?managesub" class="list-group-item list-group-item-action">Manage Subjects</a>
                    </li>
                </ul>
            </div>

            <div class="dropdown mt-3">
                <button class="btn dropdown-toggle text-light" type="button" data-bs-toggle="dropdown">
                <i><img src="assets/images/clock.svg" alt=""></i> EXAMINATIONS
                </button>
                <ul class="dropdown-menu">
                    <li><a href="dashboard.php?addexm" class="add-student list-group-item list-group-item-action"
                            data-bs-toggle="modal" data-bs-target="#addexm">Add Exam Type</a></li>

                    <a href="dashboard.php?addtmtb" class="add-student list-group-item list-group-item-action"
                        data-toggle="modal" data-target="#modelId">Add Examination Timetable</a>
                    <a href="dashboard.php?managestd" class="list-group-item list-group-item-action">Manage Exams</a>
                    </li>
                </ul>
            </div>


            <div class="dropdown mt-3">
                <button class="btn dropdown-toggle text-light" type="button" data-bs-toggle="dropdown">
                <i><img src="assets/images/bar-chart.svg" alt=""></i> RESULTS
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
                <i><img src="assets/images/box.svg" alt=""></i>  CLASSES
                </button>
                <ul class="dropdown-menu">
                    <a href="dashboard.php?addcls" class="list-group-item list-group-item-action"  data-bs-toggle="modal" data-bs-target="#addcls">Add Class</a>
                    <a href="dashboard.php?managecls" class="list-group-item list-group-item-action">Manage Classes</a>
                    </li>
                </ul>
            </div>
            <?php endif ?>

            <?php if($role['role'] == 'parent') :?>
                <div class="dropdown mt-3">
                <button class="btn text-light" type="button">
                <a href="dashboard.php?addstd" class="text-light"  data-bs-toggle="modal" data-bs-target="#addStudent"> <i><img src="assets/images/user.svg" alt=""></i>STUDENT_PROFILE</a>
                </button>
            </div>

            
            <div class="dropdown mt-3">
                    <button class="btn dropdown-toggle text-light" type="button" data-bs-toggle="dropdown">
                    <i><img src="assets/images/book-open.svg" alt=""></i>  UPDATES
                    </button>
                    <ul class="dropdown-menu">
                        <a href="dashboard.php?addad" class="list-group-item list-group-item-action">Broadcast Updates</a>
                        <a href="dashboard.php?managead" class="list-group-item list-group-item-action">Private Updates</a>
                        </li>
                    </ul>
                </div>

            <?php endif ?>

            <?php if ($role['role'] == 'admin') :?>
                <div class="dropdown mt-3">
                    <button class="btn dropdown-toggle text-light" type="button" data-bs-toggle="dropdown">
                    <i><img src="assets/images/user.svg" alt=""></i>  TEACHERS
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
                    <i><img src="assets/images/user-check.svg" alt=""></i>  ADMINS
                    </button>
                    <ul class="dropdown-menu">
                        <a href="dashboard.php?addad" class="list-group-item list-group-item-action">Add Admin</a>
                        <a href="dashboard.php?managead" class="list-group-item list-group-item-action">Manage Admin</a>
                        </li>
                    </ul>
                </div>

                <div class="dropdown mt-3">
                    <button class="btn dropdown-toggle text-light" type="button" data-bs-toggle="dropdown">
                    <i><img src="assets/images/pie-chart.svg" alt=""></i>  PAYMENTS
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
                    <i><img src="assets/images/box.svg" alt=""></i>  INVOICES
                    </button>
                    <ul class="dropdown-menu">
                        <a href="dashboard.php?addad" class="list-group-item list-group-item-action">Create Invoice</a>
                        <a href="dashboard.php?managead" class="list-group-item list-group-item-action">Manage invoices</a>
                        </li>
                    </ul>
                </div>

                <div class="dropdown mt-3">
                    <button class="btn dropdown-toggle text-light" type="button" data-bs-toggle="dropdown">
                    <i><img src="assets/images/settings.svg" alt=""></i>  SETTINGS
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
include_once "add-sub.php";
include_once "add-exam.php";
include_once "add-subject-catyegory.php";
include_once "add-class.php";

