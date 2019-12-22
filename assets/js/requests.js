function declineRequest(userFrom) {
   $.post("includes/handlers/ajax/ajaxDeclineRequest.php", { userLoggedIn: userLoggedIn, userFrom: userFrom })
   .done(function() {
      location.reload();
   });
}