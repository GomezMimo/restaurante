<?php
include 'database.php';

	class Login {

		function signIn($userName, $password) {
			$database = new Database();
			$database->connect();
			$query = "SELECT * FROM app_user WHERE user_name = '$userName' AND password = '$password' ";
			$isUserValid = $database->connection->query($query)->rowCount() > 0;

			if ($isUserValid) {
				session_start();
				$_SESSION["isLogged"] = true;
				$_SESSION["userName"] = $userName;
				header("Location: index.php");
			} else{
				header("Location: index.php?errorCode=1");
			}
			
			
			$database->close();
		}

		function signOut(){
			// datos sesion
			// cierra sesion
			// redire al usuario a la pag principal
			
		}

		function showSignInForm(){
			$errorCode = isset($_GET['errorCode']) ? $_GET['errorCode'] : 0;
			$errorMessage = '';

			if ($errorCode == 1) {
				$errorMessage = "<p class=\"error-message\">Access Denied, user and pass are invalid</p>";
			}

			echo
			'<div class="container">
			    <div class="card card-container signin">
			    	' . $errorMessage . '
			        <div class="image-profile-signin">
			            <span><i class="fa fa-user-circle fa-6" aria-hidden="true"></i></span>
			        </div>
			        <p id="profile-name" class="profile-name-card"></p>
			        <form class="form-signin" method="post" action="signin.php">
			            <span id="reauth-email" class="reauth-email"></span>
			            <input type="text" name="username" class="form-control" placeholder="Username" required autofocus>
			            <input type="password" name="password" class="form-control" placeholder="Password" required>
			            
			            <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Sign in</button>
			        </form><!-- /form -->
			    </div><!-- /card-container -->
			</div><!-- /container -->';
		}
	}
?>