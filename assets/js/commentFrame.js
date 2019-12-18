$(document).ready(function() {
   $('.submitComment').attr('disabled', true);
   
   $('.commentBody').keyup(function() {  
          
      if($.trim($(this).val()) == '') {
         $('.submitComment').attr('disabled', true);
         return;
      }
      if($(this).val().length != 0) {
         $('.submitComment').attr('disabled', false);
         return;
      }
      
      $('.submitComment').attr('disabled', true);      
   })

});

function updateCommentCount(postId) {
   //declare variables that we will need to change style and content
   var commentString = parent.document.querySelector('.postNumbers.post' + postId + ' .postCommentCount');
   var word = commentString.textContent;

   //if post had 0 comments before your comment
   if(word=='') {
      commentString.textContent = '1 Comment';
      return;
   }
   
   var num = parseInt(word.replace(/ .*/,''));
   num = num + 1;
   commentString.textContent = num + " Comments";
   
}