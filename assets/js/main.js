var userLoggedIn;

$(document).ready(function() {
   $('#loadingGif').show();
   var page = 1;
   //load first 10 posts
   loadPosts(page);

   $(window).scroll(function() {
      let pageNumber = $('.newsfeedPostsContainer').find('.nextPage').val();
      var noMorePosts = $('.newsfeedPostsContainer').find('.noMorePosts').val();

      if(($(window).scrollTop() >= $('.newsfeedPostsContainer').offset().top + $('.newsfeedPostsContainer').outerHeight() - window.innerHeight + 23) && noMorePosts == 'false') {
      // FIX THIS FUNCTION - pageNumber parameter gets passed multiple times into loadPosts function instead of once 
         console.log(pageNumber); //it logs 2 or 3 times instead of once

         $('#loadingGif').show();
         loadPosts(pageNumber); //this should be called once when we reach bottom of the page, but it usually gets called 2 times or 3 times
         
      } //end if

      return false;
   }); //End $(window).scroll
});

function loadPosts(pageNum) {
   if(pageNum == 1) {
      $.post("includes/handlers/ajax/ajaxLoadPosts.php", { userLoggedIn: userLoggedIn, page: pageNum })
      .done(function(response) {
         $('#loadingGif').hide();
         $('.newsfeedPostsContainer').html(response);
      })
   }
   else {
      $.post("includes/handlers/ajax/ajaxLoadPosts.php", { userLoggedIn: userLoggedIn, page: pageNum })
      .done(function(data) {
         $('.newsfeedPostsContainer').find('.nextPage').remove();
         $('.newsfeedPostsContainer').find('.noMorePosts').remove();

         $('#loadingGif').hide();
         $('.newsfeedPostsContainer').append(data);
      })
   }
}

function toggleCommentFrame(postId) {
   var iFrame = document.querySelector('#commentFrame' + postId);

   if(iFrame.style.display == 'none') {
      iFrame.style.display = 'block';
      return;
   }

   iFrame.style.display = 'none';
}

function updateLikeBtn(postId) {
   //declare variables that we will need to change style and content
   var likeBtn = document.querySelector('.postLikeButton.post' + postId);
   var likeBtnText = document.querySelector('.postLikeButton.post' + postId + ' .likeBtnText');
   var likeBtnBg = document.querySelector('.postNumbers.post' + postId + ' .postLikeCount');
   var likeBtnThumbUp = document.querySelector('.postNumbers.post' + postId + ' .postLikeCount i');
   var likeBtnNumber = document.querySelector('.postNumbers.post' + postId + ' .likeNum').textContent;
   var likeBtnNumVisibility = document.querySelector('.postNumbers.post' + postId + ' .likeNum');
   likeBtnNumberInt = parseInt(likeBtnNumber);

   $.post("includes/handlers/ajax/ajaxUpdateLikes.php", { postId: postId, userLoggedIn: userLoggedIn })
   .done(function(response) {
      if(response == 1) {
         //user liked
         likeBtn.style.color = '#d83f87';
         likeBtnText.textContent = 'Unlike';
         
         //if post has 0 likes make it all visible and set num of likes to 1
         if(likeBtnNumberInt == 0) {
            likeBtnBg.style.visibility = 'visible';
            likeBtnThumbUp.style.visibility = 'visible';
            likeBtnNumVisibility.innerHTML = '1';
            likeBtnNumVisibility.style.visibility = 'visible';
            return;
         }

         //if post has atleast 1 like, increase num of likes by 1
         likeBtnNumberInt = (likeBtnNumberInt + 1).toString();
         likeBtnNumVisibility.innerHTML = likeBtnNumberInt;
         return;
      }
      //user unliked
      likeBtn.style.color = '#606770';
      likeBtnText.textContent = 'Like';

      //if post has only 1 like, make it all hidden and set num of likes to 0 after you unlike it
      if(likeBtnNumberInt == 1) {
         likeBtnBg.style.visibility = 'hidden';
         likeBtnThumbUp.style.visibility = 'hidden';
         likeBtnNumVisibility.innerHTML = '0';
         likeBtnNumVisibility.style.visibility = 'hidden';
         return;
      }

      //if post has more than 1 like, decrease num of likes by 1
      likeBtnNumberInt = (likeBtnNumberInt - 1).toString();
      likeBtnNumVisibility.innerHTML = likeBtnNumberInt;
   });
}