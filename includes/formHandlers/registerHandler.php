<?php
$successArray = array();

function sanitizeString($input) {
   strip_tags($input);
   str_replace(" ", "", $input);
   ucfirst(strtolower($input));
   return $input;
}

function sanitizeEmail($input) {
   strip_tags($input);
   str_replace(" ", "", $input);
   return $input;
}

function sanitizePassword($input) {
   strip_tags($input);
   return $input;
}

if(isset($_POST['regBtn'])) {

   $fname = sanitizeString($_POST['regFirstName']);
   $lname = sanitizeString($_POST['regLastName']);
   $email1 = sanitizeEmail($_POST['regEmail1']);
   $email2 = sanitizeEmail($_POST['regEmail2']);
   $pw1 = sanitizePassword($_POST['regPassword1']);
   $pw2 = sanitizePassword($_POST['regPassword2']);

   $regSuccess = $account->register($fname, $lname, $email1, $email2, $pw1, $pw2);
   if($regSuccess) {
      array_push($successArray, Constants::$regSuccessful);
   }
}

?>