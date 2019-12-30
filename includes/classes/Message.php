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

   public function getLatestMessage($userWith) {
      $output = "";
      $userWithObj = new User($this->con, $userWith);
      $userLoggedIn = $this->username;

      $query = mysqli_query($this->con, "SELECT * FROM messages WHERE (userFrom='$userLoggedIn' AND userTo='$userWith') OR (userFrom='$userWith' AND userTo='$userLoggedIn') ORDER BY id DESC LIMIT 1");
      $row = mysqli_fetch_array($query);

      $userWithProfilePic = $userWithObj->getProfilePic();
      $userWithFullName = formatText($userWithObj->getFirstAndLastName(), 23);

      $sentBy = ($row['userFrom'] == $userLoggedIn) ? "You: " : "";
      $messageDate = formatMessageDate($row['date']);
      
      $length = (preg_match('/[A-Z]/', $messageDate)) ? 24 : 17;
      $messageText = formatText($sentBy . $row['messageBody'], $length);
      

      $output .= 
      "
      <div class='chatRowContainer'>
         <div class='chatRow'>
            <div class='chatRowImg'>
               <img src='$userWithProfilePic' alt='User profile pic'>
            </div>
            <div class='chatRowMain'>
               <div class='userFullName'>
                  $userWithFullName
               </div>
               <div class='chatMessageText'>
                  <span class='text'>
                     $messageText
                  </span>
                  <span class='messageDate'>
                     $messageDate
                  </span>
               </div>
            </div>
         </div>
      </div>
      ";

      return $output;
   }

   public function loadAndDisplayChats() {
      $userLoggedIn = $this->username;
      $arrayOfUsers = array();

      $query = mysqli_query($this->con, "SELECT userFrom, userTo FROM messages WHERE (userFrom='$userLoggedIn' OR userTo='$userLoggedIn') AND deleted='no' ORDER BY id DESC");
      
      while($row = mysqli_fetch_array($query)) {
         $userFrom = $row['userFrom'];
         $userTo = $row['userTo'];
         
         $userToInsert = ($userFrom == $userLoggedIn) ? $userTo : $userFrom;

         if(!in_array($userToInsert, $arrayOfUsers))
            array_push($arrayOfUsers, $userToInsert);
         
      }

      foreach ($arrayOfUsers as $username) {
         echo $this->getLatestMessage($username);
      }
      // echo $this->getLatestMessage("danilo_kasum");
   }
}

?>