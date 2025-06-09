<?php
include_once __DIR__ . "/../models/Database.php";
include_once __DIR__ . "/../models/Class.php";
require_once __DIR__ . "/../includes/functions.php";

$class = new StudentClass(new Database());
?>


<div class="modal fade text-center" id="addStudents" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
    style="filter: none;">
    <div class="modal-dialog modal-lg">
        <form action="controllers/import-students-csv.php" method="POST" class=" col-sm-5 col-lg-5 col-xs-5" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header bg-dark text-light">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Import SVG file to add Multiple Students</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body addstd">
                    <div class="error-text">

                    </div>

                    <label for="csvFile" class="form-label">Import Students (CSV):</label>
                    <input type="file" name="csvFile" id="csvFile" class="form-control mb-2" accept=".csv" title="Import Students (CSV):" required>
                </div>
                <div class="modal-footer bg-dark">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    <div class="button">
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<script src="assets/js/data2.js"></script>