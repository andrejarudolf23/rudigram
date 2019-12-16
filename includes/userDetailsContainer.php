<div class="userDetailsContainer column">
   <div class="userImage">
      <a href="<?php echo $userLoggedIn; ?>">
         <img src="<?php echo $user->getProfilePic(); ?>" alt="userPic">
      </a>
   </div>
   <hr>
   <div class="userInfo">
      <a href="<?php echo $userLoggedIn; ?>">
         <?php echo $user->getFirstAndLastName(); ?><br>
      </a>
      <p>
         Posts: <?php echo $user->getNumberOfPosts(); ?><br>
         Likes: <?php echo $user->getNumberOfLikes(); ?><br>
         Friends: <?php echo $user->getNumberOfFriends(); ?>
      </p>
   </div>
</div>