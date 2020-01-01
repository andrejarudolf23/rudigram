$(document).ready(function() {
   $('#submitMessage').attr('disabled', true);
   
   $('#messageBody').keyup(function() {  
          
      if($.trim($(this).val()) == '') {
         $('#submitMessage').attr('disabled', true);
         return;
      }
      if($(this).val().length != 0) {
         $('#submitMessage').attr('disabled', false);
         return;
      }
      
      $('#submitMessage').attr('disabled', true);      
   })

});