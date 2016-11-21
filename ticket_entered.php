<?php
include 'classes/ticket.php';
$ticket = new Ticket();
$ticket->addTicket($_POST['restaurant'], $_POST['ticketTypeOption']);
?>