<?php
session_start();
require_once "includes/header.php";
require_once "includes/functions.php";
require_once "models/Users.php";
require_once "models/Student.php";
kick_user_to_login('login.php', 'user_id');
$user = new User(new Database());
$users = $user->get_user_by_id($_SESSION['user_id']);
$student = new Student(new Database());
$email = $users['email_address'];
$role = $user->user_role($email);
?>
<div class="container-fluid">
    <div class="row">
        <?php require_once "includes/sidebar.php" ?>
        <main>
            <div class="header-main">

                <nav class="navbar bg-dark text-light content">
                    <div class="container-fluid">
                        <div class="navbar-header row">
                            <a class="navbar-brand" href="#"><img src="assets/images/logo.jpg" height="50" width="50"
                                    style="border-radius: 50%"></a>
                        </div>
                        <h3><?= $users['first_name']. " " . $users['last_name'] ?></h3>
                        <div class="nav-item" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button"
                            aria-controls="offcanvasExample">
                            <a href="controllers/logout.php">Logout</a>
                        </div>
                    </div>
                </nav>

            </div>
            <div class="students">
            </div>

            <?php
         if(isset($_GET['addstd'])){
          require_once "includes/add-student.php";
        }
          else if(isset($_GET['updatestd'])){
            require_once "includes/student-list.php";
            $_SESSION['stdid'] = $_GET['updatestd'];
          }
          else if(isset($_GET['managestd'])){
            require_once "includes/student-list.php";
          }
          else if(isset($_GET['addprt'])){
            require_once "includes/add-parent.php";
          }
          else if(isset($_GET['addtch'])){
            if($role['role'] == 'admin'){
            require_once "includes/add-teacher.php";
            }
          }
          else if(isset($_GET['managetch'])){
            if($role['role'] == 'admin'){
            require_once "includes/teacher-list.php";
            }
          }
          else if(isset($_GET['addad'])){
            if($role['role'] == 'admin'){
            require_once "includes/add-admin.php";
            }
          }
          else if(isset($_GET['grade'])){
            if($role['role'] == 'admin'){
            require_once "includes/grades.php";
            }
          }
          else if(isset($_GET['managead'])){
            if($role['role'] == 'admin'){
            require_once "includes/manage-admin.php";
            }
          }
          else if(isset($_GET['addcls'])){
            if($role['role'] == 'admin'){
            require_once "includes/add-class.php";
          }
        }
          else if(isset($_GET['addsub'])){
            require_once "includes/add-sub.php";
          }
          else if(isset($_GET['managecls'])){
            require_once "includes/manage-class.php";
          }
          else if(isset($_GET['managesub'])){
            require_once "includes/manage-sub.php";
          }
 else{
     require_once "includes/user-count.php";
 }
?>
        </main>
    </div>
</div>

<script src="assets/js/data.js"></script>
<script src="assets/js/data2.js"></script>
<script src="assets/js/register-student.js"></script>
<footer class="footer bg-dark text-light mt-5">&#169 2024 EngShija (+255612101742)</footer>
</body>

</html>