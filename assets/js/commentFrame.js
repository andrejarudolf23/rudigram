$(document).ready(function() {
   $('.submitComment').attr('disabled', true);
   
   $('.commentBody').keyup(function() {
      if($(this).val().length != 0) {
         $('.submitComment').attr('disabled', false);
      }
      else {
         $('.submitComment').attr('disabled', true);
      }
   })
});