<?php
session_start();

include('google_config.php');

if (isset($_SESSION['access_token'])) {
    $google_client->revokeToken();
    session_destroy();
}

session_destroy();

header("Location: login.php");
exit();
?>
