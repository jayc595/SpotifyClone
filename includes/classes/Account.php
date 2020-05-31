<?php
  class Account {

    private $con;
    private $errorArray;

    public function __construct($con) {
      $this->con = $con;
      $this->errorArray = array();
      }

      public function login($un, $pw1) {

			$pw1 = md5($pw1);

			$query = mysqli_query($this->con, "SELECT * FROM users WHERE username='$un' AND password='$pw1'");

			if(mysqli_num_rows($query) == 1) {
				return true;
			}
			else {
				array_push($this->errorArray, Constants::$loginFailed);
				return false;
			}

		}

      public function register($un, $fn, $ln, $em1, $em2, $pw1, $pw2){
        $this->validateUsername($un);
        $this->validateFirstName($fn);
        $this->validateLastName($ln);
        $this->validateEmails($em1, $em2);
        $this->validatePasswords($pw1, $pw2);

        if(empty($this->errorArray) == true) {
				//Insert into db
				return $this->insertUserDetails($un, $fn, $ln, $em1, $pw1);
			}
			else {
				return false;
			}

      }

      public function getError($error) {
			if(!in_array($error, $this->errorArray)) {
				$error = "";
			}
			return "<span class='errorMessage'>$error</span>";
		}

    private function insertUserDetails($un, $fn, $ln, $em1, $pw1) {
			$encryptedPw = md5($pw1);
			$profilePic = "assets/images/profilepics/profilepicture.png";
			$date = date("Y-m-d");

			$result = mysqli_query($this->con, "INSERT INTO users VALUES ('', '$un', '$fn', '$ln', '$em1', '$encryptedPw', '$date', '$profilePic')");

			return $result;
		}

      private function validateUsername($un) {
          if (strlen($un) > 25 || strlen($un) < 5 ) {
            array_push($this->errorArray, Constants::$usernameCharLimit);
            return;
          }
          $checkUsernameQuery = mysqli_query($this->con, "SELECT username FROM users WHERE username='$un'");
			       if(mysqli_num_rows($checkUsernameQuery) != 0) {
				     array_push($this->errorArray, Constants::$usernameTaken);
				     return;
			}
      }

      private function validateFirstName($fn) {
        if (strlen($fn) > 25 || strlen($fm) < 2 ) {
          array_push($this->errorArray, Constants::$firstnameCharLimit);
          return;
        }

      }

      private function validateLastName($ln) {
        if (strlen($ln) > 25 || strlen($ln) < 2 ) {
          array_push($this->errorArray, Constants::$lastnameCharLimit);
          return;
        }

      }

      private function validateEmails($em1, $em2) {
        if ($em1 != $em2) {
          array_push($this->errorArray, Constants::$emailsDoNotMatch);
          return;
        }
        if (!filter_var($em1, FILTER_VALIDATE_EMAIL)) {
          array_push($this->errorArray, Constants::$emailIsInvalid);
          return;
        }

        $checkEmailQuery = mysqli_query($this->con, "SELECT email FROM users WHERE email='$em1'");
			if(mysqli_num_rows($checkEmailQuery) != 0) {
				array_push($this->errorArray, Constants::$emailTaken);
				return;
			}

      }

      private function validatePasswords($pw1, $pw2) {
        if ($pw1 != $pw2) {
          array_push($this->errorArray, Constants::$passwordsDoNotMatch);
          return;
        }

        if (preg_match('/[^A-Za-z0-9]/', $pw1)) {
          array_push($this->errorArray, Constants::$passwordsNotAlphaNum);
          return;
        }
        if (strlen($pw1) > 25 || strlen($pw1) < 5 ) {
          array_push($this->errorArray, Constants::$passwordsCharLimit);
          return;

      }

    }

  }
 ?>
