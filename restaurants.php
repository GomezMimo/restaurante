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
		<form class="container-ticket-form">
	        <h1 class="ticket-header">Restaurants</h1>			
		    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="ID restaurant">	
		    <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Find restaurant</button>	  	
	  	</form>
      </div>
    </div><!-- /.container -->
	';
}

echo $template->getFooter();
?>