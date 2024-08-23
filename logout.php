<?php
session_start();
session_unset();
session_destroy();

// Clear the cookie
if (isset($_COOKIE['username'])) {
    setcookie('username', '', time() - 3600, "/"); // Cookie expired
}

header("location: index.php");
exit();
?>
