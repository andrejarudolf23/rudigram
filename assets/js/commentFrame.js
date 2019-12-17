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