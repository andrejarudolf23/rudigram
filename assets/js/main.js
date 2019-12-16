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

function showCommentFrame(postId) {
   var iFrame = document.querySelector('.frame');
   console.log(iFrame);

   if(iFrame.style.display == 'none') {
      iFrame.style.display = 'block';
      return;
   }

   iFrame.style.display = 'none';
}