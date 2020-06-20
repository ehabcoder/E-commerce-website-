<?php
	include("Model/config.php");
	include("controle/classes/Constants.php");
	include("controle/classes/Account.php");
  $account = new Account($dbh);
	include("controle/handlers/registerHandler.php");
	include("controle/handlers/LoginHandler.php");
	if(isset($_SESSION['userLoggedIn'])) {
		header("Location: dashboard.php");
	}
 ?>


<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>

	<!--Bootsrap 4 CDN-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

	<!--Custom styles-->
  <link rel="stylesheet" href="view/css/registerStyle.css">

	<!-- jQuery hosted -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	<!-- Custom javascript -->
  <script src="view/js/register.js"></script>
</head>
<body>
	<?php
		if(isset($_POST['signUpButton'])) {
			echo "<script>
				$(document).ready(function(){
					$('#signIn').hide();
					$('#signUp').show();
				})
			</script>";
		}
			else {
				echo "<script>
					$(document).ready(function(){
						$('#signIn').show();
						$('#signUp').hide();
					})
						</script>";
			}
	?>
  <div class="container" id="signIn">
  	<div class="d-flex justify-content-center h-100">
  		<div class="card">
  			<div class="card-header">
  				<h3>Sign In</h3>
  				<div class="d-flex justify-content-end social_icon">
  					<span><i class="fab fa-facebook-square"></i></span>
  					<span><i class="fab fa-google-plus-square"></i></span>
  					<span><i class="fab fa-twitter-square"></i></span>
  				</div>
  			</div>
  			<div class="card-body">
  				<form method="POST">
  					<div class="input-group form-group">
  						<div class="input-group-prepend">
  							<span class="input-group-text"><i class="fas fa-user"></i></span>
  						</div>
  						<input type="text" class="form-control" placeholder="username" name="LoginUsername">

  					</div>
						<br>
  					<div class="input-group form-group">
  						<div class="input-group-prepend">
  							<span class="input-group-text"><i class="fas fa-key"></i></span>
  						</div>
  						<input type="password" class="form-control" placeholder="password" name="LoginPassword">
  					</div>
						<?php echo $account->getError(Constants::$loginFailed);?>
  					<div class="form-group" style="text-align:center;">
  						<button type="submit" name="loginButton" class="button">LOGIN</button>
  					</div>
  				</form>
  			</div>
  			<div class="card-footer">
  				<div class="d-flex justify-content-center links">
  					Don't have an account?<a id="hidesignIn" style="color:yellow; cursor:pointer;">Sign Up</a>
  				</div>
  			</div>
  		</div>
  	</div>
  </div>
  <div class="container" id="signUp" style="display:none;">
  	<div class="d-flex justify-content-center h-100">
  		<div class="card" style="height: 650px;">
  			<div class="card-header">
  				<h3>Sign Up</h3>
  				<div class="d-flex justify-content-end social_icon">
  					<span><i class="fab fa-facebook-square"></i></span>
  					<span><i class="fab fa-google-plus-square"></i></span>
  					<span><i class="fab fa-twitter-square"></i></span>
  				</div>
  			</div>
  			<div class="card-body">
  				<form id="registerForm" method="POST">
            <div class="input-group form-group">
  						<div class="input-group-prepend">
  							<span class="input-group-text"><i class="fas fa-user"></i></span>
  						</div>
  						<input type="text" class="form-control" placeholder="username" name="username">
						</div>
						<?php echo $account->getError(Constants::$userNameCharacters);?>
						<?php echo $account->getError(Constants::$usernameTaken);?>
            <div class="input-group form-group">
  						<div class="input-group-prepend">
  							<span class="input-group-text"><i class="fas fa-user"></i></span>
  						</div>
  						<input type="text" class="form-control" placeholder="First name" name="fname">
  					</div>
						<?php echo $account->getError(Constants::$firstNameCharacters);?>
            <div class="input-group form-group">
  						<div class="input-group-prepend">
  							<span class="input-group-text"><i class="fas fa-user"></i></span>
  						</div>
  						<input type="text" class="form-control" placeholder="Last name" name="lname">
  					</div>
						<?php echo $account->getError(Constants::$lastNameCharacters);?>
            <div class="input-group form-group">
  						<div class="input-group-prepend">
  							<span class="input-group-text"><i class="fas fa-user"></i></span>
  						</div>
  						<input type="email" class="form-control" placeholder="Email" name="email">
  					</div>
						<?php echo $account->getError(Constants::$emailInvalid);?>
            <div class="input-group form-group">
  						<div class="input-group-prepend">
  							<span class="input-group-text"><i class="fas fa-user"></i></span>
  						</div>
  						<input type="email" class="form-control" placeholder="confirm email" name="conEmail">
  					</div>
						<?php echo $account->getError(Constants::$emailsNotMatches);?>
            <div class="input-group form-group">
  						<div class="input-group-prepend">
  							<span class="input-group-text"><i class="fas fa-key"></i></span>
  						</div>
  						<input type="password" class="form-control" placeholder="password" name="pass">
  					</div>
						<?php echo $account->getError(Constants::$passwordCharacters);?>
						<?php echo $account->getError(Constants::$passwordNotAlphanumeric);?>
            <div class="input-group form-group">
  						<div class="input-group-prepend">
  							<span class="input-group-text"><i class="fas fa-key"></i></span>
  						</div>
  						<input type="password" class="form-control" placeholder="confirm password" name="conPass">
  					</div>
						<?php echo $account->getError(Constants::$passwordsNotMatches);?>
            <div class="form-group" style="text-align:center;">
  						<button type="submit" class="button"  name="signUpButton">signUp</button>
  					</div>
  				</form>
  			</div>
  			<div class="card-footer">
  				<div class="d-flex justify-content-center links" style="position:relative; bottom:25px;">
  					Already have account?<a id="hidesignUp" style="color:yellow; cursor:pointer;">SignIn</a>
  				</div>
  			</div>
  		</div>
  	</div>
  </div>
</body>
</html>
