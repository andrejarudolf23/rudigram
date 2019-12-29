<?php

class Message {

   private $con;
   private $id;
   private $username;
   private $data;

   public function __construct($con, $user) {
      $this->con = $con;
      $this->username = $user;      
   }

   public function getMostRecentUser() {
      $userLoggedIn = $this->username;

      $query = mysqli_query($this->con, "SELECT * FROM messages WHERE userFrom='$userLoggedIn' OR userTo='$userLoggedIn' ORDER BY id DESC LIMIT 1");

      if(mysqli_num_rows($query) == 0)
         return "none";

      $message = mysqli_fetch_array($query);      
      if($message['userFrom'] == $userLoggedIn)
         $mostRecentUser = $message['userTo'];
      else
         $mostRecentUser = $message['userFrom'];
      
      return $mostRecentUser;
   }
}

?>