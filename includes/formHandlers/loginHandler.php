<?php

if(isset($_POST['logEmail']) && isset($_POST['logPassword'])) {
   $email = $_POST['logEmail'];
   $password = $_POST['logPassword'];

   $logSuccess = $account->login($email, $password);

   if($logSuccess) {
      //log successful
      header("Location: index.php");
   }
}

?>