$(document).ready(function() {
   $("#signup").on("click", function() {
      $("#loginForm").hide();
      $("#registerForm").fadeIn("slow");
   });

   $("#signin").on("click", function() {
      $("#registerForm").hide();
      $("#loginForm").fadeIn("slow");
   })
});

