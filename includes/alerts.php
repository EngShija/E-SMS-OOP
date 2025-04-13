<?php
if (isset($_SESSION['updated'])) {
    sweetAlert('Success', 'Detailes updated successfully!', 'success');
    unset($_SESSION['updated']);
} else if (isset($_SESSION['resultAdded'])) {
    sweetAlert('Success', $_SESSION['resultAdded'] . ' Results Added Successfully!', 'success');
    unset($_SESSION['resultAdded']);
} else if (isset($_SESSION['noRusults'])) {
    sweetAlert('Sorry', 'No results found for your selections!!', 'warning');
    unset($_SESSION['noRusults']);
} else if (isset($_SESSION['parentChanged'])) {
    sweetAlert('Sorry', 'A parent with email ' . $_SESSION['parentChanged'] . 'already exists, if is not a parent for a specific student, go and update!', 'warning');
    unset($_SESSION['parentChanged']);
}
else if(isset($_SESSION['parentPresent'])){
    $parentPresent = $_SESSION['parentPresent'];
    sweetAlert('Sorry!', 'A user with entered email is found as '. strtoupper($parentPresent). " and added as parent for this student!", 'warning');
    unset($_SESSION['parentPresent']);
}
else if(isset($_SESSION['exist'])){
    $exist = $_SESSION['exist'];
    unset($_SESSION['exist']);
}