<?php
session_start();
require_once __DIR__ . '/../models/Database.php';
require_once __DIR__ . '/../models/FeeCategory.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $categoryName = $_POST['category_name'] ?? null;
    $description = $_POST['description'] ?? '';

    if ($categoryName) {
        $db = new Database();
        $categoryModel = new FeeCategory($db);
        $categoryModel->name = $categoryName;
        $categoryModel->description = $description;
        $categoryModel->setSchoolId($_SESSION['school_id']); // Ensure the category is linked to the correct school
        $result = $categoryModel->create();

        if ($result) {
            $_SESSION['success'] = "Fee category added successfully!";
        } else {
            $_SESSION['error'] = "Failed to add fee category.";
        }
    } else {
        $_SESSION['error'] = "Category name is required.";
    }
}

header("Location: ../dashboard.php?feeCategories=1");
exit;