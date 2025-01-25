<?php
require_once __DIR__ . "/../models/Users.php";
$user = new User(new Database());
$users = $user->get_user_by_id($_SESSION['user_id']) ?: $parent->get_parent_by_id($_SESSION['user_id']);
$email = $users['email_address'];
$role = $user->user_role($email) ?: $parent->user_role($email);
?>

<div class="offcanvas offcanvas-start bg-dark text-light" tabindex="-1" id="offcanvasExample"
    aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasExampleLabel"><img class="logo rounded-circle border border-success" src="assets/images/logo.jpg"
                height="30" width="30""></img><?= "  " ?>SMS</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">

        <div class="d-flex flex-column flex-shrink-0 text-bg-dark" style="width: 300px;">
            <hr>

            <ul class="list-group col-md-3 col-lg-2 nav nav-pills flex-column mb-auto">
                <li class="dropdown">
                    <a href="dashboard.php" class="nav-link text-white">
                        <svg class="bi pe-none me-2" width="25" height="25">
                            <use xlink:href="#speedometer2" />
                        </svg>
                        Dashboard
                    </a>
</li>

                <?php if ($role['role'] == 'admin' || $role['role'] == 'teacher'): ?>

                    <li class="dropdown">
                        <button class="btn dropdown-toggle text-light" type="button" data-bs-toggle="dropdown">
                            <svg class="bi pe-none me-2" width="25" height="25">
                                <use xlink:href="#people" />
                            </svg> Students
                        </button>
                        <ul class="dropdown-menu">

                            <li><a href="dashboard.php?addstd" class="add-student list-group-item list-group-item-action"
                                    data-bs-toggle="modal" data-bs-target="#addStudent">Add Student</a></li>
                            <li><a href="dashboard.php?managestd" class="list-group-item list-group-item-action">Manage
                                    Students</a></li>

                        </ul>
                    </li>


                    <div class="dropdown mt-3">
                        <button class="btn dropdown-toggle text-light" type="button" data-bs-toggle="dropdown">
                            <svg class="bi pe-none me-2" width="25" height="25">
                                <use xlink:href="#grid" />
                            </svg>
                            Subjects
                        </button>
                        <ul class="dropdown-menu">
                            <li><a href="dashboard.php?addsub" class="add-student list-group-item list-group-item-action"
                                    data-bs-toggle="modal" data-bs-target="#addSub">Add Subject</a></li>
                            <li><a href="dashboard.php?addsub" class="add-student list-group-item list-group-item-action"
                                    data-bs-toggle="modal" data-bs-target="#subcat">Add Category</a></li>
                            <a href="dashboard.php?managesub" class="list-group-item list-group-item-action">Manage
                                Subjects</a>
                            </li>
                        </ul>
                    </div>

                    <div class="dropdown mt-3">
                        <button class="btn dropdown-toggle text-light" type="button" data-bs-toggle="dropdown">
                            <svg class="bi pe-none me-2" width="25" height="25">
                                <use xlink:href="#file-earmark-text" />
                            </svg>
                            Examinations
                        </button>
                        <ul class="dropdown-menu">
                            <li><a href="dashboard.php?addexm" class="add-student list-group-item list-group-item-action"
                                    data-bs-toggle="modal" data-bs-target="#addexm">Add Exam Type</a></li>

                            <a href="dashboard.php?managestd" class="list-group-item list-group-item-action">Manage
                                Exams</a>
                            </li>
                        </ul>
                    </div>

                    <div class="dropdown mt-3">
                        <button class="btn dropdown-toggle text-light" type="button" data-bs-toggle="dropdown">
                            <svg class="bi pe-none me-2" width="25" height="25">
                                <use xlink:href="#calendar3" />
                            </svg>
                            Timetables
                        </button>
                        <ul class="dropdown-menu">
                            <li><a href="dashboard.php?addexm" class="add-student list-group-item list-group-item-action"
                                    data-bs-toggle="modal" data-bs-target="#addexm">Add Timetable</a></li>

                            <a href="dashboard.php?managestd" class="list-group-item list-group-item-action">Manage
                                Timetables</a>
                            </li>
                        </ul>
                    </div>
                    
                    <div class="dropdown mt-3">
                        <button class="btn dropdown-toggle text-light" type="button" data-bs-toggle="dropdown">
                            <svg class="bi pe-none me-2" width="25" height="25">
                                <use xlink:href="#calendar3" />
                            </svg>
                            Attendance
                        </button>
                        <ul class="dropdown-menu">
                            <li><a href="#" class="add-student list-group-item list-group-item-action" data-bs-toggle="modal" data-bs-target="#attendanceChoice">Take Attendance</a></li>

                            

                            <a href="dashboard.php?managestd" class="list-group-item list-group-item-action">View
                                Attendances</a>
                            </li>
                        </ul>
                    </div>

                    <div class="dropdown mt-3">
                        <button class="btn dropdown-toggle text-light" type="button" data-bs-toggle="dropdown">
                            <svg class="bi pe-none me-2" width="25" height="25">
                                <use xlink:href="#graph-up" />
                            </svg>
                            Results
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
                            <svg class="bi pe-none me-2" width="25" height="25">
                                <use xlink:href="#table" />
                            </svg>
                            Classes
                        </button>
                        <ul class="dropdown-menu">
                            <a href="dashboard.php?addcls" class="list-group-item list-group-item-action"
                                data-bs-toggle="modal" data-bs-target="#addcls">Add Class</a>
                            <a href="dashboard.php?managecls" class="list-group-item list-group-item-action">Manage
                                Classes</a>
                            </li>
                        </ul>
                    </div>
                <?php endif ?>

                <?php if ($role['role'] == 'parent'): ?>

                    <li class="dropdown mt-3">
                        <button class="btn text-light" type="button">
                            <a href="dashboard.php?addstd" class="text-light" data-bs-toggle="modal"
                                data-bs-target="#addStudent">
                                <svg class="bi pe-none me-2" width="25" height="25">
                                    <use xlink:href="#people-circle" />
                                </svg>
                                Profile</a>
                        </button>
                    </li>


                    <div class="dropdown mt-3">
                        <button class="btn dropdown-toggle text-light" type="button" data-bs-toggle="dropdown">
                            <svg class="bi pe-none me-2" width="25" height="25">
                                <use xlink:href="#table" />
                            </svg>
                            Updates
                        </button>
                        <ul class="dropdown-menu">
                            <a href="dashboard.php?addad" class="list-group-item list-group-item-action">Broadcast
                                Updates</a>
                            <a href="dashboard.php?managead" class="list-group-item list-group-item-action">Private
                                Updates</a>
                            </li>
                        </ul>
                    </div>
                    
                    <li class="dropdown">
                        <button class="btn dropdown-toggle text-light" type="button" data-bs-toggle="dropdown">
                            <svg class="bi pe-none me-2" width="25" height="25">
                                <use xlink:href="#people" />
                            </svg> Students
                        </button>
                        <ul class="dropdown-menu">

                            <li><a href="dashboard.php?addstd" class="add-student list-group-item list-group-item-action"
                                    data-bs-toggle="modal" data-bs-target="#addStudent">Add Student</a></li>
                            <li><a href="dashboard.php?managestd" class="list-group-item list-group-item-action">Manage
                                    Students</a></li>

                        </ul>
                    </li>
                <?php endif ?>

                <?php if ($role['role'] == 'admin'): ?>
                    <div class="dropdown mt-3">
                        <button class="btn dropdown-toggle text-light" type="button" data-bs-toggle="dropdown">
                            <svg class="bi pe-none me-2" width="25" height="25">
                                <use xlink:href="#people" />
                            </svg>
                            Teachers
                        </button>
                        <ul class="dropdown-menu">
                            <li><a href="#" class="list-group-item list-group-item-action" data-bs-toggle="modal"
                                    data-bs-target="#addtch">Add Teacher</a>
                            </li>
                            <li><a href="dashboard.php?managetch" class="list-group-item list-group-item-action">Manage
                                    Teachers</a>
                            </li>
                        </ul>
                    </div>

                    <div class="dropdown mt-3">
                        <button class="btn dropdown-toggle text-light" type="button" data-bs-toggle="dropdown">
                            <svg class="bi pe-none me-2" width="25" height="25">
                                <use xlink:href="#people-circle" />
                            </svg>
                            Admins
                        </button>
                        <ul class="dropdown-menu">
                            <a href="dashboard.php?addad" class="list-group-item list-group-item-action">Add Admin</a>
                            <a href="dashboard.php?managead" class="list-group-item list-group-item-action">Manage Admin</a>
                            </li>
                        </ul>
                    </div>

                    <div class="dropdown mt-3">
                        <button class="btn dropdown-toggle text-light" type="button" data-bs-toggle="dropdown">
                            <svg class="bi pe-none me-2" width="25" height="25">
                                <use xlink:href="#credit-card" />
                            </svg>
                            Payments
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
                            <svg class="bi pe-none me-2" width="25" height="25">
                                <use xlink:href="#file-earmark" />
                            </svg>
                            Invoices
                        </button>
                        <ul class="dropdown-menu">
                            <a href="dashboard.php?addad" class="list-group-item list-group-item-action">Create Invoice</a>
                            <a href="dashboard.php?managead" class="list-group-item list-group-item-action">Manage
                                invoices</a>
                            </li>
                        </ul>
                    </div>

                    <div class="dropdown mt-3">
                        <button class="btn dropdown-toggle text-light" type="button" data-bs-toggle="dropdown">
                            <svg class="bi pe-none me-2" width="25" height="25">
                                <use xlink:href="#gear-wide-connected" />
                            </svg>
                            Settings
                        </button>
                        <ul class="dropdown-menu">
                            <a href="dashboard.php?manage" class="add-student list-group-item list-group-item-action"
                                data-toggle="modal" data-target="#modelId">System Management</a>
                            <a href="dashboard.php?grade" class="list-group-item list-group-item-action">Accademic
                                Grades</a>
                            <a href="dashboard.php?auth" class="list-group-item list-group-item-action">User
                                Authentication</a>
                            </li>
                        </ul>
                    </div>

                <?php endif ?>
                </nav>

        </div>
    </div>
</div>
<?php
include_once "add-student.php";
include_once "add-sub.php";
include_once "add-exam.php";
include_once "add-subject-catyegory.php";
include_once "add-class.php";
include_once "add-teacher.php";
include_once "attendance-choice.php";


