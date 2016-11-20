<?php
session_start();
include 'classes/login.php';
include 'classes/template.php';
$login = new Login();
$template = new Template('Restaurant/');
$template->setTitle('Restaurant');
echo $template->getHead();

if(!isset($_SESSION["isLogged"]) || !$_SESSION["isLogged"]) {
	$login->showSignInForm();
} else{
	echo '
	<div class="container"> ' . $template->getMenu($_SESSION["userName"], '') . '
      <div class="starter-template">
        <h1>Bootstrap starter template</h1>
        <p class="lead">Use this document as a way to quickly start any new project.<br> All you get is this text and a mostly barebones HTML document.</p>
      </div>
    </div><!-- /.container -->
	';
}

echo $template->getFooter();
?>