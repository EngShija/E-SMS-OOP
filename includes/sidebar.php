<?php
require_once __DIR__ . "/../models/Users.php";
$user = new User(new Database());
$users = $user->get_user_by_id($_SESSION['user_id']) ?: $parent->get_parent_by_id($_SESSION['user_id']);
$email = $users['email_address'];
$role = $user->user_role($email) ?: $parent->user_role($email);

$myParent = $parent->get_parent_by_id($_SESSION['user_id']);
?>

<div class="offcanvas offcanvas-start bg-dark text-light" tabindex="-1" id="offcanvasExample"
    aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasExampleLabel"><img class="logo rounded-circle border border-success"
                src="assets/images/logo.jpg" height="30" width="30""></img><?= "  " ?>SMS</h5>
        <button type=" button" class="btn-close text-light" data-bs-dismiss="offcanvas" aria-label="Close"
                style="filter: invert(1);"></button>
    </div>
    <hr>

    <div class="offcanvas-body">

        <div class="d-flex flex-column flex-shrink-0 text-bg-dark" style="width: 300px;">

            <ul class="list-group col-md-3 col-lg-2 nav nav-pills flex-column mb-auto">
                <li class="dropdown">
                    <a href="dashboard.php" class="btn text-light">
                        <svg class="bi pe-none me-2" width="25" height="25" fill="white">
                            <use xlink:href="#speedometer2" />
                        </svg>
                        Dashboard
                    </a>
                </li>

                <?php if ($role['role'] == 'admin' || $role['role'] == 'teacher'): ?>

                    <li class="dropdown">
                        <button class="btn dropdown-toggle text-light" type="button" data-bs-toggle="dropdown">
                            <svg class="bi pe-none me-2" width="25" height="25" fill="white">
                                <use xlink:href="#people" />
                            </svg> Students
                        </button>
                        <ul class="dropdown-menu" style="filter: invert();">
                            <?php if ($role['role'] == 'admin'): ?>
                                <li><a href="dashboard.php?addstd" class="add-student list-group-item list-group-item-action"
                                        data-bs-toggle="modal" data-bs-target="#addStudent">Add Student</a></li>
                                <li><a href="dashboard.php?addstd" class="add-student list-group-item list-group-item-action"
                                        data-bs-toggle="modal" data-bs-target="#addStudents">Add Multiple Students </a></li>
                            <?php endif ?>
                            <li><a href="dashboard.php?managestd" class="list-group-item list-group-item-action">Manage
                                    Students</a></li>

                        </ul>
                    </li>
                    <div class="dropdown">
                        <button class="btn dropdown-toggle text-light" type="button" data-bs-toggle="dropdown">
                            <svg class="bi pe-none me-2" width="25" height="25" fill="white">
                                <use xlink:href="#grid" />
                            </svg>
                            Subjects
                        </button>
                        <ul class="dropdown-menu" style="filter: invert();">
                            <?php if ($role['role'] == 'admin'): ?>
                                <li><a href="dashboard.php?addsub" class="add-student list-group-item list-group-item-action"
                                        data-bs-toggle="modal" data-bs-target="#addSub">Add Subject</a></li>
                                <li><a href="dashboard.php?addsub" class="add-student list-group-item list-group-item-action"
                                        data-bs-toggle="modal" data-bs-target="#subcat">Add Category</a></li>
                                <a href="dashboard.php?managesub" class="list-group-item list-group-item-action">Manage
                                    Subjects</a>
                            <?php elseif ($role['role'] == 'teacher'): ?>
                                <a href="dashboard.php?managesub" class="list-group-item list-group-item-action">View
                                    Subjects</a>
                            <?php endif ?>
                            </li>
                        </ul>
                    </div>
                    <?php if ($role['role'] == 'admin'): ?>
                        <div class="dropdown mt-2">
                            <button class="btn dropdown-toggle text-light" type="button" data-bs-toggle="dropdown">
                                <svg class="bi pe-none me-2" width="25" height="25" fill="white">
                                    <use xlink:href="#file-earmark-text" />
                                </svg>
                                Examinations
                            </button>
                            <ul class="dropdown-menu" style="filter: invert();">
                                <li><a href="dashboard.php?addexm" class="add-student list-group-item list-group-item-action"
                                        data-bs-toggle="modal" data-bs-target="#addexm">Add Exam Type</a></li>

                                <a href="dashboard.php?manageexam" class="list-group-item list-group-item-action">Manage
                                    Exams</a>
                                </li>
                            </ul>
                        </div>
                        <div class="dropdown mt-2">
                            <button class="btn dropdown-toggle text-light" type="button" data-bs-toggle="dropdown">
                                <svg class="bi pe-none me-2" width="25" height="25" fill="white">
                                    <use xlink:href="#calendar3" />
                                </svg>
                                Timetables
                            </button>
                            <ul class="dropdown-menu" style="filter: invert();">
                                <li><a href="?timetable" class="add-student list-group-item list-group-item-action">Class
                                        Timetable</a></li>
                                <li><a href="?overollTimetable"
                                        class="add-student list-group-item list-group-item-action">Overall
                                        Timetable</a></li>
                                <li><a href="#" class="add-student list-group-item list-group-item-action"
                                        data-bs-toggle="modal" data-bs-target="#examTmt">Exam Timetable</a></li>
                            </ul>
                        </div>
                    <?php endif ?>
                    <?php if ($role['role'] == 'admin' || $role['role'] == 'teacher'): ?>
                        <div class="dropdown mt-2">
                            <button class="btn dropdown-toggle text-light" type="button" data-bs-toggle="dropdown">
                                <svg class="bi pe-none me-2" width="25" height="25" fill="white">
                                    <use xlink:href="#calendar3" />
                                </svg>
                                Attendance
                            </button>
                            <ul class="dropdown-menu" style="filter: invert();">
                                <li><a href="#" class="add-student list-group-item list-group-item-action"
                                        data-bs-toggle="modal" data-bs-target="#attendanceChoice">Take Attendance</a></li>

                                <a href="dashboard.php?managestd" class="list-group-item list-group-item-action"
                                    data-bs-toggle="modal" data-bs-target="#viewAttendance">View
                                    Attendances</a>
                                </li>
                            </ul>
                        </div>
                    <?php endif ?>
                    <?php if ($role['role'] == 'admin'): ?>
                        <div class="dropdown mt-2">
                            <button class="btn dropdown-toggle text-light" type="button" data-bs-toggle="dropdown">
                                <svg class="bi pe-none me-2" width="25" height="25" fill="white">
                                    <use xlink:href="#graph-up" />
                                </svg>
                                Results
                            </button>
                            <ul class="dropdown-menu" style="filter: invert();">
                                <a href="#" class="add-student list-group-item list-group-item-action" data-bs-toggle="modal"
                                    data-bs-target="#addResultsCSV">Add Results</a>
                                <a href="#" class="add-student list-group-item list-group-item-action" data-bs-toggle="modal"
                                    data-bs-target="#verifyRst">Verify Results</a>
                                <a href="dashboard.php?viewResults" class="list-group-item list-group-item-action">View
                                    Results</a>
                                </li>
                            </ul>
                        </div>
                    <?php endif ?>
                    <?php if ($role['role'] == 'teacher'): ?>
                        <button class="btn text-light" type="button" onclick="window.location.href='dashboard.php?mytimetable'">
                            <svg class="bi pe-none me-2" width="25" height="25" fill="white">
                                <use xlink:href="#calendar3" />
                            </svg>
                            My Timetable
                        </button>
                    <?php endif ?>
                    <div class="dropdown mt-2">
                        <button class="btn dropdown-toggle text-light" type="button" data-bs-toggle="dropdown">
                            <svg class="bi pe-none me-2" width="25" height="25" fill="white">
                                <use xlink:href="#table" />
                            </svg>
                            Classes
                        </button>
                        <ul class="dropdown-menu" style="filter: invert();">
                            <?php if ($role['role'] == 'admin'): ?>
                                <a href="dashboard.php?addcls" class="list-group-item list-group-item-action"
                                    data-bs-toggle="modal" data-bs-target="#addcls">Add Class</a>
                            <?php endif ?>
                            <a href="dashboard.php?managecls" class="list-group-item list-group-item-action">Manage
                                Classes</a>
                            </li>
                        </ul>
                    </div>

                    <div class="dropdown mt-2">
                        <button class="btn dropdown-toggle text-light" type="button" data-bs-toggle="dropdown">
                            <svg class="bi pe-none me-2" width="25" height="25" fill="white">
                                <use xlink:href="#table" />
                            </svg>
                            Rooms
                        </button>
                        <ul class="dropdown-menu" style="filter: invert();">
                            <?php if ($role['role'] == 'admin'): ?>
                                <a href="dashboard.php?addcls" class="list-group-item list-group-item-action"
                                    data-bs-toggle="modal" data-bs-target="#addRoom">Add Room</a>
                            <?php endif ?>
                            <a href="dashboard.php?manageRooms" class="list-group-item list-group-item-action">Manage
                                Rooms</a>
                            </li>
                        </ul>
                    </div>
                <?php endif ?>

                <?php if ($role['role'] == 'parent'): ?>
                    <div class="dropdown">
                        <button class="btn text-light" type="button"
                            onclick="window.location.href='dashboard.php?mystudents'">
                            <img src="assets/images/book-open.svg" height="28" width="28" style="filter: invert(1);"></img>
                            My Students
                        </button>
                    </div>

                    <div class="dropdown">
                        <button class="btn dropdown-toggle text-light" type="button" data-bs-toggle="dropdown">
                            <img src="assets/images/book-open.svg" height="28" width="28" style="filter: invert(1);"></img>
                            Updates
                        </button>
                        <ul class="dropdown-menu" style="filter: invert();">
                            <a href="dashboard.php?addad" class="list-group-item list-group-item-action">Broadcast
                                Updates</a>
                            <a href="dashboard.php?managead" class="list-group-item list-group-item-action">Private
                                Updates</a>
                            </li>
                        </ul>
                    </div>

                    <div class="dropdown mt-2">
                        <button class="btn dropdown-toggle text-light" type="button" data-bs-toggle="dropdown">
                            <svg class="bi pe-none me-2" width="25" height="25" fill="white">
                                <use xlink:href="#graph-up" />
                            </svg>
                            Results
                        </button>
                        <ul class="dropdown-menu" style="filter: invert();">
                            <a href="dashboard.php?" class="list-group-item list-group-item-action" data-bs-toggle="modal"
                                data-bs-target="#result">View/Print results</a>
                            </li>
                        </ul>
                    </div>

                    <div class="dropdown mt-2">
                        <button class="btn dropdown-toggle text-light" type="button" data-bs-toggle="dropdown">
                            <svg class="bi pe-none me-2" width="25" height="25" fill="white">
                                <use xlink:href="#calendar3" />
                            </svg>
                            Attendance
                        </button>
                        <ul class="dropdown-menu" style="filter: invert();">
                            <a href="dashboard.php?indidualAttendance=<?= $myParent['student_id'] ?>"
                                class="list-group-item list-group-item-action">View student Attendance</a>
                            </li>
                        </ul>
                    </div>

                    <div class="dropdown mt-2">
                        <button class="btn dropdown-toggle text-light" type="button" data-bs-toggle="dropdown">
                            <svg class="bi pe-none me-2" width="25" height="25" fill="white">
                                <use xlink:href="#credit-card" />
                            </svg>
                            Payments
                        </button>
                        <ul class="dropdown-menu" style="filter: invert();">
                            <a href="dashboard.php?" class="list-group-item list-group-item-action">Make payments</a>
                            <a href="dashboard.php?" class="list-group-item list-group-item-action">View Payment details</a>
                            </li>
                        </ul>
                    </div>
                <?php endif ?>

                <?php if ($role['role'] == 'admin'): ?>
                    <div class="dropdown mt-2">
                        <button class="btn dropdown-toggle text-light" type="button" data-bs-toggle="dropdown">
                            <svg class="bi pe-none me-2" width="25" height="25" fill="white">
                                <use xlink:href="#people" />
                            </svg>
                            Teachers
                        </button>
                        <ul class="dropdown-menu" style="filter: invert();">
                            <li><a href="#" class="list-group-item list-group-item-action" data-bs-toggle="modal"
                                    data-bs-target="#addtch">Add Teacher</a>
                            </li>
                            <li><a href="dashboard.php?managetch" class="list-group-item list-group-item-action">Manage
                                    Teachers</a>
                            </li>
                        </ul>
                    </div>

                    <div class="dropdown mt-2">
                        <button class="btn dropdown-toggle text-light" type="button" data-bs-toggle="dropdown">
                            <svg class="bi pe-none me-2" width="25" height="25" fill="white">
                                <use xlink:href="#people-circle" />
                            </svg>
                            Admins
                        </button>
                        <ul class="dropdown-menu" style="filter: invert();">
                            <a href="dashboard.php?addad" class="list-group-item list-group-item-action">Manage Admins</a>
                            </li>
                        </ul>
                    </div>

                    <div class="dropdown mt-2">
                        <button class="btn dropdown-toggle text-light" type="button" data-bs-toggle="dropdown">
                            <svg class="bi pe-none me-2" width="25" height="25" fill="white">
                                <use xlink:href="#credit-card" />
                            </svg>
                            Payments
                        </button>
                        <ul class="dropdown-menu" style="filter: invert();">
                            <a href="#" class="list-group-item list-group-item-action">Add Payment details</a>
                            <a href="#" class="list-group-item list-group-item-action">Pending payments</a>
                            <a href="#" class="list-group-item list-group-item-action">Completed payments</a>
                            </li>
                        </ul>
                    </div>

                    <div class="dropdown mt-2">
                        <button class="btn dropdown-toggle text-light" type="button" data-bs-toggle="dropdown">
                            <svg class="bi pe-none me-2" width="25" height="25" fill="white">
                                <use xlink:href="#file-earmark" />
                            </svg>
                            Invoices
                        </button>
                        <ul class="dropdown-menu" style="filter: invert();">
                            <a href="dashboard.php?addad" class="list-group-item list-group-item-action">Create Invoice</a>
                            <a href="dashboard.php?managead" class="list-group-item list-group-item-action">Manage
                                invoices</a>
                            </li>
                        </ul>
                    </div>

                    <div class="dropdown mt-2">
                        <button class="btn dropdown-toggle text-light" type="button" data-bs-toggle="dropdown">
                            <svg class="bi pe-none me-2" width="25" height="25" fill="white">
                                <use xlink:href="#gear-wide-connected" />
                            </svg>
                            Settings
                        </button>
                        <ul class="dropdown-menu" style="filter: invert();">
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
                <div class="dropdown mt-2">
                    <button class="btn dropdown-toggle text-light" type="button" data-bs-toggle="dropdown">
                        <svg class="bi pe-none me-2" width="25" height="25" fill="white">
                            <use xlink:href="#credit-card" />
                        </svg>
                        School Fees
                    </button>
                    <ul class="dropdown-menu" style="filter: invert();">
                        <a href="dashboard.php?payFees" class="list-group-item list-group-item-action">Pay Fees</a>
                        <a href="dashboard.php?viewFees" class="list-group-item list-group-item-action">View Payment
                            History</a>
                    </ul>
                </div>
                </nav>

        </div>
    </div>
    <div class="offcanvas-footer">
        <hr>
        <div class="dropdown mt-2">
            <button class="btn text-light" type="button" data-bs-toggle="dropdown">
                <div class="d-inline-flex">
                    <img class="rounded-circle border border-success" src="uploads/<?= $users['profile_image'] ?>"
                        height="30" width="30"></img>
                    <h5 class=" dropdown-toggle ml-3">Account</h5>
                </div>
            </button>
            <ul class="dropdown-menu p-2" style="filter: invert();">
                <div class="d-inline-flex">
                    <img src="assets/images/user.svg" height="20" width="20"></img>
                    <a href="dashboard.php?myProfile" class="list-group-item list-group-item-action"> My Profile</a>
                </div>
                <hr>
                <div class="d-inline-flex">
                    <img src="assets/images/user.svg" height="20" width="20"></img>
                    <a href="#" class="list-group-item list-group-item-action" data-bs-toggle="modal"
                        data-bs-target="#updatePass">Change Password</a>
                </div>
                <hr>
                <div class="d-inline-flex">
                    <img src="assets/images/book-open.svg" height="20" width="20"></img>
                    <a href="dashboard.php?loginHst" class="list-group-item list-group-item-action">Login History</a>
                </div>
                <hr>
                <div class="d-inline-flex">
                    <img src="assets/images/log-out.svg" height="20" width="20"></img>
                    <a class="list-group-item list-group-item-action" href="#" title="Logout"
                        onclick="warningAlert('Are you sure you want to exit?', 'controllers/logout.php')">Logout</a>
                </div>
                <hr>
                </li>
            </ul>
        </div>
    </div>
</div>
<?php
include_once "add-student.php";
include_once "add-sub.php";
include_once "add-exam.php";
include_once "add-subject-catyegory.php";
include_once "add-class.php";
include_once "add-room.php";
include_once "add-teacher.php";
include_once "attendance-choice.php";
include_once "initial-view-attendance.php";
include_once "add-timetable.php";
include_once "view-class-timetable.php";
include_once "view-result.php";
include_once "view-exam-timetable.php";
include_once "verify-results.php";
include_once "update-password.php";
include_once "add-multiple-students.php";
include_once "add-multiple-results.php";
