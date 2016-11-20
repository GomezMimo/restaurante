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
		$tickets .= "<option value=\"$value\">$value</option>";
	}

	echo '
	<div class="container"> ' . $template->getMenu($_SESSION["userName"], "tickets") . '
      <div class="starter-template">
        <h1>Tickets</h1>
		<select class="form-control">
				' . $tickets . '
		</select>
      </div>
    </div><!-- /.container -->
	';
}

echo $template->getFooter();
?>