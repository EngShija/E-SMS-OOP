<?php
require_once __DIR__ . '/../models/Database.php';
require_once __DIR__ . '/../models/Class.php';
require_once __DIR__ . '/../models/Exam.php';
require_once __DIR__ . '/../models/Subject.php';
require_once __DIR__ . '/../models/Student.php';
require_once __DIR__ . '/../models/Results.php';

$database = new Database();
$classModel = new StudentClass($database);
$examModel = new Exam($database);
$subjectModel = new Subject($database);
$studentModel = new Student($database);
$resultModel = new Results($database);

$classes = $classModel->get_all_classes();
$exams = $examModel->get_all_exams();
$subjects = $subjectModel->get_all_subjects();

$class_id = $_GET['class_id'] ?? '';
$exam_id = $_GET['exam_id'] ?? '';
$results = [];

if ($class_id && $exam_id) {
    // Use Student model to get all students in the selected class
    $students = $studentModel->get_student_by_class($class_id);

    // Get exam name for results lookup
    $exam = null;
    foreach ($exams as $ex) {
        if ($ex['id'] == $exam_id) {
            $exam = $ex;
            break;
        }
    }
    $exam_type = $exam ? $exam['exam_name'] : '';

    foreach ($students as $student) {
        $row = [
            'full_name' => $student['first_name'] . ' ' . $student['last_name'],
            'marks' => [],
            'total' => 0,
            'average' => 0
        ];
        $total = 0;
        $count = 0;
        foreach ($subjects as $subject) {
            $mark = $resultModel->get_mark($student['unique_id'], $subject['sub_name'], $exam_type);
            $row['marks'][$subject['sub_name']] = $mark !== null ? $mark : '-';
            if ($mark !== null) {
                $total += $mark;
                $count++;
            }
        }
        $row['total'] = $total;
        $row['average'] = $count ? round($total / $count, 2) : 0;
        $results[] = $row;
    }
}
?>

<form method="get" class="mb-4">
    <label>Class:
        <select name="class_id" required>
            <option value="">Select Class</option>
            <?php foreach ($classes as $class): ?>
                <option value="<?= $class['id'] ?>" <?= $class_id == $class['id'] ? 'selected' : '' ?>>
                    <?= htmlspecialchars($class['class_name']) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </label>
    <label>Exam:
        <select name="exam_id" required>
            <option value="">Select Exam</option>
            <?php foreach ($exams as $exam): ?>
                <option value="<?= $exam['id'] ?>" <?= $exam_id == $exam['id'] ? 'selected' : '' ?>>
                    <?= htmlspecialchars($exam['exam_name']) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </label>
    <button type="submit" class="btn btn-primary">View Results</button>
</form>

<?php if ($class_id && $exam_id): ?>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Full Name</th>
                <?php foreach ($subjects as $subject): ?>
                    <th><?= htmlspecialchars($subject['sub_name']) ?></th>
                <?php endforeach; ?>
                <th>Total</th>
                <th>Average</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($results as $row): ?>
                <tr>
                    <td><?= htmlspecialchars($row['full_name']) ?></td>
                    <?php foreach ($subjects as $subject): ?>
                        <td><?= htmlspecialchars($row['marks'][$subject['sub_name']]) ?></td>
                    <?php endforeach; ?>
                    <td><?= htmlspecialchars($row['total']) ?></td>
                    <td><?= htmlspecialchars($row['average']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>