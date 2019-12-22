var profUsername;

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

function updateLikeBtn(postId) {
   //declare variables that we will need to change style and content
   var likeBtn = document.querySelector('.postLikeButton.post' + postId);
   var likeBtnText = document.querySelector('.postLikeButton.post' + postId + ' .likeBtnText');
   var likeCountContainer = document.querySelector('.postNumbers.post' + postId + ' .likeCountContainer');
   var likeCount = document.querySelector('.postNumbers.post' + postId + ' .likeNum');
   var likeCountInt = parseInt(likeCount.textContent);

   $.post("includes/handlers/ajax/ajaxUpdateLikes.php", { postId: postId, userLoggedIn: userLoggedIn })
   .done(function(response) {
      if(response == 1) {
         //user liked
         likeBtn.style.color = '#d83f87';
         likeBtnText.textContent = 'Unlike';
         
         //if post has 0 likes make it all visible and set num of likes to 1
         if(likeCountInt == 0) {
            likeCountContainer.style.visibility = 'visible';
            likeCount.innerHTML = '1';
            return;
         }

         //if post has atleast 1 like, increase num of likes by 1
         likeCountInt = (likeCountInt + 1).toString();
         likeCount.innerHTML = likeBtnNumberInt;
         return;
      }
      //user unliked
      likeBtn.style.color = '#606770';
      likeBtnText.textContent = 'Like';

      //if post has only 1 like, make it all hidden and set num of likes to 0 after you unlike it
      if(likeCountInt == 1) {
         likeCountContainer.style.visibility = 'hidden';
         likeCount.innerHTML = '0';
         return;
      }

      //if post has more than 1 like, decrease num of likes by 1
      likeCountInt = (likeCountInt - 1).toString();
      likeCount.innerHTML = likeCountInt;
   });
}

