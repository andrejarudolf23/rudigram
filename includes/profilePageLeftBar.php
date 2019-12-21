<style>
   .container {
      max-width: 100%;
      margin: 48px 0 0 0;
      padding: 0;
      overflow-y: hidden;
   }   
</style>
<?php
   if(isset($_GET['profile_username'])) {
      $profUsername = $_GET['profile_username'];
      $profUser = new User($con, $profUsername);
   }
?>
<div class="container">
   <div class="profileLeftBar column">
      <span class="userName"><?php echo $profUser->getFirstAndLastName(); ?></span>
      <img src="<?php echo $profUser->getProfilePic(); ?>" alt="User profile pic">
      <div class="userInfoNumbers">
         <span>Posts: <?php echo $profUser->getNumberOfPosts(); ?></span>
         <span>Likes: <?php echo $profUser->getNumberOfLikes(); ?></span>
         <span>Friends: <?php echo $profUser->getNumberOfLikes(); ?></span>
      </div>
      <button class="btn btnDarkPrimary">Post Something</button>
      <?php
         if($profUsername == $userLoggedIn)
            exit();
         if($profUser->isFriend($userLoggedIn)) {
            echo "<button class='btn btnBlack' id='removeFriendBtn' onclick='removeFriend(\"$profUsername\")'>Remove Friend</button>";
            exit();
         }
         if($user->didSendRequestTo($profUsername)) {
            echo "<button class='btn btnGrey'>Pending Request</button>";
            exit();
         }
         if($user->didGetRequestFrom($profUsername)) {
            echo "<button class='btn btnGrey'>Respond to Request</button>";
            exit();
         }

         echo "<button class='btn btnGreen'>Add Friend</button>";         
      ?>
   </div>
</div>
