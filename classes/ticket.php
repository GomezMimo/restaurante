<?php
include 'classes/database.php';

	class Ticket {

		function getTicketTypes() {
			$database = new Database();
			$database->connect();
			$query = "SELECT denomination FROM ticket";
			$tickets = $database->connection->query($query);

			return $tickets;
		}

		function getIdRestaurant($restaurantId) {
			
		}

		function addTicket($ticketId, $restaurantId){
			$database = new Database();
			$database->connect();
			$query = "SELECT * FROM app_user WHERE user_name = '$userName' AND password = '$password' ";
			//1. retornar cantidad de registros
			//2. verificar en esta misma funcion cuantos se insertaron y devolver un m ensaje al usuario.
			return 'Add ticket saved successfully';
		}
	}

?>