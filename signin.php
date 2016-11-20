<?php
include 'classes/login.php';
$login = new Login();
$login->signIn($_POST['username'], $_POST['password']);
?>