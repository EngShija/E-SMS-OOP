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
else if(isset($_SESSION['roomAdded'])){
    sweetAlert('Success!', $_SESSION['roomAdded'], 'success');
    unset($_SESSION['roomAdded']);
}
else if(isset($_SESSION['roomPresent'])){
    sweetAlert('Sorry!', $_SESSION['roomPresent'], 'warning');
    unset($_SESSION['roomPresent']);
}
else if(isset($_SESSION['unknownError'])){
    sweetAlert('Sorry!', $_SESSION['unknownError'], 'error');
    unset($_SESSION['unknownError']);
}
else if(isset($_SESSION['classPresent'])){
    sweetAlert('Sorry!', $_SESSION['classPresent'], 'warning');
    unset($_SESSION['classPresent']);
}
else if(isset($_SESSION['classAdded'])){
    sweetAlert('Sorry!', $_SESSION['classAdded'], 'warning');
    unset($_SESSION['classAdded']);
}
else if(isset($_SESSION['error'])){
    sweetAlert('Oops!', $_SESSION['error'], 'error');
    unset($_SESSION['error']);
}
else if(isset($_SESSION['success'])){
    sweetAlert('Success!', $_SESSION['success'], 'success');
    unset($_SESSION['success']);
}
else if(isset($_SESSION['warning'])){
    sweetAlert('Sorry!', $_SESSION['warning'], 'warning');
    unset($_SESSION['warning']);
}
else if(isset($_SESSION['exist'])){
    $exist = $_SESSION['exist'];
    unset($_SESSION['exist']);
}