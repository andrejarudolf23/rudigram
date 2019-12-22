<?php
   function createPlaceholder($userLoggedIn, $profUsername, $profUser) {
      if($userLoggedIn == $profUsername) {
         return "What's on your mind?";
      }

      $profUserFirstName = $profUser->getFirstName();
      return "Write something to $profUserFirstName?";
   }
?>
<div class="profileNewsfeedContainer column">
   <div class="statusFormContainer">
      <div class="statusFormHeader">
         <span>Create Post</span>
      </div>
      <form id="profileStatusForm" action="profile.php?profile_username=<?php echo $profUsername; ?>" method="POST">
         <textarea name="profilePostInput" id="profilePostInput" placeholder="<?php echo createPlaceholder($userLoggedIn, $profUsername, $profUser) ?>" required=""></textarea>
         <input type="submit" class="profilePostBtn" name="profilePostBtn" value="Post">
      </form>
      <hr>
   </div>
   <div class="profileNewsfeedPostsContainer">
      
   </div>
   <img src='assets/images/icons/loading.gif' id='profileLoadingGif'>
</div>