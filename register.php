<?php
    include("includes/config.php");
    include("includes/classes/Account.php");
    include("includes/classes/Constants.php");
    $account = new Account($con);

    include("includes/handlers/registerhandler.php");
    include("includes/handlers/loginhandler.php");

    function getInputValue($name) {
		if(isset($_POST[$name])) {
			echo $_POST[$name];
		}
	}
 ?>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Welcome to my Spotify Clone</title>
    <link rel="stylesheet" type="text/css" href="assets/css/register.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	  <script src="assets/js/register.js"></script>
  </head>
  <body>
    <?php

	if(isset($_POST['registerButton'])) {
		echo '<script>
				$(document).ready(function() {
					$("#loginForm").hide();
					$("#registerForm").show();
				});
			</script>';
	}
	else {
		echo '<script>
				$(document).ready(function() {
					$("#loginForm").show();
					$("#registerForm").hide();
				});
			</script>';
	}

	?>
  <div id="background">
    <div id="loginContainer">
        <div id ="inputContainer">
          <form id="loginForm" action="register.php" method="POST">
              <h2>Login to your account</h2>
              <p>
                <?php echo $account->getError(Constants::$loginFailed); ?>
                <label for ="loginUsername">Username</label>
                <input id="loginUsername" name="loginUsername" type="text" value="<?php getInputValue('loginUsername') ?>" required>
              </p>
              <p>
                <label for="loginPassword">Password</label>
              <input id="loginPassword" name="loginPassword" type="password" required>
            </p>
            <button type ="submit" name="loginButton">Log In</button>
            <div class="hasAccountText">
          <span id="hideLogin">Don't have an account yet? Signup here!</span>
          </div>
          </form>

          <form id="registerForm" action="register.php" method="POST">
              <h2>Create your free Account</h2>
              <p>
                <?php echo $account->getError(Constants::$usernameTaken); ?>
                <?php echo $account->getError(Constants::$usernameCharLimit); ?>
                <label for ="username">Username</label>
                <input id="username" name="username" type="text" value="<?php getInputValue('username') ?>" required>
              </p>
              <p>
                <?php echo $account->getError(Constants::$firstnameCharLimit); ?>
                <label for ="firstname">First Name</label>
                <input id="firstname" name="firstname" type="text" value="<?php getInputValue('firstName') ?>" required>
              </p>
              <p>
                <?php echo $account->getError(Constants::$lastnameCharLimit); ?>
                <label for ="lastname">Last Name</label>
                <input id="lastname" name="lastname" type="text" value="<?php getInputValue('lastName') ?>" required>
              </p>
              <p>
                <?php echo $account->getError(Constants::$emailsDoNotMatch); ?>
                <?php echo $account->getError(Constants::$emailIsInvalid); ?>
                <?php echo $account->getError(Constants::$emailTaken); ?>
                <label for ="email">Email</label>
                <input id="email" name="email" type="email" required>
              </p>
              <p>
                <label for ="confemail">Confirm Email</label>
                <input id="confemail" name="confemail" type="email" required>
              </p>
              <p>
                <?php echo $account->getError(Constants::$passwordsCharLimit); ?>
                <?php echo $account->getError(Constants::$passwordsDoNotMatch); ?>
                <?php echo $account->getError(Constants::$passwordsNotAlphaNum); ?>
                <label for="password">Password</label>
              <input id="password" name="password" type="password" required>
            </p>
            <p>
              <label for="confPassword">Confirm Password</label>
            <input id="confPassword" name="confPassword" type="password" required>
          </p>
            <button type ="submit" name="RegisterButton">Register</button>
            <div class="hasAccountText">
						<span id="hideRegister">Already have an account? Log in here.</span>
					  </div>
          </form>
        </div>
        <div id="loginText">
				<h1>Get great music, right now</h1>
				<h2>Listen to loads of songs for free</h2>
				<ul>
					<li>Discover music you'll fall in love with</li>
					<li>Create your own playlists</li>
					<li>Follow artists to keep up to date</li>
				</ul>
			</div>
      </div>
  </div>
  </body>
</html>
