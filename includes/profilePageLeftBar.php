<?php
   function checkFriendship($profUsername, $userLoggedIn, $profUser, $user) {
      if($profUsername == $userLoggedIn)
         return;
      if($profUser->isFriend($userLoggedIn)) {
         echo "<button class='btn btnBlack' id='removeFriendBtn' onclick='removeFriend(\"$profUsername\") '>Remove Friend</button>";
         return;
      }
      if($user->didSendRequestTo($profUsername)) {
         echo "<button class='btn btnGrey' onclick='cancelFriendRequest(\"$profUsername\")'>Pending Request</button>";
         return;
      }
      if($user->didGetRequestFrom($profUsername)) {
         echo "<button class='btn btnGrey' onclick='location.href=\"requests.php\"'>Respond to Request</button>";
         return;
      }

      echo "<button class='btn btnGreen' onclick='addFriend(\"$profUsername\")'>Add Friend</button>";
   }
                  
      ?>
   <div class="profileLeftBar column">
      <span class="userName"><?php echo $profUser->getFirstAndLastName(); ?></span>
      <img src="<?php echo $profUser->getProfilePic(); ?>" alt="User profile pic">
      <div class="userInfoNumbers">
         <span>Posts: <?php echo $profUser->getNumberOfPosts(); ?></span>
         <span>Likes: <?php echo $profUser->getNumberOfLikes(); ?></span>
         <span>Friends: <?php echo $profUser->getNumberOfLikes(); ?></span>
      </div>
      <?php checkFriendship($profUsername, $userLoggedIn, $profUser, $user); ?>
      <button class="btn btnDarkPrimary">Post Something</button>
   </div>


