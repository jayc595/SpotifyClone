<?php
    include("includes/classes/Account.php");
    $account = new Account();

    include("includes/handlers/registerhandler.php");
    include("includes/handlers/loginhandler.php");

 ?>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Welcome to my Spotify Clone</title>
  </head>
  <body>
    <div id ="inputContainer">
      <form id="loginForm" action="register.php" method="POST">
          <h2>Login to your account</h2>
          <p>
            <label for ="loginUsername">Username</label>
            <input id="loginUsername" name="loginUsername" type="text" placeholder="Username" required>
          </p>
          <p>
            <label for="loginPassword">Password</label>
          <input id="loginPassword" name="loginPassword" type="password" placeholder="Password" required>
        </p>
        <button type ="submit" name="loginButton">Log In
        </button>

      </form>

      <form id="registerForm" action="register.php" method="POST">
          <h2>Create your free Account</h2>
          <p>
            <label for ="username">Username</label>
            <input id="username" name="username" type="text" placeholder="Username" required>
          </p>
          <p>
            <label for ="firstname">First Name</label>
            <input id="firstname" name="firstname" type="text" placeholder="First Name" required>
          </p>
          <p>
            <label for ="lastname">Last Name</label>
            <input id="lastname" name="lastname" type="text" placeholder="Last Name" required>
          </p>
          <p>
            <label for ="email">Email</label>
            <input id="email" name="email" type="email" placeholder="Email" required>
          </p>
          <p>
            <label for ="confemail">Confirm Email</label>
            <input id="confemail" name="confemail" type="email" placeholder="Confirm Email" required>
          </p>
          <p>
            <label for="password">Password</label>
          <input id="password" name="password" type="password" placeholder="Password" required>
        </p>
        <p>
          <label for="confPassword">Confirm Password</label>
        <input id="confPassword" name="confPassword" type="password" placeholder="Confirm Password" required>
      </p>
        <button type ="submit" name="RegisterButton">Register
        </button>

      </form>
    </div>
  </body>
</html>
