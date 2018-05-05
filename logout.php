<!-- Lavet med hjælp fra https://gist.github.com/HoangPV/f57143e52a2b49ca9a407508d9a0c76e -->
<?php
// Initialize the session
session_start();

// Unset all of the session variables
$_SESSION = array();

// Destroy the session.
session_destroy();

// Redirect to login page
header("location: login.php");
exit;
?>
