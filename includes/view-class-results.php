<?php
require_once __DIR__ . '/../config/autoloader.php';
require_once __DIR__ . '/../config/incidences.php';
require_once __DIR__ . '/../includes/functions.php';
include_once __DIR__ . "/../config/constants.php";

$class = new StudentClass(new Database());
$class->setSchoolId($_SESSION[SCHOOL_ID]);
$classes = $class->get_all_classes();
?>

<div class="modal fade text-center" id="viewResultsModal" tabindex="-1" aria-labelledby="viewResultsModalLabel"
    aria-hidden="true" style="filter: none;">
    <div class="modal-dialog">
        <form action="?classResults" method="POST" class="col-12" id="viewResultsForm">
            <div class="modal-content">
                <div class="modal-header bg-dark text-light">
                    <h1 class="modal-title fs-5" id="viewResultsModalLabel">
                        <svg width="32" height="32" style="vertical-align:middle;">
                            <use xlink:href="#icon-results" />
                        </svg>
                        View Results by Class & Year of Study
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="class" class="form-label">Class</label>
                        <select name="class" id="class" class="form-select" required>
                            <option value="">Select Class</option>
                            <?php foreach ($classes as $myClass): ?>
                                <option value="<?= htmlspecialchars($myClass['id']) ?>">
                                    <?= htmlspecialchars($myClass['class_name']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exam" class="form-label">Exam</label>
                        <select name="exam" id="exam" class="form-select" required>
                            <option value="">Select Exam</option>
                            <?php foreach ($exams as $exam): ?>
                                <option value="<?= htmlspecialchars($exam['exam_name']) ?>">
                                    <?= htmlspecialchars($exam['exam_name']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="yos" class="form-label">Year of Study</label>
                        <select class="form-select" name="yos" id="exam">
                            <option value="">Select Year Of Study</option>
                            <?php $i = date('Y') - 1; ?>
                            <?php while ($i <= date('Y')): ?>
                                <option value="<?= $i ?>"><?= $i ?></option>
                                <?php $i++;
                            endwhile ?>
                        </select>
                        <label for="exam">Year Of Study:</label>
                    </div>
                </div>
                <div class="modal-footer bg-dark">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Show Results</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- SVG ICON for Results (place in your layout or here if not already present) -->
<svg style="display:none;">
    <symbol id="icon-results" viewBox="0 0 64 64">
        <rect x="8" y="16" width="48" height="32" rx="8" fill="#0d6efd" />
        <rect x="16" y="24" width="32" height="8" rx="2" fill="#fff" />
        <rect x="16" y="36" width="32" height="8" rx="2" fill="#fff" />
        <circle cx="32" cy="32" r="6" fill="#ffc107" />
    </symbol>
</svg>