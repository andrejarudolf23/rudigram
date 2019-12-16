<?php

class Account {
   
   private $errorArray;
   private $con;

   public function __construct($con) {
      $this->con = $con;
      $this->errorArray = array();
   }

   public function getError($error) {
      if(!in_array($error, $this->errorArray)) {
         $error = "";
      }

      return "<span class='errorMessage'>$error</span>";
   }

   public function getSuccess($message) {
      if(!in_array($message, $this->errorArray)) {
         $message = "";
      }

      return "<span class='successMessage'>$message</span>";
   }

   public function login($email, $pw) {
      $encryptedPw = md5($pw);

      $userCheck = mysqli_query($this->con, "SELECT * FROM users WHERE email='$email' AND password='$encryptedPw'");

      if(mysqli_num_rows($userCheck) == 1) {
         $row = mysqli_fetch_array($userCheck);
         $username = $row['username'];
         
         if($row['userClosed'] == 'yes') {
            $reopenAcc = mysqli_query($this->con, "UPDATE users SET userClosed='no' WHERE email='$email'");
         }

         $_SESSION['userLoggedIn'] = $username;

         return true;
      }

      array_push($this->errorArray, Constants::$loginFailed);
      return false;
   }

   public function register($fname, $lname, $email1, $email2, $pw1, $pw2) {
      $this->validateFirstName($fname);
      $this->validateLastName($lname);
      $this->validateEmails($email1, $email2);
      $this->validatePasswords($pw1, $pw2);

      if(empty($this->errorArray)) {
         return $this->insertUserIntoDb($fname, $lname, $email1, $pw1);
      }

      return false;
   }

   private function insertUserIntoDb($fname, $lname, $em, $pw) {
      $un = $this->generateUsername($fname, $lname);
      $encryptedPw = md5($pw);
      $rand = rand(1,5);
      $profilePic = $this->randomProfilePicGenerator($rand);
      $signUpDate = date("Y-m-d H:i:s");

      $query = mysqli_query($this->con, "INSERT INTO users VALUES('', '$fname', '$lname', '$un', '$em', '$encryptedPw', '$signUpDate', '$profilePic', '0', '0', 'no', ',')");

      //if the query was successful it will return true
      return $query;
   }

   private function generateUsername($firstName, $lastName) {
      //generate username
      $un = strtolower($firstName . "_" . $lastName);
      $usernameCheck = mysqli_query($this->con, "SELECT username FROM users WHERE username='$un'");

      $i = 1;
      if(mysqli_num_rows($usernameCheck) > 0) {
         //username already exists, generate another username
         $un = $un . "_" . $i;
         $i++;
      }

      return $un;
   }

   private function randomProfilePicGenerator($num) {
      $pic = "";
      switch($num) {
         case 1:
            $pic .= "assets/images/profilePics/defaults/head_alizarin.png";
         break;
         case 2:
            $pic .= "assets/images/profilePics/defaults/head_deep_blue.png";
         break;
         case 3:
            $pic .= "assets/images/profilePics/defaults/head_emerald.png";
         break;
         case 4:
            $pic .= "assets/images/profilePics/defaults/head_red.png";
         break;
         case 5:
            $pic .= "assets/images/profilePics/defaults/head_carrot.png";
         break;
         default:
            $pic .= "assets/images/profilePics/defaults/head_sun_flower.png";
         break;
      }

      return $pic;
   }

   private function validateFirstName($fn) {
      if(strlen($fn) > 25 || strlen($fn) < 2) {
         array_push($this->errorArray, Constants::$firstNameLength);
         return;
      }
   }

   private function validateLastName($ln) {
      if(strlen($ln) > 25 || strlen($ln) < 2) {
         array_push($this->errorArray, Constants::$lastNameLength);
         return;
      }
   }

   private function validateEmails($em1, $em2) {
      if($em1 !== $em2) {
         array_push($this->errorArray, Constants::$emailsDoNotMatch);
         return;
      }
      //check if email well-formated
      if(!filter_var($em1, FILTER_VALIDATE_EMAIL)) {
         array_push($this->errorArray, Constants::$emailInvalid);
         return;
      }

      $emailCheck = mysqli_query($this->con, "SELECT email FROM users WHERE email='$em1'");
      if(mysqli_num_rows($emailCheck) > 0) {
         array_push($this->errorArray, Constants::$emailTaken);
         return;
      }
   }

   private function validatePasswords($pw1, $pw2) {
      if($pw1 !== $pw2) {
         array_push($this->errorArray, Constants::$passwordsDoNotMatch);
         return;
      }

      //check if it contains anything other than letters and numbers
      if(preg_match('/[^A-Za-z0-9]/', $pw1)) {
         array_push($this->errorArray, Constants::$passwordNotAlphanumeric);
         return;
      }

      if(strlen($pw1) > 30 || strlen($pw1) < 5) {
         array_push($this->errorArray, Constants::$passwordLength);
         return;
      }
   }

}

?>