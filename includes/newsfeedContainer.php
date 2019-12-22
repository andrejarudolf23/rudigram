<div class="newsfeedContainer column">
   <div class="statusFormContainer">
      <div class="statusFormHeader">
         <span>Create Post</span>
      </div>
      <form id="statusForm" action="index.php" method="POST">
         <textarea name="statusInput" id="statusInput" placeholder="What's on your mind, <?php echo $user->getFirstName(); ?>?" required=""></textarea>
         <input type="submit" class="statusBtn" name="statusBtn" value="Post">
      </form>
      <hr>
   </div>
   <div class="newsfeedPostsContainer">
      
   </div>
   <img src='assets/images/icons/loading.gif' id='loadingGif'>
</div>