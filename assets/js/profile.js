$(document).ready(function() {
   $('#profileLoadingGif').show();
   var page = 1;
   //load first 10 posts
   loadProfilePosts(page);

   $(window).scroll(function() {
      let pageNumber = $('.profileNewsfeedPostsContainer').find('.nextPage').val();
      var noMorePosts = $('.profileNewsfeedPostsContainer').find('.noMorePosts').val();

      if(($(window).scrollTop() >= $('.profileNewsfeedPostsContainer').offset().top + $('.profileNewsfeedPostsContainer').outerHeight() - window.innerHeight + 29.32) && noMorePosts == 'false') { 
         $('#profileLoadingGif').show();
         loadProfilePosts(pageNumber);        
      } 

      return false;
   }); //End $(window).scroll
});

function loadProfilePosts(pageNum) {
   if(pageNum == 1) {
      $.post("includes/handlers/ajax/ajaxLoadProfilePosts.php", { profUsername: profUsername, userLoggedIn: userLoggedIn, page: pageNum })
      .done(function(response) {
         $('#profileLoadingGif').hide();
         $('.profileNewsfeedPostsContainer').html(response);
      })
   }
   else {
      $.post("includes/handlers/ajax/ajaxLoadProfilePosts.php", { profUsername: profUsername, userLoggedIn: userLoggedIn, page: pageNum })
      .done(function(data) {
         $('.profileNewsfeedPostsContainer').find('.nextPage').remove();
         $('.profileNewsfeedPostsContainer').find('.noMorePosts').remove();

         $('#profileLoadingGif').hide();
         $('.profileNewsfeedPostsContainer').append(data);
      })
   }
}

function removeFriend(username) {
   $.post("includes/handlers/ajax/ajaxRemoveFriend.php", { userFrom: userLoggedIn, userToRemove: username })
   .done(function() {
      location.reload();
   });
}

function addFriend(username) {
   $.post("includes/handlers/ajax/ajaxAddFriend.php", { user: userLoggedIn, userToAdd: username})
   .done(function() {
      location.reload();
   });
}

function cancelFriendRequest(username) {
   $.post("includes/handlers/ajax/ajaxCancelFriendRequest.php", { user: userLoggedIn, userCancel: username})
   .done(function() {
      location.reload();
   });
}

