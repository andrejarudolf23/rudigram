<?php
class User {
   
   private $con;
   private $username;
   private $userData;
   private $firstName;
   private $lastName;
   private $profilePic;
   private $numPosts;
   private $numLikes;
   private $friendArray;
   private $userClosed;

   public function __construct($con, $username) {
      $this->con = $con;
      $this->username = $username;

      $query = mysqli_query($this->con, "SELECT * FROM users WHERE username='$this->username'");
      $this->userData = mysqli_fetch_array($query);

      $this->firstName = $this->userData['firstName'];
      $this->profilePic = $this->userData['profilePic'];
      $this->lastName = $this->userData['lastName'];
      $this->numPosts = $this->userData['numPosts'];
      $this->numLikes = $this->userData['numLikes'];
      $this->friendArray = $this->userData['friendArray'];
      $this->userClosed = $this->userData['userClosed'];
   }

   public function getUsername() {
      return $this->username;
   }

   public function getFirstName() {
      return $this->firstName;
   }

   public function getLastName() {
      return $this->lastName;
   }

   public function getFirstAndLastName() {
      return $this->firstName . " " . $this->lastName;
   }

   public function getProfilePic() {
      return $this->profilePic;
   }

   public function getNumberOfPosts() {
      return $this->numPosts;
   }

   public function getNumberOfLikes() {
      return $this->numLikes;
   }

   public function getNumberOfFriends() {
      $num = substr_count($this->friendArray, ",");
      $num = $num - 1;

      return $num;
   }
   
   public function isClosed() {
      if($this->userClosed === 'yes') {
         return true;
      }
      return false;
   }

   public function isFriend($userWith) {
      if($userWith === $this->username)
         return true;
      

      $userWithComma = "," . $userWith . ",";
      if(strpos($this->friendArray, $userWithComma) !== false) {
         return true;
      }

      return false;
   }

}

?>