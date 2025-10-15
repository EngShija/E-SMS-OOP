<?php
session_start();
require_once __DIR__ . '/../models/Database.php';
require_once __DIR__ . '/../models/FeeStructure.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $classId = $_POST['class_id'] ?? null;
    $categoryId = $_POST['category_id'] ?? null;
    $amount = $_POST['amount'] ?? null;
    $term = $_POST['term'] ?? null;

    if ($classId && $categoryId && $amount && $term) {
        $db = new Database();
        $feeStructureModel = new FeeStructure($db->getConnection());
        $feeStructureModel->setSchoolId($_SESSION['school_id']); // Ensure the fee structure is linked to the correct school
        $result = $feeStructureModel->create($classId, $categoryId, $amount, $term);

        if ($result) {
            $_SESSION['success'] = "Fee structure added successfully!";
        } else {
            $_SESSION['error'] = "Failed to add fee structure.";
        }
    } else {
        $_SESSION['error'] = "All fields are required.";
    }
}

header("Location: ../dashboard.php?feeStracture=1");
exit;