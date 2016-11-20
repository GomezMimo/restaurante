<?php
session_start();
include 'classes/ticket.php';
include 'classes/template.php';
$ticket = new Ticket();
$template = new Template('Restaurant/');
$template->setTitle('Restaurant');
echo $template->getHead();


if(!isset($_SESSION["isLogged"]) || !$_SESSION["isLogged"]) {
	header("Location: index.php");	
} else{
	$tickets = "";
	
	foreach ($ticket->getTicketTypes() as $ticket) {
		$value = $ticket['denomination'];
		$tickets .= "<option value=\"$value\" name=\"$value\">$value</option>";
	}	
	echo '
	<div class="container"> ' . $template->getMenu($_SESSION["userName"], "tickets") . '
      <div class="starter-template">
	      <form class="container-ticket-form" method="post" action="tickets.php">
	        <h1 class="ticket-header">Tickets</h1>
			<select class="form-control">
					<option value="Select type of ticket" disabled selected>Select type of ticket</option>
					' . $tickets . '
			</select>					   	
		    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="ID restaurant" name="restaurant">	
		    <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Add ticket</button>	  	
	  	</form>
      </div>
    </div><!-- /.container -->
	';
}
$ticket->getIdRestaurant(isset($_POST['restaurant']));
echo $template->getFooter();
?>