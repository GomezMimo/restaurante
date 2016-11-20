<?php

include 'classes/login.php';
include 'classes/template.php';

$login = new Login();
$template = new Template('Restaurant/');

$template->setTitle('Restaurant');
echo $template->getHead();
$login->showSignInForm();
echo $template->getFooter();
?>
