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
	$html = "";
	$errorCode = isset($_GET['errorCode']) ? $_GET['errorCode'] : 0;
	$errorMessage = '';

	if ($errorCode == 1) {
		$errorMessage = "<p class=\"error-message\">ID restaurant doesn't exist, validate it again.</p>";
	} 

	$tickets = "";
	
	foreach ($ticket->getTicketTypes() as $ticketOption) {
		$value = $ticketOption['denomination'];
		$tickets .= "<option value=\"$value\" name=\"$value\">$value</option>";
	}	
	$html = '
	<div class="container"> ' . $template->getMenu($_SESSION["userName"], "tickets") . '		
      <div class="starter-template">      
      	<h1 class="ticket-header">Tickets</h1>
      	' . $errorMessage . '
	    <form class="container-ticket-form" method="post" action="ticket_entered.php">	        
			<select class="form-control" name="ticketTypeOption">
					<option value="Select type of ticket" disabled selected>Select type of ticket</option>
					' . $tickets . '
			</select>					   	
		    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="ID restaurant" name="restaurant">	
		    <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Add ticket</button>	  	
	  	</form>
      </div>
    </div><!-- /.container -->
	';
	echo $html;
	/*
	echo $html;
	if($_SESSION["restaurantExist"]) {
		$_SESSION["restaurantExist"] = false;
		$ticket->addTicket();
	}else{		

	}*/
}
echo $template->getFooter();
?>