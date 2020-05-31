<?php
function sanitizeFormPassword($inputText) {
  $inputText = strip_tags($inputText);
  return $inputText;
}

    function sanitizeFormUsername($inputText) {
      $inputText = strip_tags($inputText);
      $inputText = str_replace(" ", "", $inputText);
      return $inputText;
    }

    function sanitizeFormString($inputText) {
      $inputText = strip_tags($inputText);
      $inputText = str_replace(" ", "", $inputText);
      $inputText = ucfirst(strtolower($inputText));
      return $inputText;
    }



    if (isset($_POST['RegisterButton'])){
      $username = sanitizeFormUsername($_POST['username']);
      $firstname = sanitizeFormString($_POST['firstname']);
      $lastname = sanitizeFormString($_POST['lastname']);
      $email = sanitizeFormString($_POST['email']);
      $confemail = sanitizeFormString($_POST['confemail']);
      $password = sanitizeFormPassword($_POST['password']);
      $confPassword = sanitizeFormPassword($_POST['confPassword']);

      $wasSuccessful = $account->register($username, $firstname, $lastname, $email, $confemail, $password, $confPassword);

      if($wasSuccessful == true) {
		      $_SESSION['userLoggedIn'] = $username;
		        header("Location: index.php");
	   }
    }

 ?>
