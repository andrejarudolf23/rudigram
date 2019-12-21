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

   public function getFriendArray() {
      return $this->friendArray;
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

      $userWithObj = new User($this->con, $userWith);
      $userWithComma = "," . $userWith . ",";      
      $loggedUserWithComma = "," . $this->username . ",";      

      if(strpos($this->friendArray, $userWithComma) !== false &&
         strpos($userWithObj->getFriendArray(), $loggedUserWithComma) !== false) {
         return true;
      }

      return false;
   }

   public function didSendRequestTo($userTo) {
      $query = mysqli_query($this->con, "SELECT * from friend_requests WHERE userTo='$userTo' AND userFrom='$this->username'");
      $count = mysqli_num_rows($query);

      if($count == 1) {
         return true;
      }
      return false;
   }

   public function didGetRequestFrom($userFrom) {
      $query = mysqli_query($this->con, "SELECT * from friend_requests WHERE userTo='$this->username' AND userFrom='$userFrom'");
      $count = mysqli_num_rows($query);

      if($count == 1) {
         return true;
      }
      return false;
   }

   public function removeFriend($userToRemove) {
      $userToRemoveObj = new User($this->con, $userToRemove);
      //delete from userToRemove's friendArray
      $array1 = str_replace($this->username . ",", "", $userToRemoveObj->getFriendArray());

      //delete from userLoggedIn's friendArray
      $array2 = str_replace($userToRemove . ",", "", $this->friendArray);

      $update1 = mysqli_query($this->con, "UPDATE users SET friendArray='$array1' WHERE username='$userToRemove'");
      $update2 = mysqli_query($this->con, "UPDATE users SET friendArray='$array2' WHERE username='$this->username'");
   }

}

?>