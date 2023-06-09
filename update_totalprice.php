<?php
session_start();

if (isset($_POST['totalPrice'])) {
    $_SESSION['totalprice'] = $_POST['totalPrice'];
}
?>
