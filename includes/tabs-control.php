<?php

// Generate a unique session token per tab
if (!isset($_SESSION['tab_token'])) {
    $_SESSION['tab_token'] = bin2hex(random_bytes(32)); // Unique for each tab
}

// Get the current session ID
$sessionId = session_id();
$tabToken = $_SESSION['tab_token'];

if (!isset($_SESSION['tab_initialized'])) {
    session_regenerate_id(true); // Create a new session ID for each tab
    $_SESSION['tab_initialized'] = true;
}
?>

<script>
        let storedTabToken = sessionStorage.getItem('tab_token');
        let serverTabToken = "<?= $tabToken; ?>"; // Get PHP session's tab token

        console.log("Stored Tab Token in sessionStorage:", storedTabToken);
        console.log("Server Tab Token from PHP:", serverTabToken);

        if (!storedTabToken) {
            // First time opening this tab, store the tab token
            sessionStorage.setItem('tab_token', serverTabToken);
            console.log("New tab detected - Storing tab token:", serverTabToken);
        } else if (storedTabToken !== serverTabToken) {
            // If the stored tab token doesn't match the session's tab token, force logout
            console.warn("Mismatch detected! Logging out...");
            fetch('controllers/logout.php')
                .then(() => {
                    alert("New tab detected. Session expired.");
                    sessionStorage.clear();
                    window.location.href = "login.php"; // Redirect to login
                });
        }
    </script>



