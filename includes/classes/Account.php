<?php
  class Account {

    private $errorArray;

    public function __construct() {
      $this->errorArray = array();
      }

      public function register($un, $fn, $ln, $em1, $em2, $pw1, $pw2){
        $this->validateUsername($un);
        $this->validateFirstName($fn);
        $this->validateLastName($ln);
        $this->validateEmails($em1, $em2);
        $this->validatePasswords($pw1, $pw2);
      }

      private function validateUsername($un) {
          if (strlen($un) > 25 || strlen($un) < 5 ) {
            array_push($this->errorArray, "Your username must be between 5 and 25 characters");
            return;
          }
          //Check if username exists
      }

      private function validateFirstName($fn) {
        if (strlen($fn) > 25 || strlen($fm) < 2 ) {
          array_push($this->errorArray, "Your first name must be between 2 and 25 characters");
          return;
        }

      }

      private function validateLastName($ln) {
        if (strlen($ln) > 25 || strlen($ln) < 2 ) {
          array_push($this->errorArray, "Your last name must be between 2 and 25 characters");
          return;
        }

      }

      private function validateEmails($em1, $em2) {
        if ($em1 != $em2) {
          array_push($this->errorArray, "Your emails do not match!");
          return;
        }
        if (!filter_var($em1, FILTER_VALIDATE_EMAIL)) {
          array_push($this->errorArray, "Invalid Email");
          return;
        }

        //Check if email has already been used

      }

      private function validatePasswords($pw1, $pw2) {
        if ($pw1 != $pw2) {
          array_push($this->errorArray, "Password do not match!");
          return;
        }

        if (preg_match('/[^A-Za-z0-9]/', $pw1)) {
          array_push($this->errorArray, "Password can only contain numbers and letters");
          return;
        }
        if (strlen($pw1) > 25 || strlen($pw1) < 5 ) {
          array_push($this->errorArray, "Your password must be between 5 and 25 characters");
          return;

      }
    }
  }
 ?>
