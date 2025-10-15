<?php
require_once __DIR__ . '/../models/Database.php';
require_once __DIR__ . '/../models/Class.php';
require_once __DIR__ . '/../models/FeeCategory.php';

// Fetch classes and categories for the dropdowns
$db = new Database();
$classModel = new StudentClass($db);
$categoryModel = new FeeCategory($db);
$categoryModel->setSchoolId($_SESSION['school_id']); // Ensure categories are linked to the correct school
$classModel->setSchoolId($_SESSION['school_id']); // Ensure classes are linked to the correct school
$classes = $classModel->get_all_classes();
$categories = $categoryModel->read();
?>

<div class="row mt-4">
    <!-- Left: Fee Structure List Table -->
    <div class="col-md-8">
        <div class="card mb-3">
            <div class="card-header bg-secondary text-white">
                <strong>Fee Structure List</strong>
            </div>
            <div class="card-body">
                <?php
                // Example: Fetch and display fee structures
                require_once __DIR__ . '/../models/FeeStructure.php';
                $feeStructureModel = new FeeStructure($db->getConnection());
                // You may want to fetch all or by class/category as needed
                $feeStructures = $feeStructureModel->getAll(); // Implement getAll() in your model

                if ($feeStructures && count($feeStructures) > 0): ?>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Class</th>
                                <th>Category</th>
                                <th>Amount</th>
                                <th>Term</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($feeStructures as $i => $fs): ?>
                            <tr>
                                <td><?= $i + 1 ?></td>
                                <td><?= htmlspecialchars($fs['class_id']) ?></td>
                                <td><?= htmlspecialchars($fs['category_id']) ?></td>
                                <td><?= htmlspecialchars($fs['amount']) ?></td>
                                <td><?= htmlspecialchars($fs['term']) ?></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <div class="alert alert-info">No fee structures found.</div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <!-- Right: Add Fee Structure Form -->
    <div class="col-md-4">
        <div class="card">
            <div class="card-header bg-secondary text-white">
                <strong>Add Fee Structure</strong>
            </div>
            <div class="card-body">
                <form action="controllers/add-fee-structure.php" method="post" id="addFeeStructureForm">
                    <div class="mb-3">
                        <label for="class_id" class="form-label">Class</label>
                        <select name="class_id" id="class_id" class="form-select" required>
                            <option value="">Select Class</option>
                            <?php foreach ($classes as $class): ?>
                                <option value="<?= htmlspecialchars($class['id']) ?>">
                                    <?= htmlspecialchars($class['class_name']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="category_id" class="form-label">Fee Category</label>
                        <select name="category_id" id="category_id" class="form-select" required>
                            <option value="">Select Category</option>
                            <?php foreach ($categories as $cat): ?>
                                <option value="<?= htmlspecialchars($cat['id']) ?>">
                                    <?= htmlspecialchars($cat['category_name']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="amount" class="form-label">Amount</label>
                        <input type="number" step="0.01" min="0" name="amount" id="amount" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="term" class="form-label">Term</label>
                        <input type="text" name="term" id="term" class="form-control" placeholder="e.g. Term 1" required>
                    </div>
                    <button type="submit" class="btn btn-success w-100">Add Fee Structure</button>
                </form>
            </div>
        </div>
    </div>
</div>