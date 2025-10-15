<?php
$school->setSchoolId($_SESSION[SCHOOL_ID]);
$class->setSchoolId($_SESSION[SCHOOL_ID]);
$user->setSchoolId($_SESSION[SCHOOL_ID]);
$subject->setSchoolId($_SESSION[SCHOOL_ID]);
?>

<!-- SVG ICON DEFINITIONS -->
<svg style="display:none;">
  <!-- Students Icon -->
  <symbol id="icon-students" viewBox="0 0 64 64">
    <circle cx="20" cy="24" r="12" fill="#0d6efd"/>
    <circle cx="44" cy="24" r="12" fill="#0d6efd" opacity="0.7"/>
    <ellipse cx="32" cy="48" rx="28" ry="12" fill="#0d6efd" opacity="0.2"/>
  </symbol>
  <!-- Teachers Icon -->
  <symbol id="icon-teachers" viewBox="0 0 64 64">
    <rect x="12" y="12" width="40" height="40" rx="12" fill="#198754"/>
    <circle cx="32" cy="28" r="10" fill="#fff"/>
    <rect x="22" y="38" width="20" height="8" rx="4" fill="#fff"/>
  </symbol>
  <!-- Classes Icon -->
  <symbol id="icon-classes" viewBox="0 0 64 64">
    <rect x="8" y="16" width="48" height="32" rx="6" fill="#ffc107"/>
    <rect x="16" y="24" width="32" height="16" rx="3" fill="#fff"/>
    <rect x="28" y="36" width="8" height="8" rx="2" fill="#ffc107"/>
  </symbol>
  <!-- Admins Icon -->
  <symbol id="icon-admins" viewBox="0 0 64 64">
    <circle cx="32" cy="24" r="14" fill="#0dcaf0"/>
    <rect x="16" y="40" width="32" height="12" rx="6" fill="#0dcaf0" opacity="0.5"/>
    <polygon points="32,8 36,20 28,20" fill="#fff"/>
  </symbol>
  <!-- Parents Icon -->
  <symbol id="icon-parents" viewBox="0 0 64 64">
    <ellipse cx="32" cy="28" rx="14" ry="12" fill="#6c757d"/>
    <ellipse cx="22" cy="44" rx="8" ry="6" fill="#adb5bd"/>
    <ellipse cx="42" cy="44" rx="8" ry="6" fill="#adb5bd"/>
  </symbol>
  <!-- Subjects Icon -->
  <symbol id="icon-subjects" viewBox="0 0 64 64">
    <rect x="12" y="12" width="40" height="40" rx="8" fill="#dc3545"/>
    <rect x="20" y="20" width="24" height="6" rx="2" fill="#fff"/>
    <rect x="20" y="32" width="24" height="6" rx="2" fill="#fff"/>
    <rect x="20" y="44" width="16" height="6" rx="2" fill="#fff"/>
  </symbol>
</svg>

<div class="container py-5">
  <div class="row g-4 justify-content-center">
     <?php if ($role['role'] !== 'superadmin'): ?>
    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
      <div class="card shadow border-0 text-center h-100">
        <div class="card-body">
          <div class="mb-2">
            <svg width="48" height="48"><use xlink:href="#icon-students"/></svg>
          </div>
          <h5 class="card-title">Students</h5>
          <h2 class="card-text text-dark"><?= count($student->get_students($school->getSchoolId())) ?? '0' ?></h2>
        </div>
      </div>
    </div>
    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
      <div class="card shadow border-0 text-center h-100">
        <div class="card-body">
          <div class="mb-2">
            <svg width="48" height="48"><use xlink:href="#icon-teachers"/></svg>
          </div>
          <h5 class="card-title">Teachers</h5>
          <h2 class="card-text text-dark"><?= count($user->get_teachers()) ?? '0' ?></h2>
        </div>
      </div>
    </div>
    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
      <div class="card shadow border-0 text-center h-100">
        <div class="card-body">
          <div class="mb-2">
            <svg width="48" height="48"><use xlink:href="#icon-classes"/></svg>
          </div>
          <h5 class="card-title">Classes</h5>
          <h2 class="card-text text-dark"><?= count($class->get_all_classes()) ?? '0' ?></h2>
        </div>
      </div>
    </div>
    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
      <div class="card shadow border-0 text-center h-100">
        <div class="card-body">
          <div class="mb-2">
            <svg width="48" height="48"><use xlink:href="#icon-admins"/></svg>
          </div>
          <h5 class="card-title">Admins</h5>
          <h2 class="card-text text-dark"><?= count($user->get_admins()) ?? '0' ?></h2>
        </div>
      </div>
    </div>
    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
      <div class="card shadow border-0 text-center h-100">
        <div class="card-body">
          <div class="mb-2">
            <svg width="48" height="48"><use xlink:href="#icon-parents"/></svg>
          </div>
          <h5 class="card-title">Parents</h5>
          <h2 class="card-text text-dark"><?= count($user->get_parents($school->getSchoolId())) ?? '0' ?></h2>
        </div>
      </div>
    </div>
    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
      <div class="card shadow border-0 text-center h-100">
        <div class="card-body">
          <div class="mb-2">
            <svg width="48" height="48"><use xlink:href="#icon-subjects"/></svg>
          </div>
          <h5 class="card-title">Subjects</h5>
          <h2 class="card-text text-dark"><?= count($subject->get_all_subjects()) ?? '0' ?></h2>
        </div>
      </div>
    </div>
    <?php else :?>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
      <div class="card shadow border-0 text-center h-100">
        <div class="card-body">
          <div class="mb-2">
            <svg width="48" height="48"><use xlink:href="#icon-subjects"/></svg>
          </div>
          <h5 class="card-title">Schools</h5>
          <h2 class="card-text text-dark"><?= count($school->getAllSchools()) ?? '0' ?></h2>
        </div>
      </div>
    </div>
    <?php endif ?>
  </div>
</div>