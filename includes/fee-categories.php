<?php
require_once __DIR__ . '/../models/Database.php';
require_once __DIR__ . '/../models/FeeCategory.php';

$db = new Database();
$categoryModel = new FeeCategory($db);
$categoryModel->setSchoolId($_SESSION['school_id']); // Ensure categories are linked to the correct school
$categories = $categoryModel->read();
?>

<div class="row mt-4">
    <!-- Left: Fee Category List Table -->
    <div class="col-md-8">
        <div class="card mb-3">
            <div class="card-header bg-secondary text-white">
                <strong>Fee Category List</strong>
            </div>
            <div class="card-body">
                <?php if ($categories && count($categories) > 0): ?>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Category Name</th>
                                <th>Description</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($categories as $i => $cat): ?>
                            <tr>
                                <td><?= $i + 1 ?></td>
                                <td><?= htmlspecialchars($cat['category_name']) ?></td>
                                <td><?= htmlspecialchars($cat['description']) ?></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <div class="alert alert-info">No fee categories found.</div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <!-- Right: Add Fee Category Form -->
    <div class="col-md-4">
        <div class="card">
            <div class="card-header bg-secondary text-white">
                <strong>Add Fee Category</strong>
            </div>
            <div class="card-body">
                <form action="controllers/add-fee-category.php" method="post" id="addFeeCategoryForm">
                    <div class="mb-3">
                        <label for="category_name" class="form-label">Category Name</label>
                        <input type="text" name="category_name" id="category_name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" id="description" class="form-control" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-success w-100">Add Category</button>
                </form>
            </div>
        </div>
    </div>
</div>