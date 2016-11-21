<?php
include 'classes/database.php';

	class Ticket {

		public $id_restaurant;
		public $type_ticket;

		function setIdRestaurant($IdRestaurant) {
			 $this->id_restaurant = $IdRestaurant;
		}

		function setTypeTicket($typeTicket) {
			 $this->type_ticket = $typeTicket;
		}

		function getTicketTypes() {
			$database = new Database();
			$database->connect();
			$query = "SELECT denomination FROM ticket";
			$tickets = $database->connection->query($query);
			return $tickets;
		}

		function getIdRestaurant($restaurantId) {			
			$database = new Database();
			$database->connect();
			$query = "SELECT * FROM restaurant WHERE id = '$restaurantId'";
			$restaurantExist = $database->connection->query($query)->rowCount() > 0;
			if($restaurantExist) {
				session_start();
				$_SESSION["restaurantExist"] = true;				
				header("Location: ./tickets.php");
			}else {
				session_start();
				$_SESSION["restaurantExist"] = false;
				header("Location: ./tickets.php?errorCode=1");				
			}			
		}

		/*$ticketId, $restaurantId*/
		function addTicket($restaurantId, $typeTicket){				
			try {
				$database = new Database();
				$database->connect();	
				$query = "SELECT * FROM restaurant WHERE id = '$restaurantId'";
				$restaurantExist = $database->connection->query($query)->rowCount() > 0;
				if($restaurantExist) {
					session_start();
					$_SESSION["restaurantExist"] = true;								
					header("Location: ./tickets.php?success=1");
				}else {
					session_start();
					$_SESSION["restaurantExist"] = false;
					header("Location: ./tickets.php?errorCode=1");				
				}		    
			    // set the PDO error mode to exception
			    $database->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			    // begin the transaction
			    $database->connection->beginTransaction();
			    // our SQL statements
			    $database->connection->exec("INSERT INTO exchangedticket (ticket, restaurant)VALUES ('$typeTicket', '$restaurantId')");
			    // commit the transaction
			    $database->connection->commit();			    
			    $database->connection = null;			   
			}
			catch(PDOException $e) {
			    // roll back the transaction if something failed
			    $database->connection->rollback();
			    echo "Error: " . $e->getMessage();
			}	
			/*
			$database->connection->beginTransaction();
			$database->connection->exec("INSERT INTO exchangedticket (idChange, ticket, restaurant)VALUES (14, 'Diario VIP', 1488)");
			$database->connection->commit();
			//$database->connection->exec($sql);
    		echo "New record created successfully";*/
			//1. retornar cantidad de registros
			//2. verificar en esta misma funcion cuantos se insertaron y devolver un m ensaje al usuario.
			//return 'Add ticket saved successfully';*/
		}
	}

?>