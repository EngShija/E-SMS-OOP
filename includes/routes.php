<?php
  if (isset($_GET['addstd'])) {
    // require_once "includes/add-student.php";
  } else if (isset($_GET['updatestd'])) {
    require_once "includes/edit-student.php";
    $_SESSION['stdid'] = $_GET['updatestd'];
  } else if (isset($_GET['managestd'])) {
    require_once "includes/student-list.php";
  } else if (isset($_GET['addprt'])) {
    require_once "includes/add-parent.php";
  } else if (isset($_GET['addtch'])) {
    if ($role['role'] == 'admin') {
      require_once "includes/add-teacher.php";
    }
  } else if (isset($_GET['managetch'])) {
    if ($role['role'] == 'admin') {
      require_once "includes/teacher-list.php";
    }
  } else if (isset($_GET['addad'])) {
    if ($role['role'] == 'admin') {
      require_once "includes/add-admin.php";
    }
  } else if (isset($_GET['grade'])) {
    if ($role['role'] == 'admin') {
      require_once "includes/grades.php";
    }
  } else if (isset($_GET['managead'])) {
    if ($role['role'] == 'admin') {
      require_once "includes/manage-admin.php";
    }
  } else if (isset($_GET['addcls'])) {
    if ($role['role'] == 'admin') {
      require_once "includes/add-class.php";
    }
  } else if (isset($_GET['addsub'])) {
    require_once "includes/add-sub.php";
  } else if (isset($_GET['managecls'])) {
    require_once "includes/manage-class.php";
  } else if (isset($_GET['managesub'])) {
    require_once "includes/manage-sub.php";
  } else if (isset($_SESSION['viewresult'])) {
    include_once __DIR__ . "/result-opt.php";
    unset($_SESSION['viewresult']);
  } else if (isset($_GET['subid'])) {
    include_once "includes/initial-editisubject.php";
  } else if (isset($_GET['examid'])) {
    include_once "includes/initial-editexam.php";
  } else if (isset($_GET['deleteid'])) {
    include_once "includes/initial-delete-student.php";
  } else if (isset($_GET['addAttendance'])) {
    include_once "includes/attendance.php";
  } else if (isset($_GET['viewAttendance'])) {
    include_once "includes/view-attendance.php";
  } else if (isset($_GET['indidualAttendance'])) {
    include_once "includes/individual-attendance.php";
  } else if (isset($_GET['manageexam'])) {
    include_once "includes/manage-exam.php";
  } else if (isset($_GET['loginHst'])) {
    include_once "includes/login-history.php";
  } else if (isset($_GET['myProfile'])) {
    include_once "includes/my-profile.php";
  } else if (isset($_GET['profileImage'])) {
    include_once "includes/profile.php";
  } else if (isset($_GET['mystudents'])) {
    include_once "includes/parent-students.php";
  }else if (isset($_GET['teacherTimetable'])) {
    include_once "includes/teacher-timetable.php";
  }else if (isset($_GET['timetable'])) {
    include_once "includes/timetable.php";
  }else if (isset($_GET['classTimetable'])) {
    include_once "includes/class-timetable.php";
  }else if (isset($_GET['roomTimetable'])) {
    include_once "includes/room-timetable.php";
  }else if (isset($_GET['manageRooms'])) {
    include_once "includes/manage-rooms.php";
  } else if (isset($_GET['editTimetable'])) {
    include_once "includes/edit-timetable.php";
  } else if (isset($_GET['mytimetable'])) {
    include_once "includes/teacher-timetable.php";
  }  else if (isset($_GET['overollTimetable'])) {
    include_once "includes/overall-timetable.php";
  } 
  else if (isset($_SESSION['classEmpty'])) {
    sweetAlert('Sorry!', 'No students For the selected Class', 'warning');
    unset($_SESSION['classEmpty']);
  } else if (isset($_SESSION['noAttendance'])) {
    sweetAlert('Sorry!', 'No attendance taken for this date!', 'warning');
    unset($_SESSION['noAttendance']);
  } else if (isset($_SESSION['classEmpty'])) {
    sweetAlert('Sorry!', 'No students to this class!', 'warning');
    unset($_SESSION['classEmpty']);
  } else if (isset($_SESSION['noRusults'])) {
    sweetAlert('Sorry', 'No results found for your selections!!', 'warning');
    unset($_SESSION['noRusults']);
  } else {
    if ($role['role'] != 'parent') {
      require_once "includes/user-count.php";
    }
    // include_once __DIR__ . "/../includes/carousel.php";
    // include_once __DIR__. "/includes/advertisements.php";
  }
  require_once __DIR__ . "/../includes/alerts.php";

  require_once __DIR__ . "/../includes/footer.php";


  //       $route = isset($_GET['route']) ? $_GET['route'] : 'home';
  
  // // Updated routing logic
// switch ($route) {
//     case 'students/add':
//         require_once __DIR__. "/includes/add-student.php";
//         break;
//     case 'students/edit':
//         require_once "includes/edit-student.php";
//         $_SESSION['stdid'] = $_GET['id'];
//         break;
//     case 'students/manage':
//         require_once "includes/student-list.php";
//         break;
//     case 'parents/add':
//         require_once "includes/add-parent.php";
//         break;
//     case 'teachers/add':
//         if ($role['role'] == 'admin') {
//             require_once "includes/add-teacher.php";
//         }
//         break;
//     case 'teachers/manage':
//         if ($role['role'] == 'admin') {
//             require_once "includes/teacher-list.php";
//         }
//         break;
//     case 'admin/add':
//         if ($role['role'] == 'admin') {
//             require_once "includes/add-admin.php";
//         }
//         break;
//     case 'grades':
//         if ($role['role'] == 'admin') {
//             require_once "includes/grades.php";
//         }
//         break;
//     case 'admin/manage':
//         if ($role['role'] == 'admin') {
//             require_once "includes/manage-admin.php";
//         }
//         break;
//     case 'classes/add':
//         if ($role['role'] == 'admin') {
//             require_once "includes/add-class.php";
//         }
//         break;
//     case 'subjects/add':
//         require_once "includes/add-sub.php";
//         break;
//     case 'classes/manage':
//         require_once "includes/manage-class.php";
//         break;
//     case 'subjects/manage':
//         require_once "includes/manage-sub.php";
//         break;
//     case 'results/view':
//         include_once __DIR__ . "/includes/result-opt.php";
//         unset($_SESSION['viewresult']);
//         break;
//     case 'attendance/add':
//         include_once "includes/attendance.php";
//         break;
//     case 'attendance/view':
//         include_once "includes/view-attendance.php";
//         break;
//     case 'attendance/individual':
//         include_once "includes/individual-attendance.php";
//         break;
//     case 'exams/manage':
//         include_once "includes/manage-exam.php";
//         break;
//     case 'login/history':
//         include_once "includes/login-history.php";
//         break;
//     case 'profile':
//         include_once "includes/my-profile.php";
//         break;
//     case 'profile/image':
//         include_once "includes/profile.php";
//         break;
//     case 'students/parent':
//         include_once "includes/parent-students.php";
//         break;
//     default:
//         if ($role['role'] != 'parent') {
//             require_once "includes/user-count.php";
//         }
//         include_once __DIR__ . "/includes/carousel.php";
//         break;
// }