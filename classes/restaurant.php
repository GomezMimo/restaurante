<?php
	include 'database.php';
	class Restaurant {
		function getRestaurantId($restauranId) {
			$database = new Database();
			$database->connect();	
		}
	}
?>