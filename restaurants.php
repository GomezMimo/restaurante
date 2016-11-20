<?php
session_start();
include 'classes/restaurant.php';
include 'classes/template.php';
$restaurant = new Restaurant();
$template = new Template('Restaurant/');
$template->setTitle('Restaurant');
echo $template->getHead();

if(!isset($_SESSION["isLogged"]) || !$_SESSION["isLogged"]) {
	header("Location: index.php");
} else{
	echo '
	<div class="container"> ' . $template->getMenu($_SESSION["userName"], "restaurants") . '
      <div class="starter-template">
        <h1>Restaurant</h1>
		

      </div>
    </div><!-- /.container -->
	';
}

echo $template->getFooter();
?>